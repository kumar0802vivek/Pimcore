/* 
 * @class uploadbutton
 * @desc This file adds button in the left navigation for the Easy Catalog Mass Upload
 */
pimcore.registerNS("pimcore.plugin.uploadbutton");

pimcore.plugin.uploadbutton = Class.create({
    /*
     * @constructor
     */
    initialize: function () {
    },
    /*
     * @desc Adds button icon in the left main menu
     */
    leftNavigation: function (scope) {
        var navigation = Ext.get("pimcore_navigation");
        var ulElement = navigation.selectNode('ul');
        var li = document.createElement("li");

        li.setAttribute("id", "pimcore_menu_uploadbutton");
        li.setAttribute("data-menu-tooltip", "Mass Upload");
        li.setAttribute("class", "pimcore_menu_item x-btn-icon-el-default-small pimcore_icon_upload pimcore_icon_overlay");

        ulElement.appendChild(li);
        
        Ext.get("pimcore_menu_uploadbutton").on("click", function (e, el) {
            var massUpload = new pimcore.plugin.massUploadUtility();
            
        });
    },
});

