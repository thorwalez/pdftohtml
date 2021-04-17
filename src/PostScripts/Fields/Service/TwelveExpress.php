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

namespace ThorWalez\PdfToHtml\PostScripts\Fields\Service;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractCheckField;

/**
 * Class TwelveExpress
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Service
 */
class TwelveExpress extends AbstractCheckField
{
    /** @var bool */
    private $isDocumentCheck;

    /** @var bool */
    private $isGoodsCheck;

    /**
     * TwelveExpress constructor.
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
        $yPosition = 400;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function getGoodsCheck() : string
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