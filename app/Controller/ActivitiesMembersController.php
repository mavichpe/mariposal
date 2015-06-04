<?php

App::uses('AppController', 'Controller');
App::import('Vendor', 'Escpos', array('file' => 'Escpos/Escpos.php'));

/**
 * ActivitiesMembers Controller
 *
 * @property ActivitiesMember $ActivitiesMember
 * @property PaginatorComponent $Paginator
 */
class ActivitiesMembersController extends AppController {

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
        $this->ActivitiesMember->recursive = 0;
        $datos = $this->request->data;
        $condiciones = array();
        if (isset($datos['ActivitiesMember']['filter'])) {
            if (strlen(trim($datos['ActivitiesMember']['filter'])) != 0) {
                $condiciones[] = " Member.name like '%" . $datos['ActivitiesMember']['filter'] . "%'";
                $condiciones[] = " Activity.title like '%" . $datos['ActivitiesMember']['filter'] . "%'";
            }
        }
        $this->set('activitiesMembers', $this->paginate('ActivitiesMember', implode(' or ', $condiciones)));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ActivitiesMember->exists($id)) {
            throw new NotFoundException(__('Invalid activities member'));
        }
        $options = array('conditions' => array('ActivitiesMember.' . $this->ActivitiesMember->primaryKey => $id));
        $this->set('activitiesMember', $this->ActivitiesMember->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->autoRender = false;
            $this->ActivitiesMember->create();
            $response = array("save" => false);
            $this->ActivitiesMember->deleteAll(array("ActivitiesMember.member_id" => $this->request->data["member_id"], "ActivitiesMember.activity_id" => $this->request->data["activity_id"]));
            if ($this->ActivitiesMember->save($this->request->data)) {
                $response = array("save" => true);
                $this->printTicket($this->ActivitiesMember->id);
            }
            $response[] = $this->ActivitiesMember->validationErrors;

            $this->response->body(json_encode($response));
        }
        $members = $this->ActivitiesMember->Member->find('list');
        $activities = $this->ActivitiesMember->Activity->find('list');
        $this->set(compact('members', 'activities'));
    }

    public function printTicket($memberActivityId) {
        $this->autoRender = false;
        $this->ActivitiesMember->recursive = 1;
        $data = $this->ActivitiesMember->read(null, $memberActivityId);

//        $connector = new WindowsPrintConnector("POS");
        $connector = new DummyPrintConnector();

        $printer = new Escpos($connector);
        /* Initialize */
        $printer->initialize();
        /* Text */
        $printer->text("Provivienda Mariposal\n");
        $printer->text("Tiquete Confirmacion Asistencia\n");
        $printer->text("Tiquete #: " . $data["ActivitiesMember"]["id"] . "\n");
        $printer->text("**** Informacion Asociado ****\n ");
        $printer->text("Cedula: " . $data["Member"]["cedula"] . "\n");
        $printer->text("Nombre: " . $data["Member"]["name"] . "\n");
        $printer->text("**** Informacion Actividad ****\n ");
        $printer->text("Actividad: " . $data["Activity"]["title"] . "\n");
        $fecha = new DateTime($data["Activity"]["date"]);
        $printer->text("Fecha: " . $fecha->format("d-m-Y") . "\n");
        $printer->text("Monto Pagado: " . $data["ActivitiesMember"]["monto"] . "\n");
        $printer->feed(4);
        $printer->cut();
        $printer->close();
        return true;
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->ActivitiesMember->exists($id)) {
            throw new NotFoundException(__('Invalid activities member'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ActivitiesMember->save($this->request->data)) {
                $this->Session->setFlash(__('The activities member has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The activities member could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ActivitiesMember.' . $this->ActivitiesMember->primaryKey => $id));
            $this->request->data = $this->ActivitiesMember->find('first', $options);
        }
        $members = $this->ActivitiesMember->Member->find('list');
        $activities = $this->ActivitiesMember->Activity->find('list');
        $this->set(compact('members', 'activities'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->ActivitiesMember->id = $id;
        if (!$this->ActivitiesMember->exists()) {
            throw new NotFoundException(__('Invalid activities member'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ActivitiesMember->delete()) {
            $this->Session->setFlash(__('The activities member has been deleted.'));
        } else {
            $this->Session->setFlash(__('The activities member could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
