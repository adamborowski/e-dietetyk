Ext.application
    requires: [
        'app.view.AppView'
    ]
    name: 'app'
    appFolder: '../e-dietetyk/js/app'
    launch: ->
        app.url = (url)->
            "../#{url}"
        Ext.fly('ext-loading-spinner').remove()
        Ext.fly('ext-body-density-panel').show({duration: 1000,delay:1000})
        Ext.create 'app.view.AppView',
            renderTo: Ext.Element.get 'ext-app-container'
        Ext.fly('ext-app-container').show({duration: 1000})
