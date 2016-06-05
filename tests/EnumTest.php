<?php

namespace RunMyBusiness\Enum\Tests;

use PHPUnit_Framework_TestCase;

/**
 * Class EnumTest
 *
 * @package RunMyBusiness\Enum\Tests
 */
class EnumTest extends PHPUnit_Framework_TestCase
{
    public function testGetCode()
    {
        $code = DummyClass::getCode('status_archived');
        $this->assertEquals($code, DummyClass::STATUS_ARCHIVED);
    }

    public function testGetLabel()
    {
        $label = DummyClass::getLabel(DummyClass::STATUS_DELETED, 'STATUS_', true);
        $this->assertEquals($label, 'DELETED');

        $label = DummyClass::getLabel(DummyClass::STATUS_DELETED, 'STATUS_', false);
        $this->assertEquals($label, 'STATUS_DELETED');
    }

    public function testGetFriendlyLabel()
    {
        $label = DummyClass::getFriendlyLabel(DummyClass::STATUS_DELETED, 'STATUS_');
        $this->assertEquals($label, 'Deleted');
    }

    public function testGetConstantList()
    {
        $list = DummyClass::getConstantList('STATUS_', true);
        $this->assertEquals($list, [
            1 => 'New',
            2 => 'Read',
            3 => 'Archived',
            4 => 'Deleted',
        ]);
    }

    public function testGetConstantCodes()
    {
        $codes = DummyClass::getConstantCodes('STATUS_');
        $this->assertEquals([
            DummyClass::STATUS_NEW,
            DummyClass::STATUS_READ,
            DummyClass::STATUS_ARCHIVED,
            DummyClass::STATUS_DELETED,
        ], $codes);
    }
}
