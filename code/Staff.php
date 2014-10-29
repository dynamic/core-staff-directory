<?php

class Staff extends DetailPage {

    private static $singular_name = 'Staff';
    private static $plural_name = 'Staffs';
    private static $description = 'Staff member';
    public static $item_class = 'Staff';

	private static $db = array(
		'JobTitle'	=> 'Varchar(255)',
		'Email' => 'Varchar(255)'
	);
	
	private static $has_one = array(
		'Image' => 'Image'
	);
	
	private static $many_many = array(

	);
	
	private static $belongs_many_many = array(

	);
	
	private static $summary_fields = array(
        'Title',
		'JobTitle',
		'Email'
	);
	
	//CMS fields
    function getCMSFields()
    {
        $fields = parent::getCMSFields();
        
        // remove sort order, use gridfield drag and drop instead
        $fields->removeByName('SortOrder');
        
        // Image - custom upload
		$ImageField = new UploadField('Image', 'Image');
		$ImageField->getValidator()->allowedExtensions = array('jpg', 'gif', 'png');
		$ImageField->setFolderName('Uploads/Staff');
		//$fields->addFieldToTab('Root.Images', $ImageField);
        
        $fields->addFieldsToTab(
            'Root.Main',
            array(
                TextField::create('JobTitle')
                    ->setTitle('Title'),
                EmailField::create('Email')
                    ->setTitle('Email')
            ),
            'Content'
        );
         
        return $fields;
    }
    
    public function Thumbnail(){
    	return $this->Image()->croppedImage(100,105);
    }
    
    public function Large(){
    	return $this->Image()->setRatioSize(200,250);
    }
    
}

class Staff_Controller extends DetailPage_Controller{



}