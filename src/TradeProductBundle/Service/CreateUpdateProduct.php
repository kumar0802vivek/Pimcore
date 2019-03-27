<?php

/**
 * @desc Generate Product Hierarchy
 * 
 */

namespace TradeProductBundle\Service;

//use Pimcore\Log\ApplicationLogger;
//use Pimcore\Model\DataObject;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CreateUpdateProduct {

    
    /**
    * @desc Entry point when instance is created
    * @param $container
    */
    
    public function __construct(ContainerInterface $container) {
        
    }

    /**
     * @desc create product
     * @param $jsonData
     * @return Array
     * @throws \Exception
     */
    public function createUpdateProduct($params) {
        print_r($params); exit;
    }

    
}