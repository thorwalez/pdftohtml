<?php

namespace ThorWalez\PdfToHtml\Test\Mappers;

use PHPUnit\Framework\TestCase;
use ThorWalez\PdfToHtml\Exceptions\Error\RequestIsNotValidException;
use ThorWalez\PdfToHtml\Mappers\RequestToModel;
use ThorWalez\PdfToHtml\Models\MainModel;

class RequestToModelTest extends TestCase
{
    public function testMapRunWithRINVException()
    {
        $this->expectException(RequestIsNotValidException::class);

        $instance = new RequestToModel();
        $instance->map([]);
    }

    public function testMapRun()
    {
        $instance = new RequestToModel();
        $model = $instance->map($this->buildData());

        $this->assertInstanceOf(MainModel::class, $model);
    }

    private function buildData()
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
