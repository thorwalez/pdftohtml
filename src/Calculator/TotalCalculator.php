<?php


namespace ThorWalez\PdfToHtml\Calculator;

/**
 * Class TotalCalculator
 * @package ThorWalez\PdfToHtml\Calculator
 */
class TotalCalculator
{
    const COMMA_PATTERN = ',';

    const POINT_PATTERN = '.';

    /** @var array */
    private $singleValues = [];

    /**
     * TotalCalculator constructor.
     * @param array $singleValues
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