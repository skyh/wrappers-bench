<?php

/**
 * @BeforeMethods({"prepareHtml"})
 */
class WrappersBench {
	private $html;

	public function prepareHtml() {
		$this->html = file_get_contents(dirname(__FILE__)."/sample1.html");
	}

	/**
	 * @Iterations(5)
	 */
	public function benchPregWrapper() {
		$result = PregWrapper::wrap($this->html);
		return strlen($result);
	}

	/**
	 * @Iterations(5)
	 */
	public function benchTokenWrapper() {
        $result = DomDocumentWrapper::wrap($this->html);
        return strlen($result);
	}
}
