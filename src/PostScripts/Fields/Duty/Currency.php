<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Duty;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractTextField;

/**
 * Class Currency
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Duty
 */
class Currency extends AbstractTextField
{
    /** @var  string*/
    private $currency;

    /**
     * Currency constructor.
     * @param string $currency
     */
    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCurrency() : string
    {
        $xPosition = 420;
        $yPosition = 75;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->currency);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getCurrency() . \PHP_EOL;
    }

}