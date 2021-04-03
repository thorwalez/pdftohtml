<?php


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