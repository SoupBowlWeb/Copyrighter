<?php namespace Copyrighter;

use Copyrighter\CopyrightSymbol\CopyrightSymbol;
use Copyrighter\Year\CurrentYear;

class CopyrighterFactory
{
    public static function create($config = [])
    {
        return Copyrighter::isValidConfig($config) ?
            (new Copyrighter(new CopyrightSymbol, new CurrentYear))->enableGeoAwareWith($config['geo-locator']) :
            new Copyrighter(new CopyrightSymbol, new CurrentYear);
    }
}