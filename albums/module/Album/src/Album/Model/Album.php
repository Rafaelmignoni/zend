<?php

namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Album implements InputFilterAwareInterface
{
	public $id;
	public $artist;
	public $title;
	protected $inputFilter;
	
	public function exchangeArray($data)
	{
		$this->id		=	(!empty($data['id'])) ? $data['id'] : null;
		$this->artist	=	(!empty($data['artist'])) ? $data['artist'] : null;
		$this->title	=	(!empty($data['title'])) ? $data['title'] : null;
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception('Not Used');
	}
	
	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			
			$inputFilter->add(array(
					'name'	=> 'id',
					'required'	=> true,
					'filters' => array(
						array('name' => 'Int'),
			),
			));
		}
	}
}