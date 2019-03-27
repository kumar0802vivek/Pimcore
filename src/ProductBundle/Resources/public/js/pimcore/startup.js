pimcore.registerNS("pimcore.plugin.ProductBundle");

pimcore.plugin.ProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ProductBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ProductBundle ready!");
    }
});

var ProductBundlePlugin = new pimcore.plugin.ProductBundle();
