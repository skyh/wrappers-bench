<?php

use PHPUnit\Framework\TestCase;

class DomDocumentWrapperTest extends TestCase {
	public function testNoLinks() {
		$this->wrapAndAssert(
		    "<html><body><a href=\"meow\">some text</a></body></html>",
            "<html><body><noindex><a href=\"meow\">some text</a></noindex></body></html>\n",
        );
	}

    private function wrapAndAssert($input, $expectation)
    {
        $this->assertEquals(DomDocumentWrapper::wrap($input), $expectation);
    }
}
