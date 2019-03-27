<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends FrontendController
{
    public function defaultAction(Request $request)
    {

    }
    
   
    public function indexAction(Request $request)
    {
	
	if ('object' === $request->get('type')) {
        $object = \Pimcore\Model\DataObject::getById($request->get('id'));
	
	$this->view->assets = $object;
	
	
    }
    }
}
