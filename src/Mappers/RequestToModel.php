<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 4.04.2021
 * @version 0.0.0
 */

namespace ThorWalez\PdfToHtml\Mappers;


use ThorWalez\PdfToHtml\Calculator\TotalCalculator;
use ThorWalez\PdfToHtml\Models\MainModel;

/**
 * Class RequestToModel
 * @package ThorWalez\PdfToHtml\Mappers
 */
class RequestToModel
{
    /**
     * @param array $requestData
     * @return MainModel
     */
    public function map(array $requestData) : MainModel
    {

        //        \dump($requestData);die;
        $model = new MainModel();

        $model->setClientNumber($requestData['customerNumber']);

        $model->setInvoiceCheck(isset($requestData['invoice']['invoiceToReceiver']));

        $model->setCustomerNumber($requestData['invoice']['customerNumberReceiver']);

        $model->setCustomerDescription($requestData['customerInformation']);

        $model->setChange($requestData['changeAddress']);

        $model->setReceiver($requestData['receiverAddress']);

        $model->setDeliver($requestData['deliveryAddress']);

        $model->setDangerousGoods(isset($requestData['dangerousGoods']['yes']));

        /** @note Service Blook start */
        $model->setSpecialExpressCheck($requestData['services']);

        $model->setNineExpressCheck($requestData['services']);

        $model->setTwelveExpressCheck($requestData['services']);

        $model->setGlobalExpressCheck($requestData['services']);

        $model->setEconomyExpressChek(isset($requestData['services']['economy']));
        /** @note Service Blook End */

        $model->setPriorityCheck(isset($requestData['options']['priority']));

        $model->setInsuranceCheck(isset($requestData['options']['insurance']['insurance']));
        $model->setInsuranceAmount($requestData['options']['insurance']['goodsValue']);

        $model->setSpecialNotes($requestData['specialNotes']);

        /** @note Goods Table Start */
        $model->setFirstGood($requestData['goodsTable']['firstRow']);
        $model->setSecondGood($requestData['goodsTable']['secondRow']);
        $model->setThirdGood($requestData['goodsTable']['thirdRow']);
        $model->setFourthGood($requestData['goodsTable']['fourthRow']);
        $model->setFifthGood($requestData['goodsTable']['fifthRow']);

        $model->setTotalPieceGoods($this->calculateTotalPiece($requestData['goodsTable']));
        $model->setTotalWeightGoods($this->calculateTotalWeight($requestData['goodsTable']));

        //        $model->setTotalPieceGoods($requestData['goodsTable']['totalPiece']);
        //        $model->setTotalWeightGoods($requestData['goodsTable']['totalWeight']);

        /** @note Goods Table End */

        /** @note Duty Area Start */
        $model->setSalesTaxNumber($requestData['duty']['salesTaxIdNumber']);
        $model->setCurrency($requestData['duty']['currency']);

        $model->setInvoiceAmountDuty($requestData['duty']['invoiceAmount']);

        /** @note Duty Area End */


        return $model;
    }

    /**
     * @param array $dataList
     * @return string
     */
    private function calculateTotalPiece(array $dataList) : string
    {
        $totalPieceList = [
            $dataList['firstRow']['goodsPiece'],
            $dataList['secondRow']['goodsPiece'],
            $dataList['thirdRow']['goodsPiece'],
            $dataList['fourthRow']['goodsPiece'],
            $dataList['fifthRow']['goodsPiece'],
        ];
        $calculator = new TotalCalculator($totalPieceList);

        return $calculator->total();
    }

    /**
     * @param array $dataList
     * @return string
     */
    private function calculateTotalWeight(array $dataList) : string
    {
        $totalWeightList = [
            $dataList['firstRow']['goodsWeight'],
            $dataList['secondRow']['goodsWeight'],
            $dataList['thirdRow']['goodsWeight'],
            $dataList['fourthRow']['goodsWeight'],
            $dataList['fifthRow']['goodsWeight'],
        ];
        $calculator = new TotalCalculator($totalWeightList);

        return $calculator->total();
    }
}