<?php

App::uses('AppController', 'Controller');

/**
 * Importers Controller
 *
 * @property Importer $Importer
 * @property PaginatorComponent $Paginator
 */
class DashboardController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
    }

}
