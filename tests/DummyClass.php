<?php

namespace RunMyBusiness\Enum\Tests;

use RunMyBusiness\Enum\Enum;

/**
 * Class DummyClass
 * @package RunMyBusiness\Enum\Tests
 */
class DummyClass
{
    use Enum;

    const STATUS_NEW      = 1;
    const STATUS_READ     = 2;
    const STATUS_ARCHIVED = 3;
    const STATUS_DELETED  = 4;

}
