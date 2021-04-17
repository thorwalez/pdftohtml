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
 * Class InsuranceAmount
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class InsuranceAmount extends AbstractCheckField
{
    /** @var string */
    private $insuranceAmount;

    /**
     * InsuranceAmount constructor.
     * @param string $insuranceAmount
     */
    public function __construct(string $insuranceAmount)
    {
        $this->insuranceAmount = $insuranceAmount;
    }

    /**
     * @return string
     */
    public function getInsuranceAmount() : string
    {
        $xPosition = 650;
        $yPosition = 345;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->insuranceAmount);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getInsuranceAmount() . \PHP_EOL;
    }
}