<?php

	class Staff extends DataObject {
	
		static $db = array(
			'FirstName'	=> 'Varchar(255)',
			'LastName'	=> 'Varchar(255)',
			'Position'	=> 'Varchar(255)',
			'Description' => 'HTMLText',
			'SortOrder' => 'Int'
		);
		
		static $has_one = array(
			'Image' => 'Image'
		);
		
		static $many_many = array(

		);
		
		static $belongs_many_many = array(
			'StaffPages' => 'StaffPage'
		);
		
		//CMS fields
	    function getCMSFields()
	    {
	        $fields = parent::getCMSFields();
	        
	        // Image - custom upload
			$ImageField = new UploadField('Image', 'Image');
			$ImageField->getValidator()->allowedExtensions = array('jpg', 'gif', 'png');
			$ImageField->setFolderName('Uploads/Staff');
			$fields->addFieldToTab('Root.Images', $ImageField);
	        
	        $fields->addFieldsToTab('Root.Contact', array(
	        	new TextField('FirstName', 'First Name'),
	        	new TextField('LastName', 'Last Name'),
	        	new TextField('Position', 'Position'),
	        	new TextareaField('Description', 'About Staff Member'),
	        	$image
	        ));
	         
	        return $fields;
	    }
	    
	    public function Thumbnail(){
	    	return $this->Image()->croppedImage(150,200);
	    }
	    
	    public function Large(){
	    	return $this->Image()->setRatioSize(200,250);
	    }
	
	}