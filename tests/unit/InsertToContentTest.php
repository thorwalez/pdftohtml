<?php

namespace ThorWalez\PdfToHtml\Test;

use PHPUnit\Framework\TestCase;
use ThorWalez\PdfToHtml\PostScripts\Creator\Insert;
use ThorWalez\PdfToHtml\PostScripts\Fields\Change;
use ThorWalez\PdfToHtml\PostScripts\Fields\ClientNumber;
use ThorWalez\PdfToHtml\PostScripts\Fields\CustomerInformations;
use ThorWalez\PdfToHtml\PostScripts\Fields\CustomerNumberReceiver;
use ThorWalez\PdfToHtml\PostScripts\Fields\DangerousGoodsCheck;
use ThorWalez\PdfToHtml\PostScripts\Fields\Delivery;
use ThorWalez\PdfToHtml\PostScripts\Fields\Duty\Currency;
use ThorWalez\PdfToHtml\PostScripts\Fields\Duty\InvoiceAmountDuty;
use ThorWalez\PdfToHtml\PostScripts\Fields\Duty\SalesTaxNumber;
use ThorWalez\PdfToHtml\PostScripts\Fields\Goods\FifthGood;
use ThorWalez\PdfToHtml\PostScripts\Fields\Goods\FirstGood;
use ThorWalez\PdfToHtml\PostScripts\Fields\Goods\FourthGood;
use ThorWalez\PdfToHtml\PostScripts\Fields\Goods\SecondGood;
use ThorWalez\PdfToHtml\PostScripts\Fields\Goods\ThirdGood;
use ThorWalez\PdfToHtml\PostScripts\Fields\Goods\TotalGoodPiece;
use ThorWalez\PdfToHtml\PostScripts\Fields\Goods\TotalGoodWeight;
use ThorWalez\PdfToHtml\PostScripts\Fields\InsuranceAmount;
use ThorWalez\PdfToHtml\PostScripts\Fields\InsuranceCheck;
use ThorWalez\PdfToHtml\PostScripts\Fields\InvoiceToReceiver;
use ThorWalez\PdfToHtml\PostScripts\Fields\PriorityCheck;
use ThorWalez\PdfToHtml\PostScripts\Fields\Receiver;
use ThorWalez\PdfToHtml\PostScripts\Fields\SenderDate;
use ThorWalez\PdfToHtml\PostScripts\Fields\Service\EconomyExpress;
use ThorWalez\PdfToHtml\PostScripts\Fields\Service\GlobalExpress;
use ThorWalez\PdfToHtml\PostScripts\Fields\Service\NineExpress;
use ThorWalez\PdfToHtml\PostScripts\Fields\Service\SpecialExpress;
use ThorWalez\PdfToHtml\PostScripts\Fields\Service\TwelveExpress;
use ThorWalez\PdfToHtml\PostScripts\Fields\SpecialNotes;

class InsertToContentTest extends TestCase
{
    public function testInsertContent()
    {

        $content = $this->readeFile();

        $instance = new Insert();
        $content = $instance->insert($content, $this->buildAllPostScriptInformations());

        $this->writeFile($content);

        $this->assertTrue(true);
    }


    private function readeFile()
    {
        $content = \file_get_contents('/var/www/app/data/TNT_Vorlage_Quer.ps');

        return $content;
    }

    private function writeFile(string $content)
    {
        $timestamp = \time();

        \file_put_contents("/var/www/app/data/TNT_Vorlage_Quer_$timestamp.ps", $content);
    }

    private function buildAllPostScriptInformations()
    {
        $data = [
            'firstName' => 'Mustermann',
            'secondeName' => 'Max',
            'street' => 'Test-Straße',
            'houseNumber' => '60',
            'city' => 'Teststadt',
            'postalCode' => '05689',
            'state' => 'Nordrhein-Westfalen',
            'country' => 'Deutschland',
            'phoneNumber' => '01789568745525',
            'contactPerson' => 'Kontakt Person',

        ];

        $clientNumber = new ClientNumber('666999');

        $invoiceCheck = new InvoiceToReceiver();

        $customerNumber = new CustomerNumberReceiver('999666');

        $customerDescription = new CustomerInformations('Kunden Informationen > was auch immer');

        $change = new Change($data);

        $receiver = new Receiver($data);

        $deliver = new Delivery($data);

        $dangerousGoods = new DangerousGoodsCheck();

        $specialExpressCheck = new SpecialExpress();
        $nineExpressCheck = new NineExpress();
        $twelveExpressCheck = new TwelveExpress();
        $globalExpressCheck = new GlobalExpress();
        $economyExpressChek = new EconomyExpress();

        $priorityCheck = new PriorityCheck();
        $insuranceCheck = new InsuranceCheck();
        $insuranceAmount = new InsuranceAmount('1500,00');

        $specialNotes = new SpecialNotes('Besonder Hinweise TextFeld');

        $firstGood = new FirstGood(['description' => 'erste ware','piece' => '5','weight' => '150','firstDimension' => '50','secondDimension' => '50','thirdDimension' => '100']);
        $secondGood = new SecondGood(['description' => 'zweite ware','piece' => '15','weight' => '150','firstDimension' => '50','secondDimension' => '50','thirdDimension' => '100']);
        $thirdGood = new ThirdGood(['description' => 'dritte ware','piece' => '2','weight' => '150','firstDimension' => '50','secondDimension' => '50','thirdDimension' => '100']);
        $fourthGood = new FourthGood(['description' => 'vierte ware','piece' => '10','weight' => '150','firstDimension' => '50','secondDimension' => '50','thirdDimension' => '100']);
        $fifthGood = new FifthGood(['description' => 'fünfte ware','piece' => '1','weight' => '150','firstDimension' => '50','secondDimension' => '50','thirdDimension' => '100']);
        $totalPieceGoods = new TotalGoodPiece('33');
        $totalWeightGoods = new TotalGoodWeight('750');

        $salesTaxNumber = new SalesTaxNumber('4545866/85669/56');
        $currency = new Currency('EUR');
        $invoiceAmountDuty = new InvoiceAmountDuty('1550,50');

        $senderDate = new SenderDate();

        $contentInsert = $change . $receiver . $deliver . $specialNotes . $invoiceCheck . $specialExpressCheck .
            $clientNumber . $customerNumber . $customerDescription . $dangerousGoods . $nineExpressCheck . $twelveExpressCheck .
            $globalExpressCheck . $economyExpressChek . $priorityCheck . $insuranceCheck . $insuranceAmount .
            $firstGood . $secondGood . $thirdGood . $fourthGood . $fifthGood . $totalPieceGoods . $totalWeightGoods .
            $salesTaxNumber . $currency . $invoiceAmountDuty . $senderDate;

        return $contentInsert;
    }
}
