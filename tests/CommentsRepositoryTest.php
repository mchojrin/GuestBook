<?php

use PHPUnit\Framework\TestCase;

class CommentsRepositoryTest extends TestCase
{
    public function testGetCommentsWillReturnACommentsArray()
    {
        $jsonFile = 'test_comments.json';
        $sut = new CommentsRepository( $jsonFile );

        foreach ( $sut->getComments() as $comment ) {
            $this->assertInstanceOf( Comment::class, $comment );
        }
    }
}