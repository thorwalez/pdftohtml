<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class CreateCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function frontpageWorksTest(AcceptanceTester $I)
    {
        $I->amOnPage('/create');

        // we can use input name or id
        $I->fillField('main[customerNumber]','45785');

        // we are using label to match user_name field
        $I->fillField('main[changeAddress][firstname]', 'Max');
        $I->fillField('main[changeAddress][name]', 'Mustermann');
        $I->fillField('main[changeAddress][street]', 'Teststraße');
        $I->fillField('main[changeAddress][housenumber]', '69');
        $I->fillField('main[changeAddress][postalcode]', '01234');
        $I->fillField('main[changeAddress][city]', 'Teststadt');
        $I->fillField('main[changeAddress][contactperson]', 'unknown');
        $I->fillField('main[changeAddress][phonenumber]', '+49172-5689568');



//        $I->click('main[create]');
//        $I->click("//button[@id='main_create']");
        $I->click('create');
    }
}
