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

namespace ThorWalez\WaybillCreator\Filter;

/**
 * Class RemoveNewerFilesFilter
 * @package ThorWalez\WaybillCreator\Filter
 */
class RemoveNewerFilesFilter implements Filter
{
    /**
     * @param array $data
     * @return array
     */
    public function filter(array $data): array
    {
        foreach ($data as $filename => $pathWithFilename) {
            $timeStamp = $this->findTimeStampInFileName($filename);
            if ($this->isTimeStampNewerAs($this->createDateTimeWithTimeStamp($timeStamp))) {
                unset($data[$filename]);
            }
        }

        return $data;
    }

    /**
     * @param string $fileName
     * @return string
     */
    private function findTimeStampInFileName(string $fileName): string
    {
        return \substr(\strrchr($fileName, '_'), 1, -4);
    }

    /**
     * @param string $timeStamp
     * @return \DateTime
     */
    private function createDateTimeWithTimeStamp(string $timeStamp): \DateTime
    {
        $dateTime = new \DateTime();
        $dateTime->setTimestamp($timeStamp);

        return $dateTime;
    }

    /**
     * @param \DateTime $timeStamp
     * @return bool
     */
    private function isTimeStampNewerAs(\DateTime $timeStamp): bool
    {
        $dateNow = new \DateTime('NOW');
        $dateNow->modify('-1 hours');

        return $dateNow <= $timeStamp;
    }
}
