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

namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class CustomerInformations
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class CustomerInformations extends AbstractTextField
{
    /** @var string */
    private $customerInformations;

    /**
     * CustomerInformations constructor.
     * @param string $customerInformations
     */
    public function __construct(string $customerInformations)
    {
        $this->customerInformations = $customerInformations;
    }

    /**
     * @return string
     */
    public function getCustomerInformations() : string
    {
        $xPosition = 90;
        $yPosition = 508;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->customerInformations);
    }

    /**
     * @return string
     */
    public function toString() : string
    {
        return $this->getCustomerInformations() . \PHP_EOL;
    }

}