<?php


namespace ThorWalez\PdfToHtml\Models;


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

/**
 * Class MainModel
 * @package ThorWalez\PdfToHtml\Models
 */
class MainModel
{
    /** @var ClientNumber */
    private $clientNumber;

    /** @var InvoiceToReceiver */
    private $invoiceCheck;

    /** @var CustomerNumberReceiver */
    private $customerNumber;

    /** @var CustomerInformations */
    private $customerDescription;

    /** @var Change */
    private $change;

    /** @var Receiver */
    private $receiver;

    /** @var Delivery */
    private $deliver;

    /** @var DangerousGoodsCheck*/
    private $dangerousGoods;

    /** @var SpecialExpress*/
    private $specialExpressCheck;

    /** @var NineExpress */
    private $nineExpressCheck;

    /** @var TwelveExpress */
    private $twelveExpressCheck;

    /** @var GlobalExpress */
    private $globalExpressCheck;

    /** @var EconomyExpress */
    private $economyExpressChek;

    /** @var PriorityCheck */
    private $priorityCheck;

    /** @var InsuranceCheck */
    private $insuranceCheck;

    /** @var InsuranceAmount */
    private $insuranceAmount;

    /** @var SpecialNotes */
    private $specialNotes;

    /** @var FirstGood */
    private $firstGood;

    /** @var SecondGood*/
    private $secondGood;

    /** @var ThirdGood*/
    private $thirdGood;

    /** @var FourthGood */
    private $fourthGood;

    /** @var FifthGood */
    private $fifthGood;

    /** @var TotalGoodPiece */
    private $totalPieceGoods;

    /** @var TotalGoodWeight */
    private $totalWeightGoods;

    /** @var SalesTaxNumber */
    private $salesTaxNumber;

    /** @var  Currency */
    private $currency;

    /** @var InvoiceAmountDuty */
    private $invoiceAmountDuty;

    /** @var SenderDate */
    private $senderDate;

    /**
     * MainModel constructor.
     */
    public function __construct()
    {
        $this->senderDate = new SenderDate();
    }


    /**
     * @param string $clientNumber
     */
    public function setClientNumber(string $clientNumber) : void
    {
        $this->clientNumber = new ClientNumber($clientNumber);
    }

    /**
     * @param bool $invoiceToReceiver
     */
    public function setInvoiceCheck(bool $invoiceCheck) : void
    {
        if ($invoiceCheck) {
            $this->invoiceCheck = new InvoiceToReceiver();
        }
    }

    /**
     * @param string $customerNumber
     */
    public function setCustomerNumber(string $customerNumber) : void
    {
        $this->customerNumber = new CustomerNumberReceiver($customerNumber);
    }

    /**
     * @param string $customerDescription
     */
    public function setCustomerDescription(string $customerDescription) : void
    {
        $this->customerDescription = new CustomerInformations($customerDescription);
    }

    /**
     * @param array $change
     */
    public function setChange(array $change) : void
    {
        $this->change = new Change($change);
    }

    /**
     * @param array $receiver
     */
    public function setReceiver(array $receiver) : void
    {
        $this->receiver = new Receiver($receiver);
    }

    /**
     * @param array $deliver
     */
    public function setDeliver(array $deliver) : void
    {
        $this->deliver = new Delivery($deliver);
    }

    /**
     * @param bool $dangerousGoods
     */
    public function setDangerousGoods(bool $dangerousGoods) : void
    {
        $this->dangerousGoods = new DangerousGoodsCheck($dangerousGoods);
    }

    /**
     * @param array $specialExpressCheck
     */
    public function setSpecialExpressCheck(array $specialExpressCheck) : void
    {
        if (isset($specialExpressCheck['special'])) {
            list($isDocuments, $isGoods) = $this->checkServiceChecks($specialExpressCheck['special']);
            $this->specialExpressCheck = new SpecialExpress($isDocuments, $isGoods);
        }
    }

    /**
     * @param array $nineExpressCheck
     */
    public function setNineExpressCheck(array $nineExpressCheck) : void
    {
        if (isset($nineExpressCheck['nine'])) {
            list($isDocuments, $isGoods) = $this->checkServiceChecks($nineExpressCheck['nine']);
            $this->nineExpressCheck = new NineExpress($isDocuments, $isGoods);
        }
    }

    /**
     * @param array $twelveExpressCheck
     */
    public function setTwelveExpressCheck(array $twelveExpressCheck) : void
    {
        if (isset($twelveExpressCheck['twelve'])) {
            list($isDocuments, $isGoods) = $this->checkServiceChecks($twelveExpressCheck['twelve']);
            $this->twelveExpressCheck = new TwelveExpress($isDocuments, $isGoods);
        }
    }

