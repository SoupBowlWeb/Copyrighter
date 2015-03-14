<?php namespace Copyrighter;

use Copyrighter\CopyrightSymbol\CopyrightSymbol;
use Copyrighter\Year\CurrentYear;

class Copyrighter
{
    protected $copyrightSymbol;
    protected $year;

    public function __construct(CopyrightSymbol $copyrightSymbol, CurrentYear $year)
    {
        $this->copyrightSymbol = $copyrightSymbol;
        $this->year = $year;
    }

    /**
     * Get the copyright string
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyrightSymbol . ' ' . $this->year;
    }

    /**
     * Show the copyright string
     */
    public static function show()
    {
        echo (new static(new CopyrightSymbol, new CurrentYear));
    }

    public function __toString()
    {
        return $this->getCopyright();
    }
}
