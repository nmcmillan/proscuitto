<?php

class PatientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $patients = new Application_Model_DbTable_Patients();
        $this->view->patients = $patients->fetchAll();
    }

    public function addAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}









