<?php

namespace RunMyBusiness\Enum\Tests;

use PHPUnit_Framework_TestCase;

/**
 * Class EnumTest.
 */
class EnumTest extends PHPUnit_Framework_TestCase
{
    public function testGetCode()
    {
        $code = DummyClass::getCode('status_archived');
        $this->assertEquals($code, DummyClass::STATUS_ARCHIVED);
    }
}