    /**
     * @param array $globalExpressCheck
     */
    public function setGlobalExpressCheck(array $globalExpressCheck) : void
    {
        if (isset($globalExpressCheck['global'])) {
            list($isDocuments, $isGoods) = $this->checkServiceChecks($globalExpressCheck['global']);
            $this->globalExpressCheck = new GlobalExpress($isDocuments, $isGoods);
        }
    }

    /**
     * @param bool $economyExpressChek
     */
    public function setEconomyExpressChek(bool $economyExpressChek) : void
    {
        if ($economyExpressChek) {
            $this->economyExpressChek = new EconomyExpress();
        }
    }

    /**
     * @param bool $priorityCheck
     */
    public function setPriorityCheck(bool $priorityCheck) : void
    {
        if ($priorityCheck) {
            $this->priorityCheck = new PriorityCheck();
        }
    }

    /**
     * @param bool $insuranceCheck
     */
    public function setInsuranceCheck(bool $insuranceCheck) : void
    {
        if ($insuranceCheck) {
            $this->insuranceCheck = new InsuranceCheck();
        }
    }

    /**
     * @param string $insuranceAmount
     */
    public function setInsuranceAmount(string $insuranceAmount) : void
    {
        $this->insuranceAmount = new InsuranceAmount($insuranceAmount);
    }

    /**
     * @param string $specialNotes
     */
    public function setSpecialNotes(string $specialNotes) : void
    {
        $this->specialNotes = new SpecialNotes($specialNotes);
    }

    /**
     * @param array $firstGood
     */
    public function setFirstGood(array $firstGood) : void
    {
        $this->firstGood = new FirstGood($firstGood);
    }

    /**
     * @param array $secondGood
     */
    public function setSecondGood(array $secondGood) : void
    {
        $this->secondGood = new SecondGood($secondGood);
    }

    /**
     * @param array $thirdGood
     */
    public function setThirdGood(array $thirdGood) : void
    {
        $this->thirdGood = new ThirdGood($thirdGood);
    }

    /**
     * @param array $fourthGood
     */
    public function setFourthGood(array $fourthGood) : void
    {
        $this->fourthGood = new FourthGood($fourthGood);
    }

    /**
     * @param array $fifthGood
     */
    public function setFifthGood(array $fifthGood) : void
    {
        $this->fifthGood = new FifthGood($fifthGood);
    }

    /**
     * @param string $totalPieceGoods
     */
    public function setTotalPieceGoods(string $totalPieceGoods) : void
    {
        $this->totalPieceGoods = new TotalGoodPiece($totalPieceGoods);
    }

    /**
     * @param string $totalWeightGoods
     */
    public function setTotalWeightGoods(string $totalWeightGoods) : void
    {
        $this->totalWeightGoods = new TotalGoodWeight($totalWeightGoods);
    }

    /**
     * @param string $salesTaxNumber
     */
    public function setSalesTaxNumber(string $salesTaxNumber) : void
    {
        $this->salesTaxNumber = new SalesTaxNumber($salesTaxNumber);
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency) : void
    {
        $this->currency = new Currency($currency);
    }

    /**
     * @param string $invoiceAmountDuty
     */
    public function setInvoiceAmountDuty(string $invoiceAmountDuty) : void
    {
        $this->invoiceAmountDuty = new InvoiceAmountDuty($invoiceAmountDuty);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->__toString();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->change . $this->receiver . $this->deliver . $this->specialNotes . $this->invoiceCheck . $this->specialExpressCheck .
            $this->clientNumber . $this->customerNumber . $this->customerDescription . $this->dangerousGoods . $this->nineExpressCheck . $this->twelveExpressCheck .
            $this->globalExpressCheck . $this->economyExpressChek . $this->priorityCheck . $this->insuranceCheck . $this->insuranceAmount .
            $this->firstGood . $this->secondGood . $this->thirdGood . $this->fourthGood . $this->fifthGood . $this->totalPieceGoods . $this->totalWeightGoods .
            $this->salesTaxNumber . $this->currency . $this->invoiceAmountDuty . $this->senderDate;
    }

    /**
     * @param array $checkFields
     * @return bool[]
     */
    private function checkServiceChecks(array $checkFields) : array
    {
        return array(isset($checkFields['documents']), isset($checkFields['goods']));
    }

}