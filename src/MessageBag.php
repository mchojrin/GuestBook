<?php

class MessageBag
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

    public function getMessage(string $message ) : string
    {
        return $this->dictionary[$message];
    }
}