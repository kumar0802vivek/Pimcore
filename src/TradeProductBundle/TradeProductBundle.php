<?php

namespace TradeProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class TradeProductBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/tradeproduct/js/pimcore/startup.js'
        ];
    }
}
