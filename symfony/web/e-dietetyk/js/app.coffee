Ext.application
    requires: [
        'app.view.AppView'
        'app.view.ScheduleView'
    ]
    name: 'app'
    appFolder: '../e-dietetyk/js/app'
    launch: ->
        app.url = (url)->
            "../#{url}"
        Ext.fly('ext-loading-spinner').remove()
        # która wersja aplikacji?
        version = Ext.fly('ext-app-container').getAttribute('data-view')
        className = switch version
            when 'profile' then 'app.view.AppView'
            when 'schedule' then 'app.view.ScheduleView'

        Ext.create className,
            renderTo: Ext.Element.get 'ext-app-container'
            Ext.fly('ext-app-container').show({duration: 1000})
        if version == 'profile'
            Ext.fly('ext-body-density-panel').show({duration: 1000, delay: 1000})



