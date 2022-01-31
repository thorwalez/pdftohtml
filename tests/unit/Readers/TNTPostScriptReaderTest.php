<?php

namespace ThorWalez\WaybillCreator\Test\Readers;

use ThorWalez\WaybillCreator\Readers\TNTPostScriptReader;
use PHPUnit\Framework\TestCase;

class TNTPostScriptReaderTest extends TestCase
{
    public function testRead()
    {
        $selfBuild = false;
        $path = TNTPostScriptReader::ALTERNATE_PATH_TO_FILE;
        $filename = 'TNT_Vorlage.ps';
        if (\file_exists($path . $filename) == false){
            $selfBuild = true;
            \file_put_contents($path . $filename, 'Test File');
        }

        $instance = new TNTPostScriptReader();
        $content = $instance->read();

        if ($selfBuild && \file_exists(TNTPostScriptReader::PATH_TO_FILE . $filename) == false){
            $this->assertEquals('Test File', $content);
        }
        $this->assertNotEmpty($content);
        if (\file_exists($path . $filename) && $selfBuild){
            \unlink($path . $filename);
        }

        $this->assertFalse(\file_exists($path . $filename));
    }

}
