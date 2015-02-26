<?php
class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
		$this->addElement('Text','name',array(
			'label'=>'Username',
			'required'=>'true',
			'filters'=>array('StringTrim'),
			'id' => 'login_name',
			'style' => 'width: 9em;',
		));
		$this->addElement('Password','password',array(
			'label'=>'Password',
			'required'=>'true',
			'id' => 'login_password',
			'style' => 'width: 9em;',
		));
		$this->addElement('submit','login',array(
			'label'=>'Login',
		));
	}
}