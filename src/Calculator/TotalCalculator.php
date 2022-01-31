<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author    Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created   4.04.2021
 * @version   0.0.0
 */

namespace ThorWalez\WaybillCreator\Calculator;

/**
 * Class TotalCalculator
 * @package ThorWalez\WaybillCreator\Calculator
 */
class TotalCalculator
{
    const COMMA_PATTERN = ',';

    const POINT_PATTERN = '.';

    /** @var array<string> $singleValues */
    private $singleValues = [];

    /**
     * TotalCalculator constructor.
     * @param array<string> $singleValues
     */
    public function __construct(array $singleValues)
    {
        $this->singleValues = $singleValues;
    }

    /**
     * @param float $x
     * @param float $y
     * @return string
     */
    public function total(float $x = 0, float $y = 0) : string
    {
        if (empty($this->singleValues)) {
            return \strval($x + $y);
        }

        $total = 0;
        foreach ($this->singleValues as $item) {
            $total += \floatval($this->replaceSeparator($item));
        }

        return $this->replaceSeparator(\strval($total));
    }

    /**
     * @param string $value
     * @return string
     */
    private function replaceSeparator(string $value) : string
    {
        if (\strpos($value, self::COMMA_PATTERN) !== false) {
            return \str_replace(self::COMMA_PATTERN, self::POINT_PATTERN, $value);
        }

        return \str_replace(self::POINT_PATTERN, self::COMMA_PATTERN, $value);
    }

}