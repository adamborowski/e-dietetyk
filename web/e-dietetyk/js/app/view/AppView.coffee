Ext.define 'app.view.AppView',
    extend: 'Ext.container.Viewport'
    requires: [
        'app.view.HumanView'
        'app.helpers.kinetic.StageWrapper'
        'app.helpers.kinetic.ShapeWrapper'
        'app.view.human.Corps'
        'app.view.human.Legs'
        'app.view.human.Arm'
        'app.view.human.Hand'
        'app.view.human.Head'
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
                        flex: 2
                        xtype: 'kineticstage'
                        itemId: 'stage'
                        style: 'border: 1px solid #5fae32'
                        margin: 10
                    }
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
        mainLayer = @down('#stage').mainLayer
        @body = body = Ext.create 'app.view.human.Corps',
            initialAttrs:
                fill: 'green'
#                opacity: 0.8
                x: 0
                y: 0
                width: 305
                height: 210
                strokeEnabled: no
        @legs = Ext.create 'app.view.human.Legs',
            initialAttrs:
                fill: 'orange'
                stroke: 'grey'
                x: 0
                y: 85
                width: 250
                height: 300
                strokeEnabled: no
        @leftArm = Ext.create 'app.view.human.Arm',
            initialAttrs:
                fill: 'gray'
                x: -105
                y: -50
                width: 90
                height: 240
                strokeEnabled: no
        @rightArm = Ext.create 'app.view.human.Arm',
            initialAttrs:
                fill: 'gray'
                x: 105
                y: -50
                scaleX: -1
                width: 90
                height: 240
                strokeEnabled: no
        @leftHand = Ext.create 'app.view.human.Hand',
            initialAttrs:
                fill: 'yellow'
                x: 105
                y: -50
                width: 13
                height: 13
                strokeEnabled: no
        @rightHand = Ext.create 'app.view.human.Hand',
            initialAttrs:
                fill: 'yellow'
                x: 105
                y: -50
                width: 13
                height: 13
                strokeEnabled: no
        @head = Ext.create 'app.view.human.Head',
            initialAttrs:
                fill: '#ECCAB9'
                x: 0
                y: -140
                width: 90
                height: 90
                strokeEnabled: no

        @group = new Kinetic.Group
            x: 500
            y: 300
            width: 200
            height: 500

        mainLayer.add @group
        @group.add @head.get()
        @group.add @legs.get()
        @group.add @leftHand.get()
        @group.add @rightHand.get()
        @group.add @leftArm.get()
        @group.add @rightArm.get()
        @group.add @body.get()
        me=@
        window.requestAnimationFrame ->
            me.updateHander()
        return

    updateHander: ->
        @body.setBodyDensity (@down('#weightInput').getValue() - 70) / -400
        @legs.setBodyDensity (@down('#weightInput').getValue() - 70) / -400
        @leftArm.setBodyDensity (@down('#weightInput').getValue() - 70) / -400
        @leftHand.get().setX @leftArm.handPlaceholder.x + @leftArm.get().getX()
        @leftHand.get().setY @leftArm.handPlaceholder.y + @leftArm.get().getY()
        @rightHand.get().setX -@rightArm.handPlaceholder.x + @rightArm.get().getX()
        @rightHand.get().setY @rightArm.handPlaceholder.y + @rightArm.get().getY()
        @group.setAttrs
            scaleX: Math.sqrt(@down('#weightInput').getValue() / 200)
            scaleY: @down('#heightInput').getValue() / 200
