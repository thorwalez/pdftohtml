<?php



namespace App\Tests;


class FunCreateCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryCreateTest(FunctionalTester $I)
    {
        $I->amOnPage('/create');

        // we can use input name or id
        $I->fillField('main[customerNumber]','45785');
        $I->checkOption('main[invoice][invoiceToReceiver]');
        $I->fillField('main[invoice][customerNumberReceiver]','45785-8956');
        $I->fillField('main[customerInformation]','Customer information area');

        // we are using label to match user_name field
        $I->fillField('main[changeAddress][firstname]', 'Max');
        $I->fillField('main[changeAddress][name]', 'Mustermann');
        $I->fillField('main[changeAddress][street]', 'Teststraße');
        $I->fillField('main[changeAddress][housenumber]', '69');
        $I->fillField('main[changeAddress][postalcode]', '01234');
        $I->fillField('main[changeAddress][city]', 'Teststadt');
        $I->fillField('main[changeAddress][contactperson]', 'unknown');
        $I->fillField('main[changeAddress][phonenumber]', '+49172-5689568');

        $I->fillField('main[receiverAddress][firstname]', 'Max');
        $I->fillField('main[receiverAddress][name]', 'Mustermann');
        $I->fillField('main[receiverAddress][street]', 'Teststraße');
        $I->fillField('main[receiverAddress][housenumber]', '69');
        $I->fillField('main[receiverAddress][postalcode]', '01234');
        $I->fillField('main[receiverAddress][city]', 'Teststadt');
        $I->fillField('main[receiverAddress][contactperson]', 'unknown');
        $I->fillField('main[receiverAddress][phonenumber]', '+49172-5689568');

        $I->fillField('main[deliveryAddress][firstname]', 'Max');
        $I->fillField('main[deliveryAddress][name]', 'Mustermann');
        $I->fillField('main[deliveryAddress][street]', 'Teststraße');
        $I->fillField('main[deliveryAddress][housenumber]', '69');
        $I->fillField('main[deliveryAddress][postalcode]', '01234');
        $I->fillField('main[deliveryAddress][city]', 'Teststadt');
        $I->fillField('main[deliveryAddress][contactperson]', 'unknown');
        $I->fillField('main[deliveryAddress][phonenumber]', '+49172-5689568');

        $I->checkOption('main[dangerousGoods][yes]');

        $I->checkOption('main[services][special][documents]');
        $I->checkOption('main[services][special][goods]');
        $I->checkOption('main[services][nine][documents]');
        $I->checkOption('main[services][nine][goods]');
        $I->checkOption('main[services][twelve][documents]');
        $I->checkOption('main[services][twelve][goods]');
        $I->checkOption('main[services][global][documents]');
        $I->checkOption('main[services][global][goods]');
        $I->checkOption('main[services][economy]');

        $I->checkOption('main[options][priority][priority]');
        $I->checkOption('main[options][insurance][insurance]');
        $I->fillField('main[options][insurance][goodsValue]', '4585,25');

        $I->fillField('main[specialNotes]', 'Text feld was auch immer');

        $I->fillField('main[goodsTable][firstRow][goodsDescription]', 'first Good');
        $I->fillField('main[goodsTable][firstRow][goodsPiece]', '1');
        $I->fillField('main[goodsTable][firstRow][goodsWeight]', '100');
        $I->fillField('main[goodsTable][firstRow][dimensions][goodsLength]', '100');
        $I->fillField('main[goodsTable][firstRow][dimensions][goodsWidth]', '105');
        $I->fillField('main[goodsTable][firstRow][dimensions][goodsHeight]', '50');

        $I->fillField('main[goodsTable][secondRow][goodsDescription]', 'second Good');
        $I->fillField('main[goodsTable][secondRow][goodsPiece]', '3');
        $I->fillField('main[goodsTable][secondRow][goodsWeight]', '55');
        $I->fillField('main[goodsTable][secondRow][dimensions][goodsLength]', '100');
        $I->fillField('main[goodsTable][secondRow][dimensions][goodsWidth]', '105');
        $I->fillField('main[goodsTable][secondRow][dimensions][goodsHeight]', '50');

        $I->fillField('main[goodsTable][thirdRow][goodsDescription]', 'third Good');
        $I->fillField('main[goodsTable][thirdRow][goodsPiece]', '5');
        $I->fillField('main[goodsTable][thirdRow][goodsWeight]', '55,88');
        $I->fillField('main[goodsTable][thirdRow][dimensions][goodsLength]', '100');
        $I->fillField('main[goodsTable][thirdRow][dimensions][goodsWidth]', '105');
        $I->fillField('main[goodsTable][thirdRow][dimensions][goodsHeight]', '50');

        $I->fillField('main[goodsTable][fourthRow][goodsDescription]', 'fourth Good');
        $I->fillField('main[goodsTable][fourthRow][goodsPiece]', '8');
        $I->fillField('main[goodsTable][fourthRow][goodsWeight]', '100');
        $I->fillField('main[goodsTable][fourthRow][dimensions][goodsLength]', '100');
        $I->fillField('main[goodsTable][fourthRow][dimensions][goodsWidth]', '105');
        $I->fillField('main[goodsTable][fourthRow][dimensions][goodsHeight]', '50');

        $I->fillField('main[goodsTable][fifthRow][goodsDescription]', 'fifth Good');
        $I->fillField('main[goodsTable][fifthRow][goodsPiece]', '1');
        $I->fillField('main[goodsTable][fifthRow][goodsWeight]', '100');
        $I->fillField('main[goodsTable][fifthRow][dimensions][goodsLength]', '100');
        $I->fillField('main[goodsTable][fifthRow][dimensions][goodsWidth]', '105');
        $I->fillField('main[goodsTable][fifthRow][dimensions][goodsHeight]', '50');

        $I->fillField('main[goodsTable][totalPiece]', '5');
        $I->fillField('main[goodsTable][totalWeight]', '500');

        $I->fillField('main[duty][salesTaxIdNumber]', '464684-5468-46468');
        $I->fillField('main[duty][currency]', 'EUR');
        $I->fillField('main[duty][invoiceAmount]', '500,56');

//        $I->click('main[create]');
        $I->click("//button[@id='main_create']");
    }
}
