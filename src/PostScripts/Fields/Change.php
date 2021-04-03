<?php


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
        $this->firstName = $data['firstName'];
        $this->secondeName = $data['secondeName'];
        $this->street = $data['street'];
        $this->houseNumber = $data['houseNumber'];
        $this->postalCode = $data['postalCode'];
        $this->city = $data['city'];
        $this->state = $data['state'];
        $this->country = $data['country'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->contactPerson = $data['contactPerson'];
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