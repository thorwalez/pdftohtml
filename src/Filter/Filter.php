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
 * Interface Filter
 * @package ThorWalez\WaybillCreator\Filter
 */
interface Filter
{
    /**
     * @param array $data
     * @return array
     */
    public  function filter(array $data): array;
}
