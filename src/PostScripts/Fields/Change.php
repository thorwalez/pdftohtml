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
 * Class Change
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class Change extends AbstractAddress
{
    const SPACE_PLACEHOLDER_PATTERN = ' ';

    /**
     * Change constructor.
     * @param array $data
     * @example [ firstname => Mustermann, secondeName = Max, ...]
     */
    public function __construct(array $data)
    {
        $this->firstName = $data['firstname'];
        $this->secondeName = $data['name'];
        $this->street = $data['street'];
        $this->houseNumber = $data['housenumber'];
        $this->postalCode = $data['postalcode'];
        $this->city = $data['city'];
        $this->state = $data['state'];
        $this->country = $data['country'];
        $this->phoneNumber = $data['phonenumber'];
        $this->contactPerson = $data['contactperson'];
    }


    public function getName() : string
    {
        $xPosition = 150;
        $yPosition = 480;

        return \sprintf(
            self::FILED_POSITION_PATTERN,
            $xPosition,
            $yPosition,
            $this->firstName . self::SPACE_PLACEHOLDER_PATTERN . $this->secondeName
        );
    }

    public function getStreet() : string
    {
        $xPosition = 150;
        $yPosition = 465;

        return \sprintf(
            self::FILED_POSITION_PATTERN,
            $xPosition,
            $yPosition,
            $this->street . self::SPACE_PLACEHOLDER_PATTERN . $this->houseNumber
        );
    }

    public function getPostalCode() : string
    {
        $xPosition = 300;
        $yPosition = 425;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->postalCode);
    }

    public function getCity() : string
    {
        $xPosition = 150;
        $yPosition = 425;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->city);
    }

    public function getState() : string
    {
        $xPosition = 150;
        $yPosition = 410;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->state);
    }

    public function getCountry() : string
    {
        $xPosition = 300;
        $yPosition = 410;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->country);
    }

    public function getPhoneNumber() : string
    {
        $xPosition = 300;
        $yPosition = 395;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->phoneNumber);
    }

    public function getContactPerson() : string
    {
        $xPosition = 150;
        $yPosition = 395;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->contactPerson);
    }
}