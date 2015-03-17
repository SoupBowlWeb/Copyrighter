<?php

use \Copyrighter\Year\CurrentYear;

class CurrentYearTest extends PHPUnit_Framework_TestCase
{

    public function test_it_returns_non_empty_string()
    {
        $currentYear = new CurrentYear;
        $this->assertNotEmpty($currentYear->getCurrentYear());
    }

    public function test_it_returns_the_current_year()
    {
        $currentYear = new CurrentYear();
        $realYear = date('Y');
        $this->assertEquals($realYear, $currentYear->getCurrentYear());
    }

    public function test_it_can_be_echoed_to_string()
    {
        $currentYear = new CurrentYear;
        ob_start();
        echo $currentYear;
        $echo = ob_get_clean();
        $this->assertEquals($currentYear->getCurrentYear(), $echo);
    }
} 