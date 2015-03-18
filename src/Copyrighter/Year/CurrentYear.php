<?php namespace Copyrighter\Year;

use Copyrighter\Year\Contracts\CurrentYearGeneratorInterface;

class CurrentYear implements CurrentYearGeneratorInterface
{
    /**
     * Returns a 4-digit representation of the current year.
     * @return string
     */
    public function getCurrentYear()
    {
        return date('Y');
    }

    public function __toString()
    {
        return (string)$this->getCurrentYear();
    }
}
