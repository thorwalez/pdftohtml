<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Service;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractCheckField;

/**
 * Class GlobalExpress
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Service
 */
class GlobalExpress extends AbstractCheckField
{

    /** @var bool */
    private $isDocumentCheck;

    /** @var bool */
    private $isGoodsCheck;

    /**
     * GlobalExpress constructor.
     * @param bool $isDocumentCheck
     * @param bool $isGoodsCheck
     */
    public function __construct(bool $isDocumentCheck = false, bool $isGoodsCheck = false)
    {
        $this->isDocumentCheck = $isDocumentCheck;
        $this->isGoodsCheck = $isGoodsCheck;
    }

    /**
     * @return string
     */
    public function getDocumentCheck() : string
    {
        $xPosition = 558;
        $yPosition = 380;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function getGoodsCheck() : string
    {
        $xPosition = 600;
        $yPosition = 380;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        $content = self::EMPTY_CONTENT_STRING_PATTERN;
        if ($this->isDocumentCheck) {
            $content .= $this->getDocumentCheck() . \PHP_EOL;
        }
        if ($this->isGoodsCheck) {
            $content .= $this->getGoodsCheck() . \PHP_EOL;
        }

        if ($content != self::EMPTY_CONTENT_STRING_PATTERN) {
            return $content;
        }
    }
}