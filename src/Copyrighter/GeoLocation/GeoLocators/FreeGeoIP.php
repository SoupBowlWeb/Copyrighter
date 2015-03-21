<?php namespace Copyrighter\GeoLocation\GeoLocators;

use Copyrighter\GeoLocation\Contracts\GeoLocatorInterface;

class FreeGeoIP implements GeoLocatorInterface
{
    protected $baseURL = 'http://freegeoip.net/json/';

    /**
     * @param $ipAddress
     * @return mixed
     */
    public function getTimezone($ipAddress)
    {
        $response = file_get_contents($this->baseURL . $ipAddress);
        return json_decode($response)->time_zone;
    }


} 