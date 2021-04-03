<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Duty;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractTextField;

/**
 * Class SalesTaxNumber
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Duty
 */
class SalesTaxNumber extends AbstractTextField
{
    /** @var  string*/
    private $salesTaxNumber;

    /**
     * SalesTaxNumber constructor.
     * @param string $salesTaxNumber
     */
    public function __construct(string $salesTaxNumber)
    {
        $this->salesTaxNumber = $salesTaxNumber;
    }

    /**
     * @return string
     */
    public function getSalesTaxNumber() : string
    {
        $xPosition = 450;
        $yPosition = 110;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->salesTaxNumber);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getSalesTaxNumber() . \PHP_EOL;
    }

}