<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'authError' => 'Por favor identifiquese en el sistema',
            'loginRedirect' => array('controller' => 'members', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        ),
    );
    public $parentescos = array(
        1 => "Padre",
        2 => "Madre",
        3 => "Hijo",
        4 => "Hija",
        5 => "Abuelo",
        6 => "Abuela",
        7 => "Nieto",
        8 => "Nieta",
        9 => "Sobrina",
        10 => "Sobrino",
        11 => "Tio",
        12 => "Tia",
        13 => "Prima",
        14 => "Primo",
        15 => "Esposo",
        16 => "Esposa",
        17 => "Cueña",
        18 => "Yerno",
        19 => "Otra",
    );
    public $estadoCivil = array(
        1 => "Casado(a)",
        2 => "Soltero(a)",
        3 => "Divorsiado(a)",
        4 => "Union Libre",
        5 => "Biudo(a)",
    );
    private $appPermission = array();

    public function beforeFilter() {
        if (!$this->request->is('ajax') && $this->name != 'CakeError' && $this->here != Router::url(array('controller' => 'users', 'action' => 'login'))) {
            $this->Session->write('Auth.redirect', $this->here);
        }
        $this->setUpPermission();
        $this->applyACL();
        $user = $this->Auth->user();
        $this->set("user", $user);
    }

    private function applyACL() {
        $controller = strtolower($this->request->params['controller']);
        $action = strtolower($this->request->params['action']);
        $isAllow = $this->isAllow($controller, $action);
        switch ($isAllow) {
            case false:
                $this->rejectRequest();
                break;
            case true:
                break;
        }
    }

    private function rejectRequest() {
        $this->Session->setFlash('Usted no tiene permisos para acceder a esta seccion');
        $this->redirect($this->referer());
    }

    public function isAllow($controller, $action) {
        if (isset($this->request->data['allow']) && $this->request->data['allow'])
            return true;
        $role = $this->Auth->user('role');
        if ($role != null) {
            $permission = $this->appPermission[$role];
            if (array_search('*', $permission['basic']) !== false)
                return true;
            if (array_search($controller, $permission['basic']) !== false)
                return true;
            if (array_search($controller . "/" . $action, $permission['basic']) !== false)
                return true;
            if (isset($permission['strict'])) {
                $refer = substr($this->referer(), strlen(Router::url('/', true)));
                $refer = implode('/', array_slice(explode('/', $refer), 0, 2));
                foreach ($permission['strict'] as $key => $exception) {
                    $key = array_search($refer, $exception);
                    if ($key !== false) {
                        if ($key == $controller || $key == ($controller . "/" . $action ))
                            return true;
                    }
                }
            }
            return false;
        } else {
            return true;
        }
    }

    public function setUpPermission() {
//permission for administrador group id 1
        $this->appPermission[1]["basic"][] = '*';

//permission for supervisor group id 2
        $this->appPermission[2]["basic"][] = 'members/edit';
        $this->appPermission[2]["basic"][] = 'members/add';
        $this->appPermission[2]["basic"][] = 'members/index';
        $this->appPermission[2]["basic"][] = 'members/select';
        $this->appPermission[2]["basic"][] = 'activitiesMembers/index';
        $this->appPermission[2]["basic"][] = 'reports';
        $this->appPermission[2]["basic"][] = 'users/login';
        $this->appPermission[2]["basic"][] = 'users/logout';
    }

}
