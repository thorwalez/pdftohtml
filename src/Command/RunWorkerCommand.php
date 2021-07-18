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

namespace ThorWalez\PdfToHtml\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use ThorWalez\PdfToHtml\Workers\PurgeCreatedFilesWorker;

/**
 * Class RunWorkerCommand
 * @package ThorWalez\PdfToHtml\Command
 */
class RunWorkerCommand extends Command
{
    const RUN_WORKER_FILE = '/var/www/app/var/tmp/workerInProcess';

    protected static $defaultName = 'app:run-worker';
    protected static $defaultDescription = 'Create a Worker Thread and run it';

    protected function configure() : void
    {
        $this->setDescription(self::$defaultDescription);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $io = new SymfonyStyle($input, $output);

        $worker = new PurgeCreatedFilesWorker();

        if (\file_exists(self::RUN_WORKER_FILE)) {
            $io->warning('The worker process is runnning....');

            return Command::SUCCESS;
        }

        $io->success('The worker process was started successfully');
        try {
            while (true) {
                \file_put_contents(self::RUN_WORKER_FILE, 'Running....'.\PHP_EOL, \FILE_APPEND);

                $worker->run();
                $worker->sleeper();
                if ($worker->isFinishingTime()) {
                    break;
                }
            }
            if (\file_exists(self::RUN_WORKER_FILE)) {
                \unlink(self::RUN_WORKER_FILE);
            }
        } catch (\Exception $exception) {
            $io->warning('The worker process has a fault: '.$exception->getMessage());
        }
        $io->success('The worker process was completed successfully');

        return Command::SUCCESS;
    }
}
