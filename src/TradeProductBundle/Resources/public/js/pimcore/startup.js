pimcore.registerNS("pimcore.plugin.TradeProductBundle");

pimcore.plugin.TradeProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.TradeProductBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
	var uploadbutton = new pimcore.plugin.uploadbutton();
	uploadbutton.leftNavigation();
    }
});

var TradeProductBundlePlugin = new pimcore.plugin.TradeProductBundle();