<?php

namespace ThorWalez\PdfToHtml\Test\PostScripts\Fields;

use ThorWalez\PdfToHtml\PostScripts\Fields\Change;
use PHPUnit\Framework\TestCase;

class ChangeTest extends TestCase
{
    public function testBuild()
    {
        $data = [
            'firstname' => 'Max',
            'name' => 'Mustermann',
            'street' => 'Teststraße',
            'housenumber' => '69',
            'postalcode' => '04698',
            'city' => 'Teststadt',
            'state' => 'Testbundesland',
            'country' => 'Testland',
            'phonenumber' => '0147258369',
            'contactperson' => 'Tester',
        ];

        $instance = new Change($data);

        $this->assertIsString($instance->toString());
        $this->assertNotEmpty($instance->toString());

    }
}
