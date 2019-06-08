<?php

use PHPUnit\Framework\TestCase;

class CommentsJsonSerializerTest extends TestCase
{
    public function testSerializeWillReturnValidJson()
    {
        $sut = new CommentsJsonSerializer();
        $date = new DateTimeImmutable('first day of last month');

        $this->assertJson( $sut->serialize( [ new Comment(
            'Mauro',
            'Great comment!',
            $date
        ) ] ) );
    }

    public function testUnserializeWillReturnAnArrayOfComments()
    {
        $sut = new CommentsJsonSerializer();
        $date = new DateTimeImmutable('first day of last month');
        $comment = json_encode(
            [
                [
                    'author' => 'Mauro',
                    'contents' => 'A comment',
                    'date' => $date->getTimestamp(),
                ]
            ]
        );

        foreach ( $sut->unserialize( $comment ) as $comment ) {
            $this->assertInstanceOf( Comment::class, $comment );
        }
    }

    public function testUnserializeASerializedCommentWillReturnTheOriginalComment()
    {
        $sut = new CommentsJsonSerializer();
        $date = new DateTimeImmutable('first day of last month');
        $comments = [
            new Comment(
            'Mauro',
            'Great comment!',
            $date
        )];

        $this->assertEquals( $comments, $sut->unserialize( $sut->serialize( $comments ) ) );
    }
}
