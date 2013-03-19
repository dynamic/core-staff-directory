<?php

	class Staff extends DataObject {
	
		static $db = array(
			'FirstName'	=> 'Varchar(255)',
			'LastName'	=> 'Varchar(255)',
			'JobTitle'	=> 'Varchar(255)',
			'Email' => 'Varchar(255)',
			'Description' => 'HTMLText',
			'SortOrder' => 'Int'
		);
		
		static $has_one = array(
			'Image' => 'Image'
		);
		
		static $many_many = array(

		);
		
		static $belongs_many_many = array(

		);
		
		static $summary_fields = array(
			'FirstName',
			'LastName',
			'JobTitle',
			'Email'
		);
		
		// set Title
		public function getTitle() {
			return $this->FirstName . ' ' . $this->LastName;
		}
		
		//CMS fields
	    function getCMSFields()
	    {
	        $fields = parent::getCMSFields();
	        
	        // remove sort order, use gridfield drag and drop instead
	        $fields->removeByName('SortOrder');
	        
	        // Image - custom upload
			$ImageField = new UploadField('Image', 'Image');
			$ImageField->getValidator()->allowedExtensions = array('jpg', 'gif', 'png');
			//$ImageField->setFolderName('Uploads/Staff');
			//$fields->addFieldToTab('Root.Images', $ImageField);
	        
	        $fields->addFieldsToTab('Root.Main', array(
	        	new TextField('FirstName', 'First Name'),
	        	new TextField('LastName', 'Last Name'),
	        	new TextField('JobTitle', 'Title'),
	        	EmailField::create('Email', 'Email'),
	        	new TextareaField('Description', 'About Staff Member'),
	        	$ImageField
	        ));
	         
	        return $fields;
	    }
	    
	    public function Thumbnail(){
	    	return $this->Image()->croppedImage(100,105);
	    }
	    
	    public function Large(){
	    	return $this->Image()->setRatioSize(200,250);
	    }
	
	}