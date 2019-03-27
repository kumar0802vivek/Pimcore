<?php

namespace ProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/product")
     */
    public function indexAction(Request $request)
    {
        if ('asset' === $request->get('type')) {
        $asset = Asset::getById($request->get('id'));
        if ('folder' === $asset->getType()) {
            $this->view->assets = $asset->getChildren();
        }
    }
    }
}
