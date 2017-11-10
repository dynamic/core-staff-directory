<?php

namespace Dynamic\Staff;

use \Page;
use SilverStripe\ORM\DataList;

/**
 * Class StaffPage
 * @package Dynamic\Staff
 */
class StaffPage extends Page
{
    /**
     * @var array
     */
    private static $allowed_children = array(
        Staff::class
    );

    /**
     * @var string
     */
    private static $singular_name = 'Staff Directory';

    /**
     * @var string
     */
    private static $plural_name = 'Staff Directories';

    /**
     * @var string
     */
    private static $description = 'Displays list of staff members';

    /**
     * @var string
     */
    private static $table_name = 'StaffPage';

    /**
     * @return DataList
     */
    public function StaffMembers()
    {
        return Staff::get()->where(array(
           'ParentID' => $this->ID,
        ));
    }
}
