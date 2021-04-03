<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Service;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractCheckField;

/**
 * Class SpecialExpress
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Service
 */
class SpecialExpress extends AbstractCheckField
{

    /**
     * @return string
     */
    public function getDocumentCheck()
    {
        $xPosition = 558;
        $yPosition = 435;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function getGoodsCheck()
    {
        $xPosition = 600;
        $yPosition = 435;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getDocumentCheck() . \PHP_EOL .
            $this->getGoodsCheck() . \PHP_EOL;
    }
}