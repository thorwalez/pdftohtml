<?php


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