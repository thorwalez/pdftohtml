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
 * Class SpecialNotes
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class SpecialNotes
{
    const FILED_POSITION_PATTERN = '%d %d moveto (%s) show';
    /** @var string */
    private $specialNotes;

    /**
     * SpecialNotes constructor.
     * @param string $specialNotes
     */
    public function __construct(string $specialNotes)
    {
        $this->specialNotes = $specialNotes;
    }

    /**
     * @notes Start from x=410 y=320 end by x=730 y=280
     *
     *
     * @return string
     */
    public function getSpecialNotes() : string
    {
        // @notes the middle of text area
        $xPosition = 500;
        $yPosition = 300;

        return \sprintf(
            self::FILED_POSITION_PATTERN,
            $xPosition,
            $yPosition,
            $this->specialNotes
        );
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getSpecialNotes() . \PHP_EOL;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->toString();
    }

}