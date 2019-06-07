<?php

use PHPUnit\Framework\TestCase;

class TranslatorTest extends TestCase
{
    public function testTranslate()
    {
        $sut = new Translator( [
            'Message1' => 'One',
            'Message2' => 'Two',
        ] );

        $this->assertEquals( 'One', $sut->translate( 'Message1' ) );
    }
}
