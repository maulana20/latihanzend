<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$request = $this->getRequest();
		//$form = new Application_Form_Register();
		if ($this->getRequest()->isPost()) {//
			//$values['register_id'] = $this->getRequest()->getParam('id');
			$values['register_user_name'] = ' ';// $this->getRequest()->getParam('user_name');
			$values['register_user_realname']=$this->getRequest()->getParam('real_name');
			$values['register_user_trading_name']=$this->getRequest()->getParam('trading_name');
			$values['register_email']=$this->getRequest()->getParam('email');
			$values['register_phone1']=$this->getRequest()->getParam('phone1');
			$values['register_phone2']=$this->getRequest()->getParam('phone2');
			$values['register_phone3']=$this->getRequest()->getParam('phone3');
			$values['register_address_detail']=$this->getRequest()->getParam('address');
			$values['register_address_postcode']=$this->getRequest()->getParam('post_code');
			$values['register_address_city']=$this->getRequest()->getParam('city');
			$values['register_address_state']=$this->getRequest()->getParam('state');
			$values['register_address_country'] = 'ID';
			$values['register_request'] = 'reqs';
			$values['register_desc'] = 'desc';
//			var_dump($values);exit();
			//$values['password']=$this->getRequest()->getParam('password');
			//$values['confirm_password']=$this->getRequest()->getParam('confirm_password');
			if(!empty($values['register_user_realname']) && !empty($values['register_email']) && !empty($values['register_user_trading_name'])) {
				$mapper = new Application_Model_RegisterMapper();
				if($mapper->findEmail($values["register_email"])==false){
					try {	
						$values['register_status']='A';
						//var_dump($values);
						$register = new Application_Model_Register($values);
						$mapper->save($register,$values);
						
					} catch (Exception $e) {
						Zend_Debug::Dump($e);exit();
					}
					echo'Anda Berhasil Mendaftar';exit;
				} else {
					echo'Email Telah Terdaftar';exit;
				}
			} else {
				//echo'Data Belum Lengkap';exit;
				//$this->view->errorMessage='Inputan dengan tanda * harus diisi';
				//$this->render('index');
				 echo'<meta http-equiv="refresh" content="0,url=index">';
			}
		}
		//$this->view->form = $form;
    }


}

