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
            'loginRedirect' => array('controller' => 'dashboard', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
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

    public function beforeFilter() {
        $this->Auth->allow();
    }

}
