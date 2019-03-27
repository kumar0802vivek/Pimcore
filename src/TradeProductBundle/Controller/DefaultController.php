<?php

namespace TradeProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TradeProductBundle\Command\TSProductImportCommand;
class DefaultController extends FrontendController
{
    /**
     * @Route("/trade_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from trade_product');
    }
    
    /**
     * @Route("/admin/data_mass_upload/import")
     * import function to call service which handle CSV Read Functionality and object creation/updation functionality
     * @param Request $request
     * @return Response
     */
    public function importAction(Request $request)
    {
        $commandObj = new TSProductImportCommand();
        $allParams = array_merge($request->request->all(), $request->query->all());
        //create path
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

        if (!empty($filename)) {

            $filePath = $directoryPath . "/" . $filename;
            $className = $allParams['className'];

            $params['filePath'] = $filePath;
            $params['fileMode'] = 'r';
            $params['className'] = $className;
            $params['import_type'] = '';

            if (!empty($className)) {
		$status = $commandObj->importProducts($params);
		if(!$status){
		    return $this->json(array("success"=>false));
		}
	    }
           
            
        } else {
           return $this->json(array("success"=>false));
        }
        
    }
}
