# magento-made-by

Provides a /made/by URL for Magento to list products by the "manufacturer" attribute.

* Note: this is known to work on Magento v1.6 BUT currently not on v1.9.

This is due to the magic method used in app/code/local/Enru/MadeBy/controllers/ByController.php which no longer works in v1.9

	public function __call($method, $arg) {
		if($method != 'indexAction') {
			$manufacturer = preg_replace('/Action$/', '', $method);
			$this->getRequest()->setParam('manufacturer', $manufacturer);
			$this->indexAction();
		}
	}
	
Contributions are welcome that use more a modern router for dynamic methods.

If you don't have a lot of brands/manufacturers, a work around for v1.9 using the current code is to add you own methods instead of relying on the __call() method.

e.g. for the url http://www.example.com/made/by/acme

	public function acmeAction($method, $arg) {
			$this->getRequest()->setParam('manufacturer', 'acme');
			$this->indexAction();
		}
	}

# Example Use

If you have a manufacturer attribute option of "Acme" you can view a product listing of products which have that attribute value by using a URL like so:

http://example.com/made/by/acme

# Theming

You can copy the base template file *app/design/frontend/base/default/template/enrumadeby/product/list.phtml* into your theme. 

The layout uses the standard Magento product list template.
