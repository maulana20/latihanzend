<?php

class Application_Model_UserMapper
{
	protected $_dbTable;
	
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid dbtable');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}
	
	public function getDbTable()
	{
		if (NULL === $this->_dbTable) {
			$this->setDbTable('Application_Model_DbTable_User');
		}
		return $this->_dbTable;
	}
	
	
	/* public function find($id)
    {
        $user = new Application_Model_User();
		$result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return NULL;
        }
        $row = $result->current();
        $user	->setId($row->user_id)
				 ->setGroupId($row->group_id)
                 ->setName($row->user_name)
				 ->setPassword($row->user_password)
				 ->setDisplayName($row->user_displayname)
				 ->setAddress($row->user_address)
				 ->setParentId($row->user_parentid)
                 ->setEmail($row->user_email)
				 ->setPhone($row->user_phone)
				 ->setStatus($row->user_status)
				 ->setCreateTime($row->user_createtime);
		return $user;
    } */
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_User();
            $entry->setId($row->user_id)
                 ->setName($row->user_name)
				 ->setPassword($row->user_password);
            $entries[] = $entry;
        }
        return $entries;
    }
	
	public function delete($id)
	{
		$data= array('user_status' => 'D');//Lagger::dump($id);
		$where = $this->getDbTable()->getAdapter()->quoteInto('user_id = ?',$id);		
		$this->getDbTable()->update($data,$where);
	}
	
	public function checkLogin(Application_Model_User $login)
	{	
		$output = $this->findName($login->getName());
		//var_dump($login->getPassword());exit();
		//$utility = new Application_Model_Utility();
		//if ($output->getPassword() == md5('VERSATECH'. $login->getPassword())) {
		//$password = $utility->setPassword($login->getPassword());
		if ($output->getPassword() == $login->getPassword()) {
			return $output;
		} else {
			throw new Exception('invalid password');
		}
	}
	
	public function findName($name)
    {
		$where = $this->getDbTable()->getAdapter()->quoteInto("user_name = ?", $name);
		$select = $this->getDbTable()->select()->where($where);	
		$row = $this->getDbTable()->fetchRow($select);
		$test = new Application_Model_User();
		try {
			$login = $this->setObject($row, $test);
		} catch (Exception $e) {
			throw new Exception('error set object');
		} 
		
		return $login;
	}

	private function setObject($row, Application_Model_User $login)
    {
    	if ($row instanceof Zend_Db_Table_Row) {
			$login->setId($row->user_id)
                 ->setName($row->user_name)
				 ->setPassword($row->user_password);
			return $login;
    	} else {
    		throw new Exception('invalid object');
    	}
    }
	
	public function checkPass(Application_Model_User $login)
	{	
		$output = $this->find($login->getId());
		$utility = new Application_Model_Utility();

		//if ($output->getPassword() == md5('VERSATECH'. $login->getPassword())) {
		$password = $utility->setPassword($login->getPassword());
		if ($output->getPassword() == $password->getPassword()) {
			return $output;
		} else {
			throw new Exception('password tidak cocok');
		}
	}

}
