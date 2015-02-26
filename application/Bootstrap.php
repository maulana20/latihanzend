<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
		$this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
		$view->headTitle('Rits');
		$view->headLink()->appendStylesheet('/css/mycss.css');
		$view->headScript()->appendFile('/js/jquery-1.7.2.min.js');
	}
}

