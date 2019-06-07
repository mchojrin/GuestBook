<?php

use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    public function testNewCommentsWillBeDatedWithCurrentDateIfNotExplicitlyProvided()
    {
        $sut = new Comment( 'Mauro', 'This is a comment!' );
        $today = new DateTime();

        $this->assertEquals( $today->format('Y-m-d' ), $sut->getDate()->format('Y-m-d'));
    }

    public function testNewCommentsWillBeDatedWithParameterIfExplicitlyProvided()
    {
        $yesterday = new DateTime('Yesterday');
        $sut = new Comment( 'Mauro', 'This is a comment!', $yesterday );

        $this->assertEquals( $yesterday->format('Y-m-d' ), $sut->getDate()->format('Y-m-d'));
    }
}
