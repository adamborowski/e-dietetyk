Ext.define 'app.view.ScheduleView',
    extend: 'Ext.Container',
    requires: [
        'app.model.ActivityModel'
        'Ext.window.MessageBox'
    ]
    config: [

    ]
    constructor: (config)->
        #
        Ext.applyIf config,
            layout:
                type: 'hbox'

        @callParent arguments
        window.extLoadCallback(this) if window.extLoadCallback?
    loadSchedule: (config)->
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
        Ext.create "Ext.data.Store",
            id: "userActivities"
            model: "app.model.ActivityModel"
            data: config.data
        templateString = """
    <tpl for=".">
        <div class="schedule-item">
            <img class="schedule-image" src="#{app.url('e-dietetyk/images/activities/')}Sport-Activities-{type}-icon.png"/>
            <div class="overlay">dodaj</div>
            <div class="name">
                {name}
            </div>
        </div>
    </tpl>
    """
        imageTpl = new Ext.XTemplate templateString
        Ext.window.Msg.alert "dupa", "Zmiany został222y zapamiętane"
        me = @
        @add [
            {
                xtype: 'dataview'
                width: 440
                store: Ext.getStore('avaliableActivities'),
                tpl: imageTpl,
                itemSelector: 'div.schedule-item',
                listeners:
                    scope: @
                    itemclick: (view, record, item, index, e)->
                        rec = record.copy();
                        Ext.data.Model.id(rec);
                        Ext.getStore('userActivities').add rec
                        return

            }
            {
                xtype: 'grid'
                margin: 8
                title: 'Aktywności uwzględniane w diecie'
                store: Ext.getStore('userActivities')
                columns: [
                    {
                        text: 'Aktywność'
                        width: 150
                        dataIndex: 'name'
                        align: 'center'
                        renderer: (value, metaData, record, rowIndex, colIndex, store)->
                            return """
<div class="schedule-item">
            <img class="schedule-image" src="#{app.url('e-dietetyk/images/activities/')}Sport-Activities-#{record.get('type')}-icon.png"/>
            <div class="name">
                #{record.get('name')}
            </div>
            <div class="overlay red">usuń</div>
        </div>


"""

                    }
                    {
                        text: 'Długość'
                        dataIndex: 'duration'
                        align: 'center'
                        tdCls: 'padding-cell'
                        renderer: (value)->
                            "#{value} h"
                        editor:
                            xtype: 'numberfield'
                            minValue: 0
                            maxValue: 10
                            step: 0.5
                    }
                    {
                        text: 'Dzień tygodnia'
                        width: 120
                        align: 'center'
                        dataIndex: 'weekDay'
                        tdCls: 'padding-cell'
                        editor:
                            xtype: 'combobox'
                            store: Ext.create('Ext.data.Store',
                                fields: [ 'name']
                                data: [
                                    { "name": "poniedziałek"}
                                    { "name": "wtorek"}
                                    { "name": "środa"}
                                    { "name": "czwartek"}
                                    { "name": "piątek"}
                                    { "name": "sobota"}
                                    { "name": "niedziela"}
                                ])
                            allowBlank: false
                            displayField: 'name',
                            valueField: 'name',
                            height: 30
                            editable: no
                    }
                    {
                        text: 'Pora dnia'
                        dataIndex: 'dayPart'
                        tdCls: 'padding-cell'
                        flex: 1
                        align: 'center'
                        editor:
                            xtype: 'combobox'
                            store: Ext.create('Ext.data.Store',
                                fields: [ 'name']
                                data: [
                                    { "name": "przed śniadaniem"}
                                    { "name": "po śniadaniu"}
                                    { "name": "przed obiadem"}
                                    { "name": "po obiedzie"}
                                    { "name": "przed kolacją"}
                                    { "name": "po kolacji"}
                                ])
                            allowBlank: false
                            displayField: 'name',
                            valueField: 'name',
                            height: 30

                            editable: no
                    }
                ]
                selType: 'cellmodel'
                plugins: [
                    Ext.create('Ext.grid.plugin.CellEditing',
                        clicksToEdit: 1
                    )
                ]
                flex: 1
                height: "100%"
                dockedItems: [
                    {
                        xtype: 'toolbar',
                        dock: 'bottom',
                        ui: 'footer',
                        items: [
                            { xtype: 'component', flex: 1 }
                            {
                                xtype: 'button'
                                text: 'Zapisz'
                                listeners:
                                    scope: @
                                    click: ->
                                        items = Ext.getStore('userActivities').getRange()
                                        data = JSON.stringify (i.data for i in items)
                                        Ext.Ajax.request
                                            url: config.saveUrl
                                            params:
                                                data: data
                                            success: ->
                                                Ext.window.Msg.alert "Powodzenie", "Zmiany zostały zapamiętane"
                                            failure: ->
                                                Ext.Msg.alert "Błąd", "Niestety, nie udało się zapisać danych. Więcej informacji mozna znaleźć w logach przegądarki"
                            }
                        ]
                    }
                ]
            }
        ]

return