<?php

class AdministrationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form    = new Application_Form_Login();
		$this->view->form = $form;
    }

    public function loginAction()
    {
		$request = $this->getRequest();
		$form = new Application_Form_Login();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($request->getPost())){
				$values = $form->getValues();
				$comment = new Application_Model_User($form->getValues());
				$mapper = new Application_Model_UserMapper();
				try {
					$user = $mapper->checkLogin($comment);
					$this->_redirect('administration/list');
					//echo'login Berhasil';exit();
				} catch (Exception $e) {
					//$login->logout();
					$this->view->form = $form;
					$this->view->errorMessage='Username Or Password Invalid';
					$this->render('index');
				}
			}
		} else {
		echo'Error1';exit();
		}
    }

    public function listAction()
    {
		$mapper	= new Application_Model_RegisterMapper();
		$register	= $mapper->fetchAll();
		$this->view->register = $register;
	}

    public function updateAction()
    {
		$request = $this->getRequest();
		$id = $this->getRequest()->getParam('id');
		//$values['status'] = 'A';
		$mapper	= new Application_Model_RegisterMapper();
		$register = new Application_Model_Register($values);
		//$mapper->save($register,$values);
		$mapper->updateStatus($id);
		//var_dump($values);exit();
		$this->_redirect('administration/list');
	}
	
    public function detailAction()
    {
		$mapper	= new Application_Model_RegisterMapper();
		$id = $this->getRequest()->getParam('id2');
		$register	= $mapper->find($id);
		$this->view->register = $register;
	}
}



















