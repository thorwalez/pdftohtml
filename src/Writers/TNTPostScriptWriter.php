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

namespace ThorWalez\WaybillCreator\Writers;


use ThorWalez\WaybillCreator\Exceptions\Error\FileIsEmptyException;
use ThorWalez\WaybillCreator\Exceptions\Error\FileNotFoundException;
use ThorWalez\WaybillCreator\Exceptions\Error\FileNotWriteableException;

/**
 * Class TNTPostScriptWriter
 * @package ThorWalez\WaybillCreator\Writers
 */
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