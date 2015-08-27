<?php

class Enru_MadeBy_Model_Observer  {

    public function addLayoutUpdate(Varien_Event_Observer $observer) {

        $action = $observer->getEvent()->getAction();
        // only apply layout updates to our controller
        if ($action instanceof Enru_Madeby_ByController) {
		$update = $observer->getEvent()->getLayout()->getUpdate();
		$update->addHandle('enrumadeby_by');
        }

    }
}
