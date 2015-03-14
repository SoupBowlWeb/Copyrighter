<?php namespace Copyrighter\CopyrightSymbol;

use Copyrighter\CopyrightSymbol\Contracts\CopyrightSymbolGeneratorInterface;

class CopyrightSymbol implements CopyrightSymbolGeneratorInterface
{
    /**
     * Returns the HTML entity name for the copyright symbol
     * @return string
     */
    public function getCopyrightSymbol()
    {
        return '&copy;';
    }
}