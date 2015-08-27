<?php

class Enru_MadeBy_ByController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		$manufacturer = filter_var($this->getRequest()->getParam('manufacturer'));

		$this->loadLayout();

		$update = $this->getLayout()->getUpdate();
		$update->addHandle('enrumadeby_by');
		$this->loadLayoutUpdates();
		$this->generateLayoutXml()->generateLayoutBlocks();

		$this->renderLayout();
		//Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
	}

	public function __call($method, $arg) {
		if($method != 'indexAction') {
			$manufacturer = preg_replace('/Action$/', '', $method);
			$this->getRequest()->setParam('manufacturer', $manufacturer);
			$this->indexAction();
		}
	}
}

