<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class DangerousGoodsCheck
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class DangerousGoodsCheck extends AbstractCheckField
{
    /** @var boolean */
    private $isYes;

    /**
     * DangerousGoodsCheck constructor.
     * @param bool $isYes
     */
    public function __construct(bool $isYes = false)
    {
        $this->isYes = $isYes;
    }

    /**
     * @return string
     */
    public function getYesCheck()
    {
        $xPosition = 313;
        $yPosition = 135;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function getNoCheck()
    {
        $xPosition = 383;
        $yPosition = 135;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        if ($this->isYes) {
            return $this->getYesCheck() . \PHP_EOL;
        }
        return $this->getNoCheck() . \PHP_EOL;
    }
}