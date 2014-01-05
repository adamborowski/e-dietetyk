Ext.define 'app.view.AppView',
    extend: 'Ext.container.Viewport'
    requires: [
        'app.view.HumanView'
        'app.helpers.kinetic.StageWrapper'
    ]

    constructor: (config)->
        Ext.applyIf config,
            layout: 'fit'
            items: [
                xtype: 'panel',
                title: 'Users',
                layout:
                    type: 'vbox'
                    align: 'stretch'
                    pack: 'stretch'
                items: [
                    {
                        xtype: 'label'
                        html: 'human body renderer'
                    }
                    {
                        flex:2
                        xtype:'kineticstage'
                        itemId:'stage'
                        style: 'border: 1px solid #5fae32'
                        margin: 10
                    }
                    Ext.create 'app.view.HumanView',
                        flex: 1
                        itemId: 'human'
                        style: 'border: 1px solid #445555'
                        margin: 10
                    {
                        xtype: 'form'
                        defaults:
                            margin: 20
                        items: [
                            {
                                xtype: 'slider'
                                itemId: 'weightInput'
                                fieldLabel: 'waga [kg]'
                                minValue: 30
                                maxValue: 200
                                width: 400
                                listeners:
                                    change:
                                        fn: @updateHander
                                        scope: @
                            }
                            {
                                xtype: 'slider'
                                itemId: 'heightInput'
                                fieldLabel: 'wzrost [cm]'
                                minValue: 140
                                maxValue: 220
                                width: 400
                                listeners:
                                    change:
                                        fn: @updateHander
                                        scope: @
                            }
                        ]
                    }
                ]
            ]
        @callParent arguments
        mainLayer=@down('#stage').mainLayer
        circle = new Kinetic.Circle({
            x: mainLayer.getStage().getWidth() / 2,
            y: mainLayer.getStage() .getHeight() / 2,
            radius: 70,
            fill: 'red',
            stroke: 'black',
            strokeWidth: 4
        });
        mainLayer.add circle
        return

    updateHander: ->
        human = @down('#human')
        Ext.apply human.getValues(),
            weight: @down('#weightInput').getValue()
            height: @down('#heightInput').getValue()
        human.render()