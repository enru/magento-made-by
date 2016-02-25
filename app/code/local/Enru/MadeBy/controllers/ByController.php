<?php

class Enru_MadeBy_ByController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		$manufacturer = filter_var($this->getRequest()->getParam('manufacturer'));

		$this->loadLayout();
		$this->renderLayout();

		//Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
		//Zend_Debug::dump($manufacturer);
	}

    public function getActionMethodName($action)
    {
		if(Mage::helper('enrumadeby')->manufacturerExists($action)) {
            $action = 'default';
		}
        return $action . 'Action';
    }

	public function defaultAction() {
        $manufacturer = $this->getRequest()->getActionName();
        $this->getRequest()->setParam('manufacturer', $manufacturer);
        $this->indexAction();
	}

}

