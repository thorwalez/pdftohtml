<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author    Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created   6.06.2021
 * @version   0.0.0
 */

namespace ThorWalez\PdfToHtml\Viewer;

/**
 * Class FileListViewer
 * @package ThorWalez\PdfToHtml\Viewer
 */
class FileListViewer
{
    const FILE_PATH = '/var/www/app/data/';

    public function view() : array
    {
        $listFileScan = \scandir(self::FILE_PATH);

        $showFileList = [];
        foreach ($listFileScan as $fileItem) {
            if (\strpos($fileItem, 'TNT_Print') === false || \strpos($fileItem, '.pdf') === false) {
                continue;
            }
            $showFileList[$fileItem] = self::FILE_PATH . $fileItem;
        }

        return $showFileList;
    }
}
