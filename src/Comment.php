<?php

class Comment
{
    private $author;
    private $contents;
    private $date;

    /**
     * Comment constructor.
     * @param string $author
     * @param string $contents
     */
    public function __construct( string $author, string $contents, DateTimeInterface $date = null )
    {
        $this->author = $author;
        $this->contents = $contents;
        $this->date = $date ? $date : new DateTimeImmutable();
    }

    public function getAuthor() : string
    {
        return $this->author;
    }

    public function getContents() : string
    {
        return $this->contents;
    }

    public function getDate() : DateTimeInterface
    {
        return $this->date;
    }
}