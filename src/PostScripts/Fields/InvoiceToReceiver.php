<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class InvoiceToReceiver
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class InvoiceToReceiver extends AbstractCheckField
{
    /**
     * @return string
     */
    public function getInvoiceCheck()
    {
        $xPosition = 125;
        $yPosition = 535;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getInvoiceCheck() . \PHP_EOL;
    }

}