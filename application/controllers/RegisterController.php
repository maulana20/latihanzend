<?php

class RegisterController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form    = new Application_Form_Register();
		$this->view->form = $form;
    }

	public function saveAction()
	{
		$request = $this->getRequest();
		$form = new Application_Form_Register();
		if ($this->getRequest()->isPost()) {//
			//$values['register_id'] = $this->getRequest()->getParam('id');
			$values['user_name'] = '';// $this->getRequest()->getParam('user_name');
			$values['realname']=$this->getRequest()->getParam('real_name');
			$values['trading_name']=$this->getRequest()->getParam('trading_name');
			$values['email']=$this->getRequest()->getParam('email');
			$values['phone1']=$this->getRequest()->getParam('phone1');
			$values['phone2']=$this->getRequest()->getParam('phone2');
			$values['phone3']=$this->getRequest()->getParam('phone3');
			$values['address']=$this->getRequest()->getParam('address');
			$values['post_code']=$this->getRequest()->getParam('post_code');
			$values['city']=$this->getRequest()->getParam('city');
			$values['state']=$this->getRequest()->getParam('state');
			$values['country'] = 'ID';
			$values['request'] = $this->getRequest()->getParam('request');
			$values['desc'] = $this->getRequest()->getParam('description');
			
//var_dump($values);exit();
			//$values['password']=$this->getRequest()->getParam('password');
			//$values['confirm_password']=$this->getRequest()->getParam('confirm_password');
			if(!empty($values['realname']) && !empty($values['email']) && !empty($values['trading_name'])) {
				$mapper = new Application_Model_RegisterMapper();
				if (!filter_var($values["email"], FILTER_VALIDATE_EMAIL)) {
					echo'<script>';
					echo"window.alert('Ini Bukan Email');";
					echo'</script>';
					$this->view->values = $values;
					echo $this->render('index');
				} else {
						if ($mapper->findEmail($values["email"])==false) {
							try {	
								$values['status']='A';
								//var_dump($values);
								$register = new Application_Model_Register($values);
								$messagemail = new Application_Model_MailMapper();
								$messagemail->sendMailMessage($this->getRequest()->getParam('email'));
								$mapper->save($register,$values);
							} catch (Exception $e) {
								Zend_Debug::Dump($e);exit();
							}
						echo'';	
						} else {
							echo'<script>';
							echo"window.alert('Email Telah Terdaftar');";
							echo'</script>';
							$this->view->values = $values;
							echo $this->render('index');
							//$this->_redirect('/register');
							//echo'<meta http-equiv="refresh" content="0,url=index">';
						}
					}
			} else {
				$this->view->values = $values;
				//echo'Data Belum Lengkap';exit;
				//$this->view->errorMessage='Inputan dengan tanda * harus diisi';
				echo $this->render('index');
				//echo'<meta http-equiv="refresh" content="0,url=index">';
				
			}
		}
		$this->view->form = $form;
	}
}

