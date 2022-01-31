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
 * Class CustomerNumberReceiver
 * @package ThorWalez\WaybillCreator\PostScripts\Fields
 */
class CustomerNumberReceiver extends AbstractTextField
{
    /** @var string */
    private $customerNumber;

    /**
     * CustomerNumberReceiver constructor.
     * @param string $customerNumber
     */
    public function __construct(string $customerNumber)
    {
        $this->customerNumber = $customerNumber;
    }

    /**
     * @return string
     */
    public function getCustomerNumber() : string
    {
        $xPosition = 300;
        $yPosition = 535;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->customerNumber);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getCustomerNumber() . \PHP_EOL;
    }

}