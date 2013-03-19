<?php

	class StaffPage extends Page {
	
		static $db = array(
			
		);
		
		static $has_one = array(
		
		);
		
		static $many_many = array(
			'StaffMembers' => 'Staff'
		);
		
		static $allowed_actions = array(
			'view'
		);
		
		public function getCMSFields() {	
			$fields = parent::getCMSFields();
			
			// Slides
			$PhotosGridFieldConfig = GridFieldConfig::create()->addComponents(
				new GridFieldToolbarHeader(),
				new GridFieldSortableHeader(),
				new GridFieldDataColumns(),
				new GridFieldPaginator(10),
				new GridFieldEditButton(),
				new GridFieldDeleteAction(),
				new GridFieldDetailForm(),
				new GridFieldBulkEditingTools(),
				new GridFieldBulkImageUpload(),
				new GridFieldSortableRows("SortOrder")
			);
			$PhotosGridFieldConfig->getComponentByType('GridFieldBulkImageUpload')->setConfig('folderName', 'home-slides');
		    
			$PhotosField = new GridField("StaffMembers", "Staff", $this->owner->StaffMembers(), $PhotosGridFieldConfig);
		    
		    $fields->addFieldToTab("Root.Slides", $PhotosField);
			
	        return $fields;
		}
	
	}
	
	class StaffPage_Controller extends Page_Controller {
	
		
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