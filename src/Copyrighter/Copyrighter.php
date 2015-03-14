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
        $copyrightSymbol = $this->copyrightSymbol->getCopyrightSymbol();
        $currentYear = $this->year->getCurrentYear();
        return $copyrightSymbol . ' ' . $currentYear;
    }

    /**
     * Show the copyright string
     */
    public static function show()
    {
        $copyrighter = new static(new CopyrightSymbol, new CurrentYear);
        echo $copyrighter->getCopyright();
    }

} 