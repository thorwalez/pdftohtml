<?php

namespace ThorWalez\WaybillCreator\Test\PostScripts\Creator;

use ThorWalez\WaybillCreator\Mappers\RequestToModel;
use ThorWalez\WaybillCreator\Models\MainModel;
use ThorWalez\WaybillCreator\PostScripts\Creator\Insert;
use PHPUnit\Framework\TestCase;

class InsertTest extends TestCase
{
    public function testInsert()
    {
        $contentFile = '';
        $contentInsert = $this->getModel();

        $instance = new Insert();

        $result = $instance->insert($contentFile, $contentInsert);

        $this->assertNotEmpty($result);
        $this->assertStringContainsString('150 480 moveto ( ) show', $result);
    }

    private function getModel() : MainModel
    {
        $mapper = new RequestToModel();
        return $mapper->map($this->buidlRequestDummy());

    }

    private function buidlRequestDummy()
    {
        return [
            'customerNumber' => '',
            'invoice' => [
                'invoiceToReceiver' => '',
                'customerNumberReceiver' => '',
            ],
            'customerInformation' => '',
            'changeAddress' => [
                'firstname' => '',
                'name' => '',
                'street' => '',
                'housenumber' => '',
                'postalcode' => '',
                'city' => '',
                'state' => '',
                'country' => '',
                'phonenumber' => '',
                'contactperson' => '',
            ],
            'receiverAddress' => [
                'firstname' => '',
                'name' => '',
                'street' => '',
                'housenumber' => '',
                'postalcode' => '',
                'city' => '',
                'state' => '',
                'country' => '',
                'phonenumber' => '',
                'contactperson' => '',
            ],
            'deliveryAddress' => [
                'firstname' => '',
                'name' => '',
                'street' => '',
                'housenumber' => '',
                'postalcode' => '',
                'city' => '',
                'state' => '',
                'country' => '',
                'phonenumber' => '',
                'contactperson' => '',
            ],
            'dangerousGoods' => ['yes' => '1'],
            'services' => [
                'special' => ['documents' => '1', 'goods' => '1'],
                'nine' => ['documents' => '1', 'goods' => '1'],
                'twelve' => ['documents' => '1', 'goods' => '1'],
                'global' => ['documents' => '1', 'goods' => '1'],
                'economy' => ['goods' => '1'],
            ],
            'options' => [
                'priority' => '1',
                'insurance' => [
                    'insurance' => '1',
                    'goodsValue' => '457,45'
                ],
            ],
            'specialNotes' => '',
            'goodsTable' => [
                'firstRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => ''
                    ],
                ],
                'secondRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => ''
                    ],
                ],
                'thirdRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => ''
                    ],
                ],
                'fourthRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => ''
                    ],
                ],
                'fifthRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => ''
                    ],
                ],
            ],
            'duty' => [
                'salesTaxIdNumber' => '',
                'currency' => '',
                'invoiceAmount' => '',
            ]

        ];
    }

}
