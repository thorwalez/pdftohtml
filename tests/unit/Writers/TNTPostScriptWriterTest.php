<?php

namespace ThorWalez\PdfToHtml\Test\Writers;

use ThorWalez\PdfToHtml\Writers\TNTPostScriptWriter;
use PHPUnit\Framework\TestCase;

class TNTPostScriptWriterTest extends TestCase
{
    public function testWrite()
    {
        $instance = new TNTPostScriptWriter();

        $instance->write('test Inhalt');

        $timeStamp = \time();

        $this->assertTrue(\file_exists(TNTPostScriptWriter::PATH_TO_FILE . "TNT_Print_$timeStamp.ps"));
        \unlink(TNTPostScriptWriter::PATH_TO_FILE . "TNT_Print_$timeStamp.ps");
        $this->assertFalse(\file_exists(TNTPostScriptWriter::PATH_TO_FILE . "TNT_Print_$timeStamp.ps"));

    }
}
