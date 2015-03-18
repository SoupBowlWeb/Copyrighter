<?php namespace Copyrighter;

use Copyrighter\CopyrightSymbol\Contracts\CopyrightSymbolGeneratorInterface;
use Copyrighter\CopyrightSymbol\CopyrightSymbol;
use Copyrighter\Year\Contracts\CurrentYearGeneratorInterface;
use Copyrighter\Year\CurrentYear;

class Copyrighter
{
    protected $copyrightSymbol;
    protected $year;

    public function __construct(CopyrightSymbolGeneratorInterface $copyrightSymbol, CurrentYearGeneratorInterface $year)
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
        return (string)$this->getCopyright();
    }
}
