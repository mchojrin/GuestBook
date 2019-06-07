<?php

class Translator
{
    private $dictionary;

    /**
     * Translator constructor.
     * @param array $dictionary
     */
    public function __construct( array $dictionary )
    {
        $this->dictionary = $dictionary;
    }

    public function translate( string $message ) : string
    {
        return $this->dictionary[$message];
    }
}