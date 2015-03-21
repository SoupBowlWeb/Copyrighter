<?php namespace Copyrighter\GeoLocation\Contracts;

interface GeoLocatorInterface
{
    /**
     * @param $ipAddress
     * @return mixed
     */
    public function getTimezone($ipAddress);

} 