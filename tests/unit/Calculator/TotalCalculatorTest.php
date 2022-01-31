<?php

namespace ThorWalez\WaybillCreator\Test\Calculator;

use ThorWalez\WaybillCreator\Calculator\TotalCalculator;
use PHPUnit\Framework\TestCase;

/**
 * Class TotalCalculatorTest
 * @package ThorWalez\WaybillCreator\Test\Calculator
 */
class TotalCalculatorTest extends TestCase
{

    public function testTotalSingleRun()
    {
        $instance = new TotalCalculator([]);

        $this->assertEquals(15 ,$instance->total(6,9));
        $this->assertEquals(10 ,$instance->total(6,4));
        $this->assertEquals(16 ,$instance->total(6.5,9.5));
    }

    public function testTotalListRun()
    {
        $instance = new TotalCalculator([6,9,6.5,9.5]);

        $this->assertEquals(30 ,$instance->total());

        $instance = new TotalCalculator([6,9,"6,5","9,5"]);

        $this->assertEquals(31 ,$instance->total());
    }
}
