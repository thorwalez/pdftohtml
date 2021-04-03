<?php


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