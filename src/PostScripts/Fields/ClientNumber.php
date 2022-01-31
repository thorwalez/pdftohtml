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
 * Class ClientNumber
 * @package ThorWalez\WaybillCreator\PostScripts\Fields
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