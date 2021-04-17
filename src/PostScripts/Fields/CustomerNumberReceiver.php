<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class CustomerNumberReceiver
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class CustomerNumberReceiver extends AbstractTextField
{
    /** @var string */
    private $customerNumber;

    /**
     * CustomerNumberReceiver constructor.
     * @param string $customerNumber
     */
    public function __construct(string $customerNumber)
    {
        $this->customerNumber = $customerNumber;
    }

    /**
     * @return string
     */
    public function getCustomerNumber() : string
    {
        $xPosition = 300;
        $yPosition = 535;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->customerNumber);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getCustomerNumber() . \PHP_EOL;
    }

}