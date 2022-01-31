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
 * Class Currency
 * @package ThorWalez\WaybillCreator\PostScripts\Fields\Duty
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