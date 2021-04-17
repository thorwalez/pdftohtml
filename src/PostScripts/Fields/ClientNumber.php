<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class ClientNumber
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class ClientNumber extends AbstractTextField
{
    /** @var string */
    private $clientNumber;

    /**
     * ClientNumber constructor.
     * @param string $clientNumber
     */
    public function __construct(string $clientNumber)
    {
        $this->clientNumber = $clientNumber;
    }

    /**
     * @return string
     */
    public function getClientNumber() : string
    {
        $xPosition = 300;
        $yPosition = 560;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->clientNumber);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getClientNumber() . \PHP_EOL;
    }

}