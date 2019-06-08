<?php

class CommentsJsonSerializer implements CommentsSerializer
{
    /**
     * @param Comment $comment
     * @return string
     */
    public function serialize( array $comments ) : string
    {
        return json_encode( array_map( function( Comment $comment ) : array {

            return [
                'author' => $comment->getAuthor(),
                'contents' => $comment->getContents(),
                'date' => $comment->getDate()->getTimestamp(),
            ];
        }, $comments ) );
    }

    /**
     * @param string $jsonString
     */
    public function unserialize( string $jsonString ) : array
    {
        $jsonArray = json_decode( $jsonString, true );

        $comments = [];

        foreach ( $jsonArray as $jsonComment ) {
            $comments[] = new Comment(
                $jsonComment['author'],
                $jsonComment['contents'],
                (new DateTimeImmutable)->setTimestamp($jsonComment['date'])
            );
        }

        return $comments;
    }
}