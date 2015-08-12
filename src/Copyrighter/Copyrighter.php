<?php namespace Copyrighter;

use Copyrighter\CopyrightSymbol\Contracts\CopyrightSymbolGeneratorInterface;
use Copyrighter\CopyrightSymbol\CopyrightSymbol;
use Copyrighter\Exceptions\InvalidConfigurationException;
use Copyrighter\Exceptions\InvalidGeoLocatorException;
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
    public static function show($config = [])
    {
        if (empty($config)) {
            echo new static(new CopyrightSymbol, new CurrentYear);
            return true;
        }

        if (! static::isValidConfig($config)) {
            throw new InvalidConfigurationException('Invalid configuration.');
        }

        echo (new static(new CopyrightSymbol, new CurrentYear))->enableGeoAwareWith($config['geo-locator']);
    }

    /**
     * Makes Copyrighter Geo Aware, returning the Year of remote user's timezone
     * @param $geoLocatorName
     */
    public function enableGeoAwareWith($geoLocatorName)
    {
        if (! $this->isValidGeoLocator($geoLocatorName)) {
            throw new InvalidGeoLocatorException('Supplied Geo Locator Not Supported. ("'.$geoLocatorName.'")');
        }

        $geoLocator = '\Copyrighter\GeoLocation\GeoLocators\\' . $geoLocatorName;
        $this->year->setGeoLocator(new $geoLocator);
        return $this;
    }

    public function __toString()
    {
        return (string)$this->getCopyright();
    }

    private function isValidGeoLocator($name)
    {
        $validGeoLocators = ['FreeGeoIP'];
        return in_array($name, $validGeoLocators);
    }

    public static function isValidConfig(Array $config)
    {
        return array_key_exists('geo-locator', $config);
    }
}
