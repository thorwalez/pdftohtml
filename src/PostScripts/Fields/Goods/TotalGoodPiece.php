<?php

namespace ThorWalez\PdfToHtml\PostScripts\Fields\Goods;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractTextField;

/**
 * Class TotalGoodPiece
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Goods
 */
class TotalGoodPiece extends AbstractTextField
{
    /** @var string */
    private $total;

    /**
     * TotalGoodPiece constructor.
     * @param string $total
     */
    public function __construct(string $total)
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getTotalPiece() : string
    {
        $xPosition = 542;
        $yPosition = 150;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->total);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getTotalPiece() . \PHP_EOL;
    }

}