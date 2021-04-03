<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class AbstractCheckField
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
abstract class AbstractCheckField
{
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