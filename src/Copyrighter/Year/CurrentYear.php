<?php namespace Copyrighter\Year;

use Copyrighter\GeoLocation\Contracts\GeoLocatorInterface;
use Copyrighter\Year\Contracts\CurrentYearGeneratorInterface;

class CurrentYear implements CurrentYearGeneratorInterface
{
    protected $geoLocator = null;

    /**
     * Returns a 4-digit representation of the current year.
     * @return string
     */
    public function getCurrentYear()
    {
        if(! $this->hasGeoLocator()) {
            return (new \DateTime)->format('Y');
        }

        $timezone = $this->geoLocator->getTimezone();
        return (new \DateTime(null, new \DateTimeZone($timezone)))->format('Y');
    }

    /**
     * @param GeoLocatorInterface $geoLocator
     */
    public function setGeoLocator(GeoLocatorInterface $geoLocator)
    {
        $this->geoLocator = $geoLocator;
        return $this;
    }

    /**
     * @return null
     */
    public function getGeoLocator()
    {
        return $this->geoLocator;
    }

    public function __toString()
    {
        return (string)$this->getCurrentYear();
    }

    private function hasGeoLocator()
    {
        return $this->geoLocator !== null;
    }
}
