<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author    Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created   4.04.2021
 * @version   0.0.0
 */

namespace ThorWalez\PdfToHtml\Converters;

/**
 * Class PostScriptToPdfConverter
 * @package ThorWalez\PdfToHtml\Converters
 */
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
        $pdfFilenameWithPath = \substr($this->filenameWithPath, 0, -3);
        $command = "ps2pdf $this->filenameWithPath $pdfFilenameWithPath.pdf > /dev/null &";

        $resultCode = 0;
        $output = [];

        \exec($command, $output, $resultCode);
    }
}