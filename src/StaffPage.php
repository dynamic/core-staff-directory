<?php

namespace Dynamic\Staff;

use \Page;

class StaffPage extends Page
{

    private static $allowed_children = array(
        Staff::class
    );

    private static $singular_name = 'Staff Holder';
    private static $plural_name = 'Staff Holders';
    private static $description = 'Displays photos and info of staff members';

    /**
     * @var string
     */
    private static $table_name = 'StaffPage';
}
