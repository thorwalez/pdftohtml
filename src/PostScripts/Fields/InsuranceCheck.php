<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class InsuranceCheck
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class InsuranceCheck extends AbstractCheckField
{
    /**
     * @return string
     */
    public function getInsuranceCheck() : string
    {
        $xPosition = 715;
        $yPosition = 410;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getInsuranceCheck() . \PHP_EOL;
    }
}