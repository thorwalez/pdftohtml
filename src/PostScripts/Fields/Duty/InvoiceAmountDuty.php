<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Duty;

use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractTextField;

/**
 * Class InvoiceAmountDuty
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Duty
 */
class InvoiceAmountDuty extends AbstractTextField
{
    /** @var  string*/
    private $invoiceAmount;

    /**
     * InvoiceAmountDuty constructor.
     * @param string $invoiceAmount
     */
    public function __construct(string $invoiceAmount)
    {
        $this->invoiceAmount = $invoiceAmount;
    }

    /**
     * @return string
     */
    public function getInvoiceAmount() : string
    {
        $xPosition = 500;
        $yPosition = 75;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->invoiceAmount);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getInvoiceAmount() . \PHP_EOL;
    }

}