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
 * Class SenderDate
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class SenderDate extends AbstractTextField
{
    /** @var string */
    private $senderDate;

    /**
     * CustomerNumberReceiver constructor.
     * @param string $senderDate
     */
    public function __construct(string $senderDate = '')
    {
        if (\trim($senderDate) === '') {
            $date = new \DateTime();
            $senderDate = $date->format('d.m.Y');
        }
        $this->senderDate = $senderDate;
    }

    /**
     * @return string
     */
    public function getSenderDate() : string
    {
        $xPosition = 130;
        $yPosition = 75;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->senderDate);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getSenderDate() . \PHP_EOL;
    }
}