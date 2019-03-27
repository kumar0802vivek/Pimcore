/* 
 * @class uploadbutton
 * @desc This file adds button in the left navigation for the Easy Catalog Mass Upload
 */

pimcore.registerNS("pimcore.plugin.massUploadUtility");

pimcore.plugin.massUploadUtility = Class.create({
    initialize: function () {
        this.openForm(this);
    },
    
    openForm: function(scope) {
        var utilityTab = Ext.get("massUploadUtility");
        if (utilityTab) {
            var tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.setActiveItem("massUploadUtility");
        } else {
            this.massUploadForm();
        }
        
    },
    
    
    massUploadForm: function(classes){
        var ClassArr = Ext.create('Ext.data.Store', {
            fields: ['abbr', 'name'],
            data: [
                {"abbr": "Product", "name": "Product"},
               
            ]
        });
        this.form = new Ext.form.Panel({
            region: "center",
            id: "massUploadUtilityForm",
            title: "Mass Upload Utility Configuration",
            bodyStyle: "padding: 10px;",
            closable: false,
            scrollable: true,
            iconCls: "pimcore_icon_settings",
            items: [
                {
                    xtype: 'combobox',
                    fieldLabel: 'Select Class',
                    name: 'className',
                    store: ClassArr,
                    queryMode: 'local',
                    displayField: 'name',
                    valueField: 'abbr',
                    width: '70%',
                    labelWidth: 150,
                    allowBlank: false,
                    afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                    msgTarget : 'under'
                },
                {
                    xtype: 'fileuploadfield',
                    name: 'attachment',
                    fieldLabel: 'Select Attachment',
                    labelWidth: 150,
                    allowBlank: false,
                    anchor: '70%',
                    buttonText: '',
                    buttonConfig: {
                        iconCls: 'pimcore_icon_upload'
                    },
                    afterLabelTextTpl: '<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
                    regex     : (/.(xlsx)$/i),
                    regexText : 'Attachment must be in excel format',
                    msgTarget : 'under'
                }
            ],
            buttons: [{
                    text: 'Submit',
                    id: 'submitPdb',
                    formBind: false, //only enabled once the form is valid
                    disabled: false,
                    handler: function () {
                        var form = this.up('form').getForm();
                        if (form.isValid()) {
                            var uploadurl = pimcore.helpers.addCsrfTokenToUrl('/admin/data_mass_upload/import');
                            form.submit({
                                url: uploadurl,
                                //waitMsg: t("please_wait"),
                                success: function (el, res) {
                                  pimcore.helpers.showNotification(t("Process Status"), t("Process completed. Please refer application logger for details."), "success");
                                },
                                failure: function (el, res) {
                                   pimcore.helpers.showNotification(t("Process Status"), t("Error in file upload"), "failure");
                                }

                            });
                        }
                    }
            }]
                
        });
        var tabId = "massUploadUtility";
        var tabTitle = "Mass Upload Utility";
        this.tabPanel = Ext.getCmp("pimcore_panel_tabs");
        this.tab = new Ext.TabPanel({
            id: tabId,
            title: tabTitle,
            closable: true,
            items: [this.form],
            iconCls: "pimcore_icon_settings",
            object: this
        });
        this.tab.on("afterrender", function (tabId) {
            this.tabPanel.setActiveItem(tabId);
        }.bind(this, tabId));
        this.tabPanel.add(this.tab);
        pimcore.layout.refresh();
    },  
    
});


