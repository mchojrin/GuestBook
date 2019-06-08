<?php

class CommentsRepository
{
    private $commentsFile;
    private $serializer;

    public function __construct(string $comments_file, CommentsSerializer $serializer )
    {
        $this->commentsFile = $comments_file;
        $this->serializer = $serializer;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function read() : array
    {
        return $this->serializer->unserialize( file_get_contents($this->commentsFile) );
    }

    /**
     * @param array $comments
     */
    public function save( array $comments )
    {
        file_put_contents( $this->commentsFile, $this->serializer->serialize( $comments ) );
    }
}