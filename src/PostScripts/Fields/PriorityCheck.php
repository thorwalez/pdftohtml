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
 * Class PriorityCheck
 * @package ThorWalez\WaybillCreator\PostScripts\Fields
 */
class PriorityCheck extends AbstractCheckField
{
    /**
     * @return string
     */
    public function getPriorityCheck()
    {
        $xPosition = 715;
        $yPosition = 450;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, self::CHECK_ICON_PATTERN);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getPriorityCheck() . \PHP_EOL;
    }
}