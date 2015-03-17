<?php

use \Copyrighter\CopyrightSymbol\CopyrightSymbol;

class CopyrightSymbolTest extends PHPUnit_Framework_TestCase
{

    public function test_it_returns_non_empty_string()
    {
        $copyrightSymbol = new CopyrightSymbol;
        $this->assertNotEmpty($copyrightSymbol->getCopyrightSymbol());
    }

    public function test_it_returns_the_copyright_symbol()
    {
        $copyrightSymbol = new CopyrightSymbol;
        $this->assertEquals('&copy;', $copyrightSymbol->getCopyrightSymbol());
    }

    public function test_it_can_be_echoed_to_string()
    {
        $copyrightSymbol = new CopyrightSymbol;
        ob_start();
        echo $copyrightSymbol;
        $echo = ob_get_clean();
        $this->assertEquals($copyrightSymbol->getCopyrightSymbol(), $echo);
    }
} 