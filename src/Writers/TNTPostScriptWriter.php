<?php


namespace ThorWalez\PdfToHtml\Writers;


use ThorWalez\PdfToHtml\Exceptions\Error\FileIsEmptyException;
use ThorWalez\PdfToHtml\Exceptions\Error\FileNotFoundException;
use ThorWalez\PdfToHtml\Exceptions\Error\FileNotWriteableException;

class TNTPostScriptWriter
{
    const PATH_TO_FILE = '/var/www/app/data/';

    /** @var string */
    private $filename;

    /**
     * TNTPostScriptReader constructor.
     */
    public function __construct()
    {
        $timeStamp = \time();
        $this->filename = "TNT_Print_$timeStamp.ps";
    }

    /**
     * @param string $content
     * @return string
     * @throws FileIsEmptyException
     * @throws FileNotFoundException
     * @throws FileNotWriteableException
     */
    public function write(string $content) : string
    {
        $this->isFileEmpty($content);

        $this->isFileExist();


        if (\file_put_contents(self::PATH_TO_FILE . $this->filename, $content) === false) {
            throw new FileNotWriteableException("Datei $this->filename konnt nicht erstellt werden");
        }

        return self::PATH_TO_FILE . $this->filename;
    }

    /**
     * @throws FileNotFoundException
     */
    private function isFileExist()
    {
        if (\file_exists(self::PATH_TO_FILE . $this->filename)) {
            throw new FileNotFoundException("Datei: $this->filename existiert bereits!");
        }
    }

    /**
     * @param string $contents
     * @throws FileIsEmptyException
     */
    private function isFileEmpty(string $contents)
    {
        if (empty($contents) || $contents == '') {
            throw new FileIsEmptyException("Datei: $this->filename ist leer.");
        }
    }
}