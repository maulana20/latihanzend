<?php

class Application_Model_Register
{
	protected $_username;
	protected $_realname;
	protected $_tradingname;
	protected $_email;
	protected $_phone1;
	protected $_phone2;
	protected $_phone3;
	protected $_address;
	protected $_postcode;
	protected $_city;
	protected $_state;
	protected $_country;
	protected $_status;
	protected $_desc;
	protected $_request;
    //protected $_contacttype;
    //protected $_phonetype1;
    //protected $_phonetype2;
    //protected $_password;
	protected $_id;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid  property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid  property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
			$names = explode("_", $key);
			$method_name = "";
			foreach ($names as $k => $v) {
				$method_name .= ucfirst($v);
			}
            $method = 'set' . $method_name;
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
	}

    public function setUserName($value)
    {
        $this->_username = (string) $value;
        return $this;
    }

    public function getUserName()
    {
        return $this->_username;
    }

    public function setRealname($value)
    {
        $this->_realname = (string) $value;
        return $this;
    }

    public function getRealname()
    {
        return $this->_realname;
    }

    public function setTradingName($value)
    {
        $this->_tradingname = (string) $value;
        return $this;
    }
	
	public function getTradingName()
    {
        return $this->_tradingname;
    }

    public function setEmail($value)
    {
        $this->_email = (string) $value;
        return $this;
    }
	
	public function getEmail()
    {
        return $this->_email;
    }

    public function setPhone1($value)
    {
        $this->_phone1 = (string) $value;
        return $this;
    }
	
	public function getPhone1()
    {
        return $this->_phone1;
    }

    public function setPhone2($value)
    {
        $this->_phone2 = (string) $value;
        return $this;
    }
	
	public function getPhone2()
    {
        return $this->_phone2;
    }

    public function setPhone3($value)
    {
        $this->_phone3 = (string) $value;
        return $this;
    }
	
	public function getPhone3()
    {
        return $this->_phone3;
    }

    public function setAddress($value)
    {
        $this->_address = (string) $value;
        return $this;
    }

    public function getAddress()
    {
        return $this->_address;
    }
	
    public function setPostCode($value)
    {
        $this->_postcode = (string) $value;
        return $this;
    }
	
	public function getPostCode()
    {
        return $this->_postcode;
    }

	public function setCity($value)
    {
        $this->_city = (string) $value;
        return $this;
    }

    public function getCity()
    {
        return $this->_city;
    }
	
    public function setState($value)
    {
        $this->_state= (string) $value;
        return $this;
    }

	public function getState()
    {
        return $this->_state;
    }
	
    public function setCountry($value)
    {
        $this->_country = (string) $value;
        return $this;
    }

	public function getCountry()
    {
        return $this->_country;
    }
	
    public function setStatus($value)
    {
        $this->_status = (string) $value;
        return $this;
    }
	
	public function getStatus()
    {
        return $this->_status;
    }

    public function setDesc($value)
    {
        $this->_desc = (string) $value;
        return $this;
    }
	
	public function getDesc()
    {
        return $this->_desc;
    }

    public function setRequest($value)
    {
        $this->_request = (string) $value;
        return $this;
    }
	
	public function getRequest()
    {
        return $this->_request;
    }

    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }
    public function getId()
    {
        return $this->_id;
    }
}

	