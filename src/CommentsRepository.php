<?php

class CommentsRepository
{
    private $commentsFile;

    public function __construct(string $comments_file)
    {
        $this->commentsFile = $comments_file;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function read() : array
    {
        $json = file_get_contents($this->commentsFile);
        $comments = [];

        foreach (json_decode($json, true) as $jsonArray) {
            $comments[] =
                new Comment(
                    $jsonArray['Author'],
                    $jsonArray['Contents'],
                    new DateTimeImmutable($jsonArray['Date'])
                );
        }

        return $comments;
    }

    /**
     * @param array $comments
     */
    public function save( array $comments )
    {
        file_put_contents($this->commentsFile, json_encode($comments));
    }
}