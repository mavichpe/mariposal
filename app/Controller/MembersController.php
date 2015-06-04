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

    public function select() {
        $this->Member->recursive = 0;
        $this->set('members', $this->Paginator->paginate());
        $datos = $this->request->data;
        $condiciones = array();
        if (isset($datos['Member']['filter'])) {
            if (strlen(trim($datos['Member']['filter'])) != 0) {
                $condiciones[] = " Member.cedula like '%" . $datos['Member']['filter'] . "%'";
                $condiciones[] = " Member.name like '%" . $datos['Member']['filter'] . "%'";
            }
        }
        $this->set('members', $this->paginate('Member', implode(' or ', $condiciones)));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Member->recursive = 0;
        $this->set('members', $this->Paginator->paginate());
        $datos = $this->request->data;
        $condiciones = array();
        if (isset($datos['Member']['filter'])) {
            if (strlen(trim($datos['Member']['filter'])) != 0) {
                $condiciones[] = " Member.cedula like '%" . $datos['Member']['filter'] . "%'";
                $condiciones[] = " Member.name like '%" . $datos['Member']['filter'] . "%'";
            }
        }
        $this->set('members', $this->paginate('Member', implode(' or ', $condiciones)));
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
    public function getMember($cedula = null) {
        $this->autoRender = false;
        $this->Member->recursive = -1;
        $member = $this->Member->find("first", array("conditions" => array("Member.cedula" => $cedula)));
        $response = array("exist" => false);
        if (isset($member["Member"]["id"])) {
            $response = array(
                "exist" => true,
                "Member" => $member["Member"]);
        }
        $this->response->body(json_encode($response));
    }

    public function edit($id = null) {
        if (!$this->Member->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->loadModel("Familymember");
            $datasource = $this->Member->getDataSource();
            $datasource->begin();

            $store = true && $this->Familymember->deleteAll(array("Familymember.member_id" => $id));
            $store = $store && $this->Member->saveAssociated($this->request->data);
            if ($store) {
                $datasource->commit();
                $this->Session->setFlash(__('El miembro fue actualizado correcto'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $datasource->rollback();
                $this->Session->setFlash(__('El miembro no fue actualizado correcto'));
            }
        } else {
            $options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
            $this->request->data = $this->Member->find('first', $options);
        }
        asort($this->parentescos);
        asort($this->estadoCivil);
        $parentescos = $this->parentescos;
        $estadosCiviles = $this->estadoCivil;
        $this->set(compact("parentescos", "estadosCiviles"));
    }

    public function generateAll() {
        $this->layout = "print";
        $members = $this->Member->find("all");
        $zip = new ZipArchive;
        $zipPath = WWW_ROOT . "/img/carnets/carnets.zip";
        if ($zip->open($zipPath, ZipArchive::CREATE)) {
            foreach ($members as $member) {
                $filePath = $this->getCarne($member);
                $zip->addFile($filePath, 'carne-' . $member["Member"]["cedula"] . '.jpg');
            }
            $zip->close();
            $this->response->file($zipPath, array(
                'download' => true,
                'name' => 'carnets.zip',
            ));
            return $this->response;
        } else {
            $this->Session->setFlash("No ha sido posible crear el zip de carnets");
            $this->redirect(array("action" => "index"));
        }
    }

    public function generateCarne($id = null, $download = true) {
        $this->layout = "print";
        $member = $this->Member->read(null, $id);

        $filePath = $this->getCarne($member);
        if ($download) {
            $this->set("filePath", "carnets/" . $member["Member"]['cedula'] . ".jpg");
            $this->response->file($filePath, array(
                'download' => true,
                'name' => 'carnet-' . $member["Member"]['cedula'] . ".jpg",
            ));
            return $this->response;
        }
    }

    private function getCarne($member) {
        $rImg = ImageCreateFromJPEG(WWW_ROOT . "img" . DS . "carne-template.jpg");
        $cor = imagecolorallocate($rImg, 255, 255, 255);
        $font = WWW_ROOT . 'css' . DS . 'arialbd.ttf';
        $barcodeFont = WWW_ROOT . 'css' . DS . 'free3of9.ttf';
        $barcodeColor = imagecolorallocate($rImg, 0, 0, 0);

        $text = "Nombre: " . $member["Member"]['name'];
        imagettftext($rImg, 15, 0, 30, 200, $cor, $font, $text);

        $text = "Cedula: " . $member["Member"]['cedula'];
        imagettftext($rImg, 15, 0, 30, 240, $cor, $font, $text);

        $text = $member["Member"]['cedula'];
        imagettftext($rImg, 80, 0, 50, 400, $barcodeColor, $barcodeFont, $text);

        $filePath = WWW_ROOT . "/img/carnets/" . $member["Member"]['id'] . ".jpg";
        imagejpeg($rImg, $filePath, 100);

        return $filePath;
    }

    public function load() {
        $dir = '/Applications/XAMPP/htdocs/mariposal/info.csv';
        $file = fopen($dir, "r");
        $indexCedula = -1;
        $firstIndex = true;
        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            if (!$firstIndex) {
                $cedula = strlen($data[1]) == 0 ? $indexCedula-- : $data[1];
                $ingreso = new DateTime();
                $ingreso = $ingreso->format("Y-m-d");
                $memberData = array(
                    "Member" => array(
                        "name" => $data[0],
                        "cedula" => $cedula,
                        "ingreso" => $ingreso
                    )
                );
                $this->Member->create();
                $this->Member->save($memberData);
            }
            $firstIndex = false;
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
