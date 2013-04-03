<?php

	class StaffPage extends Page {
	
		static $db = array(
			
		);
		
		static $has_one = array(
		
		);
		
		static $many_many = array(

		);
		
		static $description = 'Displays photos and info of staff members';
		
		static $allowed_actions = array(
			//'view'
		);
		
		public function getCMSFields() {	
			$fields = parent::getCMSFields();
			
			// Staff
			$config = GridFieldConfig_RecordEditor::create();	
			$config->addComponent(new GridFieldBulkEditingTools());
			$config->addComponent(new GridFieldBulkImageUpload());
			$config->addComponent(new GridFieldSortableRows("SortOrder"));
		    
			$PhotosField = GridField::create("StaffMembers", "Staff", Staff::get()->sort('SortOrder'), $config);
		    
		    $fields->addFieldToTab("Root.Staff", $PhotosField);
			
	        return $fields;
		}
	
	}
	
	class StaffPage_Controller extends Page_Controller {
	
		function StaffMembers() {
			return Staff::get()->sort('SortOrder');
		}
	
		
		function view() {
			$id = 0;
			if(Director::urlParam('ID')) {
				$id = (int) Director::urlParam('ID');
			}
			if($id != 0) {
				$entry = DataObject::get_by_id('Staff', $id);
			}
			$page = $this->customise(array(
				'Title' => $entry->FirstName." ".$entry->LastName,
				'Staff' => $entry
			));
	
			return $page;
		}
		
	}