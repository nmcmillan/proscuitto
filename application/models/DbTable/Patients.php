<?php

class Application_Model_DbTable_Patients extends Zend_Db_Table_Abstract
{

    protected $_name = 'patients';
    
    private $
    
    public function getPatient($_id) {
    	$_id = (int)$_id;
    	$row = $this->fetchRow('id = ' . $_id);
    	if (!$row) {
    		throw new Exception("Could not find row $_id");
    	}
    	return $row->toArray();
    }
    
    public function addPatient($first_name) {
    	$data = array(
    		'first_name' => $first_name,
    	);
    	
    	$this->insert($data);
    }


}

