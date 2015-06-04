<?php

App::uses('AppController', 'Controller');

/**
 * Importers Controller
 *
 * @property Importer $Importer
 * @property PaginatorComponent $Paginator
 */
class ReportsController extends AppController {

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
    public function index($memberId) {
        $this->loadModel("Activity");
        $this->loadModel("Member");
        $this->loadModel("ActivitiesMember");
        $this->Activity->recursive = -1;
        $this->Member->recursive = -1;
        $this->ActivitiesMember->recursive = -1;
        $member = $this->Member->read(null, $memberId);
        $cantidadActivities = $this->Activity->find("count");
        $cantidadActivitiesAsistidas = $this->ActivitiesMember->find("count", array("conditions" => array("ActivitiesMember.member_id" => "$memberId")));
        $cantidadActivitiesPagadas = $this->ActivitiesMember->find("count", array("conditions" => array("ActivitiesMember.member_id" => "$memberId", "ActivitiesMember.is-pay" => true)));
        $this->Activity->recursive = -1;
        $activities = $this->Activity->find("all");
        foreach ($activities as &$activity) {
            $ActivitiesMemberData = $this->ActivitiesMember->find("first", array("conditions" => array("ActivitiesMember.activity_id" => $activity["Activity"]["id"], "ActivitiesMember.member_id" => $memberId)));
            $activity += $ActivitiesMemberData;
        }
        $this->set(compact("activities", "cantidadActivities", "member", "cantidadActivitiesAsistidas", "cantidadActivitiesPagadas"));
    }

    public function activity($activityId) {
        $this->loadModel("Activity");
        $this->loadModel("ActivitiesMember");
        $this->Activity->recursive = -1;
        $this->ActivitiesMember->recursive = 1;
        $activity = $this->Activity->read(null, $activityId);
        $activityMembers = $this->ActivitiesMember->find("all", array("conditions" => array("ActivitiesMember.activity_id" => $activityId)));
        $total = $this->ActivitiesMember->find('all', array('fields' => 'sum(ActivitiesMember.monto) AS ctotal', "conditions" => array("ActivitiesMember.activity_id" => $activityId)));
        $total = $total[0][0]["ctotal"];
        $this->set(compact("activity", "activityMembers", "total"));
    }

    public function dashboard() {
        
    }

}
