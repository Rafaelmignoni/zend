<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Form\AlbumForm;
use Album\Model\Album;

class AlbumController extends AbstractActionController
{
	protected $albumTable;
	
    public function indexAction()
    {
        return new ViewModel(array(
        		'albums' => $this->getAlbumTable()->fetchAll()
        ));
    }
    
    public function addAction()
    {
    	$form = new AlbumForm();
    	$form->get('submit')->setValue('Add');
    	
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$album = new Album();
    		$form->setInputFilter($album->getInputFilter());
    		$form->setData($request->getPost());
    		
    		if ($form->isValid()) {
    			$album->exchangeArray($form->getData());
    			$this->getAlbumTable()->saveAlbum($album);
    			
    			return $this->redirect()->toRoute('album');
    		}
    	}
    	
    	return array('form' => $form);
    }
    
    public function editAction()
    {
    	
    }
    
    public function deleteAction()
    {
    	
    }
    
    public function vemvoceAction()
    {
    	
    }
    
    public  function getAlbumTable()
    {
    	if (!$this->albumTable) {
    		$sm = $this->getServiceLocator();
    		$this->albumTable = $sm->get('Album\Model\AlbumTable');
    	}
    	return $this->albumTable;
    }
}
