<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Service;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractCheckField;

/**
 * Class EconomyExpress
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Service
 */
class EconomyExpress extends AbstractCheckField
{

    /**
     * @return string
     */
    public function getGoodsCheck()
    {
        $xPosition = 600;
        $yPosition = 365;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getGoodsCheck() . \PHP_EOL;
    }
}