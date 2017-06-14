<?php

class Staff extends DetailPage
{
    private static $singular_name = 'Staff Member';
    private static $plural_name = 'Staff Members';
    private static $description = 'Profile of a staff member';

    private static $db = array(
        'JobTitle' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
    );

    private static $summary_fields = array(
        'Title',
        'JobTitle',
        'Email',
    );

    //CMS fields
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // remove sort order, use gridfield drag and drop instead
        $fields->removeByName('SortOrder');

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

class Staff_Controller extends DetailPage_Controller
{
}
