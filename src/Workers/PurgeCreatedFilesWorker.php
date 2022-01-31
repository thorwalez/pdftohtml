<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author    Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created   18.07.2021
 * @version   0.0.0
 */

namespace ThorWalez\WaybillCreator\Workers;

use ThorWalez\WaybillCreator\Filter\RemoveNewerFilesFilter;
use ThorWalez\WaybillCreator\Helper\RemoveFileFromList;
use ThorWalez\WaybillCreator\Viewer\FileListViewer;

/**
 * Class PurgeCreatedFilesWorker
 * @package ThorWalez\WaybillCreator\Workers
 */
class PurgeCreatedFilesWorker
{
    const DEFAULT_SLEEP_TIME = 60;
    const DEFAULT_MODIFY_TIME = '+2 mins';

    /** @var \DateTime $startTimer*/
    private $startTimer;

    /**
     * PurgeCreatedFilesWorker constructor.
     */
    public function __construct()
    {
        $this->startTimer = new \DateTime('NOW');
        $this->startTimer->modify(static::DEFAULT_MODIFY_TIME);
    }

    public function run()
    {
        $viewer = new FileListViewer();
        $fileList = $viewer->view();

        $filter = new RemoveNewerFilesFilter();
        $fileList = $filter->filter($fileList);

        $helper = new RemoveFileFromList();
        foreach ($fileList as  $filename => $pathWithFilename) {
            $helper->remove($filename);
        }

    }

    public function sleeper()
    {
        \sleep(static::DEFAULT_SLEEP_TIME);
    }

    /**
     * @return bool
     */
    public function isFinishingTime(): bool
    {
        $nowTimer = new \DateTime('NOW');
        return $this->startTimer <= $nowTimer;
    }
}
