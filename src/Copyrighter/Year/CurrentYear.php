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
        if (! $this->hasGeoLocator()) {
            return (new \DateTime)->format('Y');
        }
        $timezone = $this->geoLocator->getTimezone($this->getClientIp());

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

    private function getClientIp()
    {
        $ipAddress = null;

        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif(getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif(getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif(getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif(getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif(getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        }

        return $ipaddress;
    }
}
