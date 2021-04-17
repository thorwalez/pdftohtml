<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class CustomerInformations
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class CustomerInformations extends AbstractTextField
{
    /** @var string */
    private $customerInformations;

    /**
     * CustomerInformations constructor.
     * @param string $customerInformations
     */
    public function __construct(string $customerInformations)
    {
        $this->customerInformations = $customerInformations;
    }

    /**
     * @return string
     */
    public function getCustomerInformations() : string
    {
        $xPosition = 90;
        $yPosition = 508;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->customerInformations);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getCustomerInformations() . \PHP_EOL;
    }

}