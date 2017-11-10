<?php

namespace Dynamic\Staff;

use \Page;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
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

    /**
     * @var array
     */
    private static $db = array(
        'JobTitle' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
    );

    /**
     * @var array
     */
    private static $has_one = [
        'Image' => Image::class,
    ];

    /**
     * @var array
     */
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

        $fields->addFieldsToTab(
            'Root.Main',
            array(
            TextField::create('JobTitle', 'Title'),
            EmailField::create('Email'),
            ),
            'Content'
        );

        $fields->insertBefore(
            'Content',
            UploadField::create('Image', 'Image')
                ->setFolderName('Uploads/Staff')
        );

        return $fields;
    }
}
