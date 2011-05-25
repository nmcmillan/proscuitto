<?php

class Application_Form_Patient extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	// Set the form name
    	$this->setName('patient');
    	
    	// Create the empty intger field for the DB id
    	$id = new Zend_Form_Element_Hidden('_id');
    	$id->addFilter('Int');
    	
    	// First Name
    	$first_name = new Zend_Form_Element_Text('first_name');
    	$first_name->setLabel('First Name')
    			   ->setRequired(true)
    			   ->addFilter('StripTags')
    			   ->addFilter('StringTrim')
    			   ->addValidator('NotEmpty');
    	
    	// Last Name
    	$last_name = new Zend_Form_Element_Text('last_name');
    	$last_name->setLabel('Last Name')
    			   ->setRequired(false)
    			   ->addFilter('StripTags')
    			   ->addFilter('StringTrim')
    			   ->addValidator('NotEmpty');
    			   
    	$submit = new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id', 'submitbutton');
    	
    	$this->addElements(array($id, $first_name, $last_name, $submit));
    	
    }

}

