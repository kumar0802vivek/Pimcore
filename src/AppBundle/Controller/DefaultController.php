<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends FrontendController
{
    
    
    /**
     * @Route("/default")
     * 
     */
    public function defaultAction(Request $request)
    {
	$allParams = array_merge($request->request->all(), $request->query->all());
	$directoryPath = PIMCORE_PROJECT_ROOT.'/web/var/assets/MassUploadCSV';
        
	// check mass upload directory exists
	if(!is_dir($directoryPath)){
	    mkdir($directoryPath);
	    chmod($directoryPath,0777);
	}
	// upload file move to dir
	foreach ($request->files as $file) {
	    $filename = date("Y-m-d-H-i-s")."_".$file->getClientOriginalName();
	    if (!empty($filename)) {
		$file->move($directoryPath, $filename);
		chmod($directoryPath.'/'.$filename,0777);
		unset($file);
	    }
	}

    }
}
