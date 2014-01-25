<?php

namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{
	
	public function __construct($name = null)
	{
		parent::__construct('album');
		
		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));
		
		$this->add(array(
				'name' => 'title',
				'type' => 'Text',
				'options' => array(
					'label' => 'Title',
		),
		));
		
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
					'value' => 'Vai',
					'id'	=> 'submitbutton'
		),
		));
	}
}