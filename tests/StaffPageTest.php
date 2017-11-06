<?php

namespace Dynamic\Staff\Tests;

use Dynamic\Staff\Staff;
use Dynamic\Staff\StaffPage;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\DataList;

/**
 * Class StaffPageTest
 * @package Dynamic\Staff\Tests
 */
class StaffPageTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'fixtures.yml';

    /**
     * Tests StaffMembers()
     */
    public function testStaffMembers()
    {
        /** @var StaffPage $object */
        $object = $this->objFromFixture(StaffPage::class, 'one');

        // Staff
        $this->objFromFixture(Staff::class, 'one');
        $this->objFromFixture(Staff::class, 'two');
        $this->objFromFixture(Staff::class, 'three');

        $staff = $object->StaffMembers();
        $this->assertInstanceOf(DataList::class, $staff);
        $this->assertEquals(3, $staff->count());
    }
}
