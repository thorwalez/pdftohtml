<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Goods;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractTextField;

/**
 * Class TotalGoodWeight
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Goods
 */
class TotalGoodWeight extends AbstractTextField
{
    /** @var  string*/
    private $total;

    /**
     * TotalGoodWeight constructor.
     * @param string $total
     */
    public function __construct(string $total)
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getTotalWeight() : string
    {
        $xPosition = 572;
        $yPosition = 150;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->total);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getTotalWeight() . \PHP_EOL;
    }

}