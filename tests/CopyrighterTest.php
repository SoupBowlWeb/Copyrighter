<?php

use Copyrighter\Copyrighter;
use Copyrighter\CopyrightSymbol\CopyrightSymbol;
use Copyrighter\Year\CurrentYear;

class CopyrighterTest extends PHPUnit_Framework_TestCase
{

    public function test_it_returns_non_empty_string()
    {
        $copyrighter = new Copyrighter(new CopyrightSymbol, new CurrentYear);
        $this->assertNotEmpty($copyrighter->getCopyright());
    }

    public function test_it_can_be_echoed_to_string()
    {
        $copyrighter = new Copyrighter(new CopyrightSymbol, new CurrentYear);
        ob_start();
        Copyrighter::show();
        $echo = ob_get_clean();
        $this->assertEquals($copyrighter->getCopyright(), $echo);
    }
} 