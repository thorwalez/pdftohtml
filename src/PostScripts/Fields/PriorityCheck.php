<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class PriorityCheck
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class PriorityCheck extends AbstractCheckField
{
    /**
     * @return string
     */
    public function getPriorityCheck()
    {
        $xPosition = 715;
        $yPosition = 450;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getPriorityCheck() . \PHP_EOL;
    }
}