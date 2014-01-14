Ext.application
    requires: [
        'app.view.AppView'
    ]
    name: 'app'
    appFolder: 'e-dietetyk/js/app'
    launch: ->
        Ext.create 'app.view.AppView',{}