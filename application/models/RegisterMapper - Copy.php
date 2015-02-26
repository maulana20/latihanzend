<?php

class Application_Model_RegisterMapper
{
	protected $_dbTable;
	
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid Property');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}
	
	public function getDbTable()
	{
		if (NULL === $this->_dbTable) {
			$this->setDbTable('Application_Model_DbTable_Register');
		}
		return $this->_dbTable;
	}
	
	private function setObject($row, Application_Model_Register $register)
    {
    	//var_dump($register);exit();
		if ($row instanceof Zend_Db_Table_Row) {
		
			$register ->setId($row->register_id)
					->setUserName($row->register_user_name)
					->setRealName($row->register_user_realname)
					->setTradingName($row->register_user_trading_name)
					->setEmail($row->register_email)
					->setPhone1($row->register_phone1)
					->setPhone2($row->register_phone2)
					->setPhone3($row->register_phone3)
					->setAddress($row->register_address_detail)
					->setPostCode($row->register_address_postcode)
					->setCity($row->register_address_city)
					->setState($row->register_address_state)
					->setCountry($row->register_address_country)
					->setRequest($row->register_request)
					->setDesc($row->register_desc)
					->setStatus($row->register_status)
					;
					 
			return $register;
    	} else {
    		throw new Exception('invalid object');
    	}
    }

	public function save(Application_Model_Register $register, $field = NULL)
	{
		$_data = array(
					   //'register_id' => '1',
			'register_date' => time(),
			'register_user_name' => $register->getUserName(),
			'register_user_realname'=> ucwords($register->getRealname()),
			'register_user_trading_name'=> ucwords($register->getTradingName()),
			'register_email'	=> $register->getEmail(),
			'register_phone1'	=> $register->getPhone1(),
			'register_phone2'	=> $register->getPhone2(),
			'register_phone3'	=> $register->getPhone3(),
			'register_address_detail'	=> $register->getAddress(),
			'register_address_postcode'=> $register->getPostCode(),
			'register_address_city'		=> $register->getCity(),
			'register_address_state'	=> $register->getState(),
			'register_address_country' => $register->getCountry(),
			'register_status'	=> $register->getStatus(),
			'register_desc'	=> $register->getDesc(),
			'register_request'	=> $register->getRequest(),
		);
		
		$id = $register->getId();
		if (empty($id)) {
			return $this->getDbTable()->insert($_data);
		} else {
			$data = array();
			if (is_array($field)) {
				foreach ($field as $k => $v) {
					foreach ($_data as $key => $value) {
						$kk = strtolower(str_replace('register_', '', $key));
						if ((strtolower($v) == $kk) || (strtolower($k) == $kk) || (strtolower($v) == $key) || (strtolower($k) == $key)) {
							$data[$key] = $value;
						}
					}
				}
			} else {
				$data = $_data;
			}
			
			$this->getDbTable()->update($data, array('register_id = ?' => $id));
			return $id;
		}
	}
	
	public function find($id)
    {
        $register = new Application_Model_register();
		$result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return NULL;
        }
        $row = $result->current();
		$register->setId($row->register_id)
					 ->setRealName($row->register_user_realname)
					 ->setAddress($row->register_address_detail)
					 ->setCity($row->register_address_city)
					 ->setState($row->register_address_state)
					 ->setPostCode($row->register_address_postcode)
					 ->setPhone1($row->register_phone1)
					 ->setPhone2($row->register_phone2)
					 ->setPhone3($row->register_phone3)
					 ->setTradingName($row->register_user_trading_name)
					 ->setEmail($row->register_email)
					 ->setStatus($row->register_status);
		return $register;
    }
    
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();//Zend_Debug::Dump($resultSet);exit();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_register();
            $entry->setId($row->register_id)
					 ->setRealName($row->register_user_realname)
					 ->setAddress($row->register_address_detail)
					 ->setCity($row->register_address_city)
					 ->setState($row->register_address_state)
					 ->setPostCode($row->register_address_postcode)
					 ->setPhone1($row->register_phone1)
					 ->setPhone2($row->register_phone2)
					 ->setPhone3($row->register_phone3)
					 ->setTradingName($row->register_user_trading_name)
					 ->setEmail($row->register_email)
					 ->setStatus($row->register_status);
            $entries[] = $entry;
        }
        return $entries;
    }
	
	public function findEmail($email)
	{
		$where = $this->getDbTable()->getAdapter()->quoteInto("register_status <> 'D' and register_email = ? ",$email);	
		$select = $this->getDbTable()->select()->where($where);
		$row = $this->getDbTable()->fetchRow($select);
		$test = new Application_Model_Register();
		try {
			$result = $this->setObject($row, $test);
			
		} catch (Exception $e) {
			//throw new Exception('error set object');
			return false;
		}
		return true;
		}
		
	public function fetchNa()
	{
		$where = $this->getDbTable()->getAdapter()->quoteInto("register_status = ?", "A");
		$select = $this->getDbTable()->select()->where($where);
		$row = $this->getDbTable()->fetchAll($select);
		$test = new Application_Model_Register();
		$entries = array();
		foreach ($row as $key => $value) {
			$register = new Application_Model_Register();
			$this->setObject($value, $register);
            $entries[] = $register;
			
		}
		//return $entries;
		

	}
		
	public function updateStatus($id)
    {
		$data = array(
			'register_status'      => 'NA',
		);
		$this->getDbTable()->update($data, array ('register_id = ?' => $id));
	}	
}
