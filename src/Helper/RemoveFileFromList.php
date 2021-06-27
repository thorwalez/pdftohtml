<?php
/**
 * Copyright (c) 2021.
 * Created By
 *
 * @author    Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created   27.06.2021
 */

namespace ThorWalez\PdfToHtml\Helper;

/**
 * Class RemoveFileFromList
 *
 * @package ThorWalez\PdfToHtml\Helper
 */
class RemoveFileFromList
{
    const FILE_PATH = '/var/www/app/data/';

    /**
     * @param string $filename
     */
    public function remove(string $filename)
    {
        $file = self::FILE_PATH . $filename;
        \rename($file, \mb_substr($file,0,-3) . 'remove');
    }
}