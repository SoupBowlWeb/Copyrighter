<?php namespace Copyrighter\CopyrightSymbol\Contracts;

interface CopyrightSymbolGeneratorInterface
{
    /**
     * Returns the HTML entity name for the copyright symbol
     * @return string
     */
    public function getCopyrightSymbol();
}
