Ext.define 'app.view.ScheduleView',
    extend: 'Ext.Container',
    requires: [
        'app.model.ActivityModel'
    ]
    config: [

    ]
    constructor: (config)->
        Ext.create "Ext.data.Store",
            id: "avaliableActivities"
            model: "app.model.ActivityModel"
            data: [
                type: 'Climbing'
                name: 'wspinaczka<br/>wyczynowa'
            ,
                type: 'Ping-pong'
                name: 'tenis stołowy'
            ,
                type: 'Running'
                name: 'bieganie'
            ,
                type: 'Basketball'
                name: 'koszykówka'
            ,
                type: 'Fishing'
                name: 'łowienie ryb'
            ,
                type: 'Football'
                name: 'piłka nożna'
            ,
                type: 'Frisbee'
                name: 'frisbee'
            ,
                type: 'Padding'
                name: 'wiosłowanie'
            ,
                type: 'Rugby'
                name: 'rugby'
            ,
                type: 'Skiing'
                name: 'narciarstwo'
            ,
                type: 'Skydiving'
                name: 'fruwanie'
            ,
                type: 'Swimming'
                name: 'pływanie'
            ,
                type: 'Tennis'
                name: 'tenis ziemny'
            ,
                type: 'Trekking'
                name: 'spacery'
            ,
                type: 'Yoga'
                name: 'yoga'

            ]
        templateString = """
<tpl for=".">
    <div class="schedule-item">
        <img class="schedule-image" src="#{app.url('e-dietetyk/images/activities/')}Sport-Activities-{type}-icon.png"/>
        <div class="name">
            {name}
        </div>
    </div>
</tpl>
"""
        imageTpl = new Ext.XTemplate templateString
        me = @
        console.log Ext.getStore('avaliableActivities')
        Ext.applyIf config,
            layout:
                type: 'hbox'
            items: [
                {
                    xtype: 'dataview'
                    store: Ext.getStore('avaliableActivities'),
                    tpl: imageTpl,
                    itemSelector: 'div.schedule-item',

                }
            ]

        #
        @callParent arguments
        window.extLoadCallback(this) if window.extLoadCallback?
    loadSchedule: (schedule)->
        return