<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class AbstractTextField
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
abstract class AbstractTextField
{
    const FILED_POSITION_PATTERN = '%d %d moveto (%s) show';

    /**
     * @return string
     */
    abstract public function toString() : string;
    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->toString();
    }
}