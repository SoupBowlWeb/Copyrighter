<?php namespace Copyrighter\Year\Contracts;

interface CurrentYearGeneratorInterface
{
    /**
     * Returns a 4-digit representation of the current year.
     * @return string
     */
    public function getCurrentYear();
}
