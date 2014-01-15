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
                type: 'vbox'
                align: 'stretch'

        @callParent arguments
        window.extLoadCallback(this) if window.extLoadCallback?
    save: ->
        items = Ext.getStore('userActivities').getRange()
        data = JSON.stringify (i.data for i in items)
        Ext.Ajax.request
            url: @config.saveUrl
            params:
                data: data
                id: @config.id
                cel: @down('#celInput').getValue()
                iloscPosilkow: @down('#iloscInput').getValue()
                nazwa: @down('#nazwaInput').getValue()
            success: ->
                Ext.Msg.alert "Powodzenie", "Zmiany zostały zapamiętane"
            failure: ->
                Ext.Msg.alert "Błąd", "Niestety, nie udało się zapisać danych. Więcej informacji mozna znaleźć w logach przegądarki"
    loadSchedule: (config)->
        @config = config
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
        order =
            'poniedziałek': 1
            'wtorek': 2
            'środa': 3
            'czwartek': 4
            'piątek': 5
            'sobota': 6
            'niedziela': 7
        order2 =
            'przed śniadaniem': 1
            'po śniadaniu': 2
            'przed obiadem': 3
            'po obiedzie': 4
            'przed kolacją': 5
            'po kolacji': 6

        Ext.create "Ext.data.Store",
            id: "userActivities"
            model: "app.model.ActivityModel"
            data: config.data
            groupField: 'weekDay'
            remoteSort: true
            sorters: [
                {
                    sorterFn: (o1, o2)->
                        o1_d = order[o1.get('weekDay')]
                        o2_d = order[o2.get('weekDay')]
                        console.log o1_d, o2_d, o1.get('weekDay'), o2.get('weekDay')
                        if o1_d < o2_d
                            return -1
                        if o1_d > o2_d
                            return 1
                        o1_s = order2[o1.get('dayPart')]
                        o2_s = order2[o2.get('dayPart')]
                        console.log o1_s, o2_s, o1.get('dayPart'), o2.get('dayPart')
                        if o1_s < o2_s
                            return -1
                        if o1_s > o2_s
                            return 1
                        if o1.getId() < o2.getId()
                            return -1
                        if o1.getId() > o2.getId()
                            return 1
                        return 0
                }
            ]

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
        me = @
        @add [
            {
                xtype: 'container'
                layout: 'form'
                margin: '20 600 10 20'
                items: [
                    {
                        xtype: 'textfield'
                        value: ''
                        fieldLabel: 'nazwa diety'
                        itemId: 'nazwaInput'
                    }
                    {
                        fieldLabel: 'cel'
                        itemId: 'celInput'
                        xtype: 'combobox'
                        width: 400
                        store: Ext.create('Ext.data.Store',
                            fields: [ 'name', 'value']
                            data: [
                                { "name": "na masę", value: 1}
                                { "name": "bez zmian", value: 2}
                                { "name": "schudnięcie", value: 3}
                            ])
                        displayField: 'name',
                        valueField: 'value',
                        editable: no
                        value: 1
                    }
                    {
                        xtype: 'numberfield'
                        minValue: 1
                        maxValue: 6
                        value: 3
                        fieldLabel: 'ilość posiłków dziennie'
                        itemId: 'iloscInput'
                    }
                ]
            }
            {
                xtype: 'container'
                layout:
                    type: 'hbox'
                items: [
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
                                rec.set('dayPart', 'po śniadaniu')
                                rec.set('weekDay', 'środa')
                                rec.commit()
                                store = Ext.getStore('userActivities')
                                store.add rec
                                return

                    }
                    {
                        xtype: 'grid'
                        margin: 8
                        title: 'Aktywności uwzględniane w diecie (dodaj klikając w aktywności z lewej strony)'
                        store: Ext.getStore('userActivities')
                        columns: [
                            {
                                sortable: no
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
                                sortable: no
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
                                sortable: no
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
                                sortable: no
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
                        features: [
                            {
                                ftype: 'grouping'
                            }
                        ]
                        flex: 1
                        height: "100%"
                        dockedItems: [
                            {
                                xtype: 'toolbar'
                                dock: 'bottom'
                                ui: 'footer'
                                items: [
                                    { xtype: 'component', flex: 1 }
                                    {
                                        xtype: 'button'
                                        text: 'Zapisz'
                                        listeners:
                                            scope: @
                                            click: @save
                                    }
                                ]
                            }
                        ]
                        listeners:
                            scope: @
                            cellclick: (gridRef, td, cellIndex, record, tr, rowIndex, e, eOpts)->
                                if cellIndex == 0
                                    Ext.getStore('userActivities').remove(record)
                                return
                    }
                ]
            }

        ]
        @down('#celInput').setValue @config.cel
        @down('#nazwaInput').setValue @config.nazwa
        @down('#iloscInput').setValue @config.iloscPosilkow

return