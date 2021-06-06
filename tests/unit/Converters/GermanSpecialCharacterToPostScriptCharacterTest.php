<?php

namespace ThorWalez\PdfToHtml\Test\Converters;

use ThorWalez\PdfToHtml\Converters\GermanSpecialCharacterToPostScriptCharacter;
use PHPUnit\Framework\TestCase;

class GermanSpecialCharacterToPostScriptCharacterTest extends TestCase
{
    public function testConvertRun()
    {
        $instance = new GermanSpecialCharacterToPostScriptCharacter();

        $this->assertEquals('\201', $instance->convert('ü'));
    }

}
