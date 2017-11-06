<?php

namespace Dynamic\Staff\Tests;

use Dynamic\Staff\Staff;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class StaffTest
 * @package Dynamic\Staff\Tests
 */
class StaffTest extends SapphireTest
{

    /**
     * Tests getCMSFields()
     */
    public function testGetCMSFields()
    {
        /** @var Staff $object */
        $object = Injector::inst()->create(Staff::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
