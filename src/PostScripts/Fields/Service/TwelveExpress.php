<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Service;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractCheckField;

/**
 * Class TwelveExpress
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Service
 */
class TwelveExpress extends AbstractCheckField
{

    /**
     * @return string
     */
    public function getDocumentCheck()
    {
        $xPosition = 558;
        $yPosition = 400;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function getGoodsCheck()
    {
        $xPosition = 600;
        $yPosition = 400;

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