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

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Class WorkerProcessRunner
 * @package ThorWalez\WaybillCreator\Workers
 */
class WorkerProcessRunner
{
    const CONSOLE_COMMAND = 'bin/console';
    const WORKER_COMMAND = 'app:run-worker';
    const BASE_PATH = '/var/www/app';
    const FIRE_AND_FORGET = '> /dev/null &';

    /** @var LoggerInterface $logger */
    private $logger;

    /** @var FlashBag $flashBag */
    private $flashBag;

    /**
     * WorkerProcessRunner constructor.
     * @param LoggerInterface $logger
     * @param FlashBag         $flashBag
     */
    public function __construct(LoggerInterface $logger, FlashBag $flashBag)
    {
        $this->logger = $logger;
        $this->flashBag = $flashBag;
    }

    public function start()
    {
        try {
            $command = \sprintf(
                '%s %s %s',
                self::CONSOLE_COMMAND,
                self::WORKER_COMMAND,
                self::FIRE_AND_FORGET
            );
            $process = Process::fromShellCommandline($command);
            $process->setWorkingDirectory(self::BASE_PATH);

            $process->start();
            if ($process->isRunning() == false){
                throw new ProcessFailedException($process);
            }
            $this->flashBag->add('success', 'Worker Process is start...');

        }catch (\Exception $exception){
            $this->flashBag->add('error', 'Worker Process not started');
            $this->logger->error($exception->getMessage());
        }
    }
}
