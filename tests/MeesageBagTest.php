<?php

use PHPUnit\Framework\TestCase;

class MeesageBagTest extends TestCase
{
    public function testTranslate()
    {
        $sut = new MessageBag( [
            'Message1' => 'One',
            'Message2' => 'Two',
        ] );

        $this->assertEquals( 'One', $sut->getMessage( 'Message1' ) );
    }
}
