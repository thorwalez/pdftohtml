<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 4.04.2021
 * @version 0.0.0
 */

namespace ThorWalez\PdfToHtml\Readers;


use ThorWalez\PdfToHtml\Exceptions\Error\FileIsEmptyException;
use ThorWalez\PdfToHtml\Exceptions\Error\FileNotFoundException;

/**
 * Class TNTPostScriptReader
 * @package ThorWalez\PdfToHtml\Readers
 */
class TNTPostScriptReader
{
    const PATH_TO_FILE = '/var/www/app/data/';

    /** @var string */
    private $filename;

    /**
     * TNTPostScriptReader constructor.
     */
    public function __construct()
    {
        $this->filename = 'TNT_Vorlage.ps';
    }

    /**
     * @return string
     * @throws FileIsEmptyException
     * @throws FileNotFoundException
     */
    public function read()
    {
        $this->isFileExist();

        $content = \file_get_contents(self::PATH_TO_FILE . $this->filename);

        $this->isFileEmpty($content);

        return $content;
    }

    /**
     * @throws FileNotFoundException
     */
    protected function isFileExist()
    {
        if (\file_exists(self::PATH_TO_FILE . $this->filename) == false) {
            throw new FileNotFoundException("Datei: $this->filename konnten nicht gefunden!");
        }
    }

    /**
     * @param string $contents
     * @throws FileIsEmptyException
     */
    private function isFileEmpty($contents)
    {
        if(empty($contents) || $contents == ''){
            throw new FileIsEmptyException("Datei: $this->filename ist leer.");
        }
    }
}