<?php


namespace ThorWalez\PdfToHtml\PostScripts\Fields;

/**
 * Class Change
 * @package ThorWalez\PdfToHtml\PostScripts\Fields
 */
class Receiver extends AbstractAddress
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
        $yPosition = 365;

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
        $yPosition = 350;

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
        $yPosition = 310;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->postalCode);
    }

    public function getCity() : string
    {
        $xPosition = 150;
        $yPosition = 310;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->city);
    }

    public function getState() : string
    {
        $xPosition = 150;
        $yPosition = 295;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->state);
    }

    public function getCountry() : string
    {
        $xPosition = 300;
        $yPosition = 295;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->country);
    }

    public function getPhoneNumber() : string
    {
        $xPosition = 300;
        $yPosition = 280;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->phoneNumber);
    }

    public function getContactPerson() : string
    {
        $xPosition = 150;
        $yPosition = 280;

        return \sprintf(self::FILED_POSITION_PATTERN, $xPosition, $yPosition, $this->contactPerson);
    }
}