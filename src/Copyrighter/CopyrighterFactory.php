<?php namespace Copyrighter;

use Copyrighter\Copyrighter;
use Copyrighter\CopyrightSymbol\CopyrightSymbol;
use Copyrighter\Year\CurrentYear;

class CopyrighterFactory
{
    public static function create()
    {
        return new Copyrighter(new CopyrightSymbol, new CurrentYear);
    }
}