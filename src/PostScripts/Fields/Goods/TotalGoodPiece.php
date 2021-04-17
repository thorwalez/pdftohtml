<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 4.03.2021
 * @version 0.0.0
 */
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