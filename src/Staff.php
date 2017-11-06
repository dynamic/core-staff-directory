<?php

namespace Dynamic\Staff;

use \Page;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

/**
 * Class Staff
 * @package Dynamic\Staff
 */
class Staff extends Page
{
    /**
     * @var string
     */
    private static $singular_name = 'Staff Member';

    /**
     * @var string
     */
    private static $plural_name = 'Staff Members';

    /**
     * @var string
     */
    private static $description = 'Profile of a staff member';

    /**
     * @var bool
     */
    private static $can_be_root = false;

    /**
     * @var string
     */
    private static $table_name = 'Staff';

    private static $db = array(
        'JobTitle' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
    );

    private static $summary_fields = array(
        'Title',
        'JobTitle',
        'Email',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main',
            array(
                TextField::create('JobTitle', 'Title'),
                EmailField::create('Email'),
            ),
            'Content'
        );

        return $fields;
    }
}
