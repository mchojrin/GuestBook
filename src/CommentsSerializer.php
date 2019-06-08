<?php

interface CommentsSerializer
{
    public function serialize( array $comments ) : string;

    public function unserialize( string $jsonString ) : array;
}