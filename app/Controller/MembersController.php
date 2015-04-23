<?php

App::uses('AppController', 'Controller');

/**
 * Members Controller
 *
 * @property Member $Member
 * @property PaginatorComponent $Paginator
 */
class MembersController extends AppController {

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
        $this->Member->recursive = 0;
        $this->set('members', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Member->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }
        $options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
        $this->set('member', $this->Member->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Member->create();
            if ($this->Member->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The member has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.'));
            }
        }
        asort($this->parentescos);
        asort($this->estadoCivil);
        $parentescos = $this->parentescos;
        $estadosCiviles = $this->estadoCivil;
        $this->set(compact("parentescos", "estadosCiviles"));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Member->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Member->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The member has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
            $this->request->data = $this->Member->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Member->id = $id;
        if (!$this->Member->exists()) {
            throw new NotFoundException(__('Invalid member'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Member->delete()) {
            $this->Session->setFlash(__('The member has been deleted.'));
        } else {
            $this->Session->setFlash(__('The member could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
