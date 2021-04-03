<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields\Goods;


use ThorWalez\PdfToHtml\PostScripts\Fields\AbstractTable;

/**
 * Class ThirdGood
 * @package ThorWalez\PdfToHtml\PostScripts\Fields\Goods
 */
class ThirdGood extends AbstractTable
{
    const GLOBAL_Y_COORDINATES = 198;

    /** @var string */
    private $description;

    /** @var string */
    private $piece;

    /** @var string */
    private $weight;

    /** @var string */
    private $firstDimension;

    /** @var string */
    private $secondDimension;

    /** @var string */
    private $thirdDimension;

    /**
     * FirstGood constructor.
     * @param array $data
     * @example [ 'description' => 'User Text', 'piece' => '11', ... ]
     */
    public function __construct( array $data    ) {
        $this->description = $data['description'];
        $this->piece = $data['piece'];
        $this->weight = $data['weight'];
        $this->firstDimension = $data['firstDimension'];
        $this->secondDimension = $data['secondDimension'];
        $this->thirdDimension = $data['thirdDimension'];
    }

    /**
     * @return string
     */
    public function getGoodsDescription() : string
    {
        $xPosition = 415;
        $yPosition = self::GLOBAL_Y_COORDINATES;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->description);
    }

    /**
     * @return string
     */
    public function getGoodsPiece() : string
    {
        $xPosition = 542;
        $yPosition = self::GLOBAL_Y_COORDINATES;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->piece);
    }

    /**
     * @return string
     */
    public function getGoodsWeight() : string
    {
        $xPosition = 572;
        $yPosition = self::GLOBAL_Y_COORDINATES;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->weight);
    }

    /**
     * @return string
     */
    public function getGoodsFirstDimension() : string
    {
        $xPosition = 662;
        $yPosition = self::GLOBAL_Y_COORDINATES;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->firstDimension);
    }

    /**
     * @return string
     */
    public function getGoodsSecondDimension() : string
    {
        $xPosition = 692;
        $yPosition = self::GLOBAL_Y_COORDINATES;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->secondDimension);
    }

    /**
     * @return string
     */
    public function getGoodsThirdDimension() : string
    {
        $xPosition = 712;
        $yPosition = self::GLOBAL_Y_COORDINATES;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->thirdDimension);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getGoodsDescription() . \PHP_EOL .
        $this->getGoodsPiece() . \PHP_EOL .
        $this->getGoodsWeight() . \PHP_EOL .
        $this->getGoodsFirstDimension() . \PHP_EOL .
        $this->getGoodsSecondDimension() . \PHP_EOL .
        $this->getGoodsThirdDimension() . \PHP_EOL ;
    }

}