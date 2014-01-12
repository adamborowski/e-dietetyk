Ext.define 'app.view.AppView',
    extend: 'Ext.container.Viewport'
    requires: [
        'app.view.HumanView'
        'app.helpers.kinetic.StageWrapper'
        'app.helpers.kinetic.ShapeWrapper'
        'app.helpers.kinetic.GroupWrapper'
        'app.view.human.Corps'
        'app.view.human.Legs'
        'app.view.human.Neck'
        'app.view.human.Arm'
        'app.view.human.Hand'
        'app.view.human.Head'
        'app.view.human.Breast'
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
                                xtype: 'fieldcontainer'
                                fieldLabel: 'Płeć'
                                defaultType: 'radiofield'
                                layout: 'hbox'
                                defaults:
                                    margin: '0 20px'
                                items: [
                                    {
                                        boxLabel: 'mężczyzna'
                                        name: 'size'
                                        inputValue: 'male'
                                        itemId: 'maleRadio'
                                        checked: yes
                                        listeners:
                                            change:
                                                fn: @updateHander
                                                scope: @
                                    }
                                    {
                                        boxLabel: 'kobieta'
                                        name: 'size'
                                        inputValue: 'female'
                                        itemId: 'femaleRadio'
                                        listeners:
                                            change:
                                                fn: @updateHander
                                                scope: @
                                    }
                                ]
                            }
                            {
                                xtype: 'slider'
                                itemId: 'weightInput'
                                fieldLabel: 'waga [kg]'
                                minValue: 40
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

        @loadAssets()
        return
#
    loadAssets: ->
        numToLoad = 2
        me = @
        @images =
            man: new Image()
            woman: new Image()
        @images.man.onload = ->
            numToLoad--
            if numToLoad == 0
                me.startApp()
        @images.woman.onload = @images.man.onload
        @images.man.src = 'e-dietetyk/images/man.png'
        @images.woman.src = 'e-dietetyk/images/woman.png'
    startApp: ->
        mainLayer = @down('#stage').mainLayer
        @body = body = Ext.create 'app.view.human.Corps',
            initialAttrs:
                fill: 'green'
#                opacity: 0.8
                strokeEnabled: no
        @legs = Ext.create 'app.view.human.Legs',
            layoutX: 0.1
            layoutY: 0.45
            layoutWidth: 0.8
            layoutHeight: 0.55
            initialAttrs:
                fill: 'orange'
                stroke: 'grey'
                strokeEnabled: no
        @neck = Ext.create 'app.view.human.Neck',
            layoutX: 0.3
            layoutWidth: 0.4
            layoutY: -0.2
            layoutHeight: 0.3
            initialAttrs:
                fill: '#FFC276'
        #                fill: 'black'
        @leftArm = Ext.create 'app.view.human.Arm',
            layoutX: -0.4
            layoutWidth: 0.6
            layoutY: 0.05
            layoutHeight: 1.1
            initialAttrs:
                fill: '#0CA100'
        @breast = Ext.create 'app.view.human.Breast',
            layoutX: 0.15
            layoutY: 0.25
            layoutWidth: 0.3
            layoutHeight: 0.6
        @breast2 = Ext.create 'app.view.human.Breast',
            layoutX: 1 - 0.15
            layoutY: 0.25
            layoutWidth: 0.3
            layoutHeight: 0.6
            initialAttrs:
                scaleX: -1
        @rightArm = Ext.create 'app.view.human.Arm',
            layoutX: 1.4
            layoutWidth: 0.6
            layoutY: 0.05
            layoutHeight: 1.1
            initialAttrs:
                fill: '#0CA100'
                scaleX: -1
        #        @leftHand = Ext.create 'app.view.human.Hand',
        #            initialAttrs:
        #                fill: 'yellow'
        #                x: 105
        #                y: -50
        #                width: 13
        #                height: 13
        #                strokeEnabled: no
        #        @rightHand = Ext.create 'app.view.human.Hand',
        #            initialAttrs:
        #                fill: 'yellow'
        #                x: 105
        #                y: -50
        #                width: 13
        #                height: 13
        #                strokeEnabled: no
        @head = Ext.create 'app.view.human.Head',
            initialAttrs:
                fill: 'transparent'
                strokeEnabled: no
            image: @images.woman
            layoutX: 0.15
            layoutWidth: 0.7
            layoutHeight: 0.3
            layoutY: -0.3


        @group = mainLayer.add
            wtype: 'group'
            layoutX: 0.5
            layoutY: 0.5
            layoutWidth: 0.2
            layoutHeight: 0.5
        @group.add @neck
        @group.add @legs
        @group.add
            wtype: 'group'
            children: [
                @leftArm
                @rightArm
                @body
                @breast
                @breast2
            ]
            layoutX: 0
            layoutY: 0
            layoutWidth: 1
            layoutHeight: 0.45
        @group.add @head
        #        @group.add @leftHand
        #        @group.add @rightHand
        me = @
        window.requestAnimationFrame ->
            me.updateHander()
    updateHander: ->
        bd = (@down('#weightInput').getValue() - 70) / -400
        isFemale = @down('#femaleRadio').getValue()
        @head.setImage if isFemale then @images.woman else @images.man
        @body.setBodyDensity bd
        @breast.setFemale isFemale
        @breast.setBodyDensity bd
        @breast2.setFemale isFemale
        @breast2.setBodyDensity bd
        @legs.setBodyDensity bd
        @neck.setBodyDensity bd
        @leftArm.setBodyDensity bd
        @rightArm.setBodyDensity bd
        #        @leftHand.get().setX @leftArm.handPlaceholder.x + @leftArm.get().getX()
        #        @leftHand.get().setY @leftArm.handPlaceholder.y + @leftArm.get().getY()
        #        @rightHand.get().setX -@rightArm.handPlaceholder.x + @rightArm.get().getX()
        #        @rightHand.get().setY @rightArm.handPlaceholder.y + @rightArm.get().getY()
        @group.setLayoutWidth Math.sqrt(@down('#weightInput').getValue()) / 80
        @group.setLayoutHeight Math.sqrt(@down('#heightInput').getValue()) / 40
        @group.invalidate()