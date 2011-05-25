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
        // Create the Patient form object
        $form = new Application_Form_Patient();
        // Change the label of the submit button? Why is this here?
        $form->submit->setLabel('Add');
        // Render the view.
        $this->view->form = $form;
        
        // Check to see if this is a return from POST
        if ($this->getRequest()->isPost()) {
        	// Get the form data.
        	$formData = $this->getRequest()->getPost();
        	// Check to see that the form data is valid
        	if ($form->isValid($formData)) {
        		// Get the data and add the patient
        		$first_name = $form->getValue('first_name');
        		$last_name = $form->getValue('last_name');
        		$patient = new Application_Model_DbTable_Patients();
        		$patient->addPatient($first_name, $last_name);
        		// Redirect to the index page
        		$this->_helper->redirector('index');
        	} else {
        		// Data was invalid, redisplay
        		$form->populate($formData);
        	}
        	
        }
        
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









