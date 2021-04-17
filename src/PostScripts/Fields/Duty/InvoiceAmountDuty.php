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