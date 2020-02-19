<?php

use PHPUnit\Framework\TestCase;

class PregWrapperTest extends TestCase
{
	public function testNoLinks()
    {
		$this->wrapAndAssert("Hello!", "Hello!");
	}

	public function testSingleLink()
    {
		$this->wrapAndAssert('<a href="some"></a>', "<noindex>(here)</noindex>");
	}

    public function testSomething()
    {
        $this->wrapAndAssert("12", "12");
    }

    private function wrapAndAssert($input, $expectation)
    {
		$this->assertEquals(PregWrapper::wrap($input), $expectation);
	}
}
