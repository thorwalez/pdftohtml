<?php

namespace ThorWalez\PdfToHtml\Test\Converters;

use PHPUnit\Framework\TestCase;
use ThorWalez\PdfToHtml\Converters\PostScriptToPdfConverter;

/**
 * Class PostScriptToPdfConverterTest
 * @package ThorWalez\PdfToHtml\Test\Converters
 */
class PostScriptToPdfConverterTest extends TestCase
{
    const TEST_HEADER_PD_CONTENT = '%!PS-Adobe-3.0
%% Example 1
newpath
100 200 moveto
200 250 lineto
100 300 lineto
2 setlinewidth
stroke
showpage';

    public function testConvertRun()
    {
        $path = \dirname(__DIR__, 2) . '/_data';

        $this->createPostScriptTestFile($path);

        $instance = new PostScriptToPdfConverter("$path/Test.ps");
        $instance->convert();

        \sleep(2);
        $this->assertTrue(\file_exists("$path/Test.pdf"));
        \unlink("$path/Test.pdf");
        \unlink("$path/Test.ps");
        $this->assertFalse(\file_exists("$path/Test.pdf"));
        $this->assertFalse(\file_exists("$path/Test.ps"));

    }

    /**
     * @param string $path
     */
    private function createPostScriptTestFile(string $path)
    {
        \file_put_contents("$path/Test.ps", self::TEST_HEADER_PD_CONTENT);
    }
}
