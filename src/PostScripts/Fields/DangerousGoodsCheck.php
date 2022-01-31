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

namespace ThorWalez\WaybillCreator\PostScripts\Fields;

/**
 * Class DangerousGoodsCheck
 * @package ThorWalez\WaybillCreator\PostScripts\Fields
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