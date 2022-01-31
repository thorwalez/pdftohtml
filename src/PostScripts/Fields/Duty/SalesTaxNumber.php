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

namespace ThorWalez\WaybillCreator\PostScripts\Fields\Duty;


use ThorWalez\WaybillCreator\PostScripts\Fields\AbstractTextField;

/**
 * Class SalesTaxNumber
 * @package ThorWalez\WaybillCreator\PostScripts\Fields\Duty
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