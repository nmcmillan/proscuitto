<?php

class Application_Model_DbTable_Patients extends Zend_Db_Table_Abstract
{

    protected $_name = 'patients';
    
    // Required Fields
    private $first_name = NULL;
    
    // Extra Fields
	private $last_name = NULL;
	//private $gender = GENDER.NONE;
	
	// Optional Fields
	private $relations = NULL;
	private $age = 0;
	
	/*
	// Relation constants
	class RELATION {
		const MOTHER = 1;
		const FATHER = 2;
		const DAUGHTER = 3;
		const SON = 4;
		const GRANDFATHER = 5;
		const GRANDMOTHER = 6;
		const GRANDSON = 7;
		const GRANDDAUGHTER = 8;
		const AUNT = 9;
		const UNCLE = 10;
		const COUSIN = 11;
		const OTHER = 12;
		const NONE = NULL;
	}
	
	// Gender constants
	class GENDER {
		const MALE = 1;
		const FEMALE = 2;
		const OTHER = 3;
		const NONE = NULL;
	}
	*/
	
	// Database column names
	private $column_first_name = 'first_name';
	private $column_last_name = 'last_name';
	private $column_gender = 'gender';
	private $column_relations = 'relations';
	private $column_age = 'age';

	public function newPatient($first_name) {
		$this->first_name = $first_name;
	}
	
	/*
	public function newPatient($first_name, $last_name, $gender) {
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->gender = $gender;
	}
	
	*/
	
	public function storePatient() {
		// Add the first name to the array
		$data = array( $this->column_firstName => $this->first_name);
		
		// Check other optional fields
		if( !is_null($this->last_name)) {
			$data[$this->column_last_name] = $this->last_name;
		}
		
		$this->insert($data);
		
	}
    
    public function addPatient($first_name, $last_name) {
    	
    	// Add the first name to the array
    	$data = array(
    		'first_name' => $first_name,
    	);
    	
    	// Check other optional fields
		if( !is_null($last_name)) {
			$data['last_name'] = $last_name;
		}
    	
    	$this->insert($data);
    }
    
    public function getPatient($_id) {
    	$_id = (int)$_id;
    	$row = $this->fetchRow('id = ' . $_id);
    	if (!$row) {
    		throw new Exception("Could not find row $_id");
    	}
    	return $row->toArray();
    }


}

