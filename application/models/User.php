<?php

class Application_Model_User
{
    protected $_name;
    protected $_password;
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
            throw new Exception('Invalid  set name');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid  get name');
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

    public function setName($value)
    {
        $this->_name = (string) $value;
        return $this;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setPassword($value)
    {
        $this->_password = (string) $value;
        return $this;
    }

    public function getPassword()
    {
        return $this->_password;
    }

	public function setId($value)
    {
        $this->_id = (int) $value;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }
}

