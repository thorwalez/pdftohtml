<?php


namespace ThorWalez\PdfToHtml\Converters;


class PostScriptToPdfConverter
{
    /** @var string */
    private $filenameWithPath;

    /**
     * PostScriptToPdfConverter constructor.
     * @param string $filenameWithPath
     */
    public function __construct(string $filenameWithPath)
    {
        $this->filenameWithPath = $filenameWithPath;
    }

    public function convert()
    {
        $pdfFilenameWithPath = \substr($this->filenameWithPath,0, -3);
        $command = "ps2pdf $this->filenameWithPath $pdfFilenameWithPath.pdf > /dev/null &";

        $resultCode = 0;
        $output = [];

        \exec($command, $output , $resultCode);

        \dump($output, $resultCode);
    }
}