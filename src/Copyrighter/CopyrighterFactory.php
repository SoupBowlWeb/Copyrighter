<?php namespace Copyrighter;

use Copyrighter\CopyrightSymbol\CopyrightSymbol;
use Copyrighter\Exceptions\InvalidConfigurationException;
use Copyrighter\Year\CurrentYear;

class CopyrighterFactory
{
    public static function create($config = [])
    {
        if (empty($config)) {
            return new Copyrighter(new CopyrightSymbol, new CurrentYear);
        }

        if (! Copyrighter::isValidConfig($config)) {
            throw new InvalidConfigurationException('Invalid configuration.');
        }

        return (new Copyrighter(new CopyrightSymbol, new CurrentYear))->enableGeoAwareWith($config['geo-locator']);
    }
}
