<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$this->setMethod('post');
		$this->addElement('text','real_name',array(
			'label'=>'Real Name*',
			'required'=>true,
		));
		$this->addElement('text','address',array(
			'label'=>'Address',
		));
		$this->addElement('text','city',array(
			'label'=>'City',
		));
		$this->addElement('text','state',array(
			'label'=>'State',
		));
		$this->addElement('text','post_code',array(
			'label'=>'Post Code',
		));
		$this->addElement('text','email',array(
			'label'=>'Email*',
			'required'=>true,
			'filters'    => array('StringTrim'),
			'validators' => array(
				'EmailAddress',
			)
		));
		$this->addElement('text','contact',array(
			'label'=>'Contact',
		));
		$this->addElement('select','contact_type',array(
			'label'=>'',
			'multiOptions'=>array(
				'email' => 'EMAIL',
				'ym' => 'YM',
				'gtalk' => 'GTALK',
				'bb' => 'BB',
			),
		));
		$this->addElement('text','phone0',array(
			'label'=>'Phone 1',
		));
		$this->addElement('select','phone_type0',array(
			'label'=>'',
			'multiOptions'=>array(
				'office' => 'OFFICE',
				'mobile' => 'MOBILE',
				'home' => 'HOME',
				'hotel' => 'HOTEL',
				'fax' => 'FAX',
			),

		));
		$this->addElement('text','phone1',array(
			'label'=>'Phone 2',
		));
		$this->addElement('select','phone_type1',array(
			'label'=>'',
			'multiOptions'=>array(
				'office' => 'OFFICE',
				'mobile' => 'MOBILE',
				'home' => 'HOME',
				'hotel' => 'HOTEL',
				'fax' => 'FAX',
			),
		));
		$this->addElement('text','phone2',array(
			'label'=>'Phone 3',
		));
		$this->addElement('select','phone_type2',array(
			'label'=>'',
			'multiOptions'=>array(
				'office' => 'OFFICE',
				'mobile' => 'MOBILE',
				'home' => 'HOME',
				'hotel' => 'HOTEL',
				'fax' => 'FAX',
			),
		));
		$this->addElement('text','trading_name',array(
			'label'=>'Trading Name*',
			'required'=>true,
		));
		$this->addElement('password','password',array(
			'label'=>'Password*',
			'required'=>true,
		));
		$this->addElement('password','confirm_password',array(
			'label'=>'Confirm*',
			'required'=>true,
		));
		
		$this->addElement('submit','submit',array(
			'label'=>'Register',
		));
    }


}

