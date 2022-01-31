<?php

namespace ThorWalez\WaybillCreator\Test\Workers;

use ThorWalez\WaybillCreator\Workers\PurgeCreatedFilesWorker;
use PHPUnit\Framework\TestCase;

/**
 * Class PurgeCreatedFilesWorkerTest
 * @package ThorWalez\WaybillCreator\Test\Workers
 */
class PurgeCreatedFilesWorkerTest extends TestCase
{
    public function testRun()
    {

        $instance = new class() extends PurgeCreatedFilesWorker{
            const DEFAULT_SLEEP_TIME = 5;
            const DEFAULT_MODIFY_TIME = '+6 seconds';
        };

        $startTime = new \DateTime('now');
        while (true) {
            $instance->run();
            $instance->sleeper();
            if ($instance->isFinishingTime()){
                break;
            }
        }
        $endTime = new \DateTime('now');

        $this->assertTrue(true);
        $this->assertEquals(10, $endTime->diff($startTime)->s);
    }
}
