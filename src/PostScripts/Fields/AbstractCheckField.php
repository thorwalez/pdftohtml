<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 4.03.2021
 * @version 0.0.0
 */

namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class AbstractCheckField
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
abstract class AbstractCheckField
{
    const EMPTY_CONTENT_STRING_PATTERN = '';
    const FILED_POSITION_PATTERN = '%d %d moveto (%s) show';

    const CHECK_ICON_PATTERN = 'X';

    /**
     * @return string
     */
    abstract public function toString() : string ;
    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->toString();
    }
}