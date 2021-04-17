<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class AbstractTable
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
abstract class AbstractTable
{
    const FILED_POSITION_PATTERN = '%d %d moveto (%s) show';


    /** @return string */
    abstract public function getGoodsDescription() : string;

    /** @return string */
    abstract public function getGoodsPiece() : string;

    /** @return string */
    abstract public function getGoodsWeight() : string;

    /** @return string */
    abstract public function getGoodsFirstDimension() : string;

    /** @return string */
    abstract public function getGoodsSecondDimension() : string;

    /** @return string */
    abstract public function getGoodsThirdDimension() : string;

    /**
     * @return string
     */
    abstract public function toString() : string;
    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->toString();
    }
}