<?php

namespace ThorWalez\WaybillCreator\Test\Converters;

use ThorWalez\WaybillCreator\Converters\GermanSpecialCharacterToPostScriptCharacter;
use PHPUnit\Framework\TestCase;

class GermanSpecialCharacterToPostScriptCharacterTest extends TestCase
{
    public function testConvertRun()
    {
        $instance = new GermanSpecialCharacterToPostScriptCharacter();

        $this->assertEquals('\201', $instance->convert('ü'));
    }

}
