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
                name: 'wspinaczka wyczynowa'
            ,
                type: 'Pingpong'
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
                type: 'Treking'
                name: 'spacery'
            ,
                type: 'Yoga'
                name: 'yoga'

            ]
        templateString = """
<tpl for=".">
    <div class="item">
        <img src="#{app.url('e-dietetyk/images/activites/')}Sport-Activities-{type}-icon.png"/>
        <div class="name">
            {name}
        </div>
    </div>
</tpl>
     "<div style="margin-bottom: 10px;" class="thumb-wrap">", "<img src="{src}" />", "<br/><span>{caption}</span>", "</div>", "</tpl>"
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
                    itemSelector: 'div.item',

                }
            ]

        #
        @callParent arguments
        window.extScheduleLoadCallback(this) if window.extScheduleLoadCallback?
    loadProfile: (profile)->
        return