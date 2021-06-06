<?php

namespace ThorWalez\PdfToHtml\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testCreate()
    {

        $client = static::createClient();

        $crawler = $client->request('POST', '/create', ['main' => $this->buidlRequestDummy(), 'create'=>'create']);

        $this->assertTrue($client->getResponse()->isOk());
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
                    'goodsValue' => '457,45',
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
                        'goodsHeight' => '',
                    ],
                ],
                'secondRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => '',
                    ],
                ],
                'thirdRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => '',
                    ],
                ],
                'fourthRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => '',
                    ],
                ],
                'fifthRow' => [
                    'goodsDescription' => '',
                    'goodsPiece' => '',
                    'goodsWeight' => '',
                    'dimensions' => [
                        'goodsLength' => '',
                        'goodsWidth' => '',
                        'goodsHeight' => '',
                    ],
                ],
            ],
            'duty' => [
                'salesTaxIdNumber' => '',
                'currency' => '',
                'invoiceAmount' => '',
            ],

        ];
    }
}
