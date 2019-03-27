<?php

namespace ProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ProductBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/product/js/pimcore/startup.js'
        ];
    }
}
