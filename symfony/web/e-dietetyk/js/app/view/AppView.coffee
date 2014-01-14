Ext.define 'app.view.AppView',
    extend: 'Ext.Container'
    requires: [
        'app.view.HumanView'
        'app.helpers.BodyCalculator'
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
    createFatControls: (title, imgSrc, sliderId, sliderMin, sliderMax)->
        xtype: 'container'
        cls: 'fat-control'
        layout:
            type: 'vbox'
            align: 'right'
        padding: 10
        items: [
            {
                xtype: 'label'
                cls: 'fat-control-title'
                html: title
                width: 200
            }
            {
                xtype: 'image'
                src: imgSrc
                width: 200
                height: 200
            }
            {
                margin: '-25px 0px 10px 0'
                height: 25
                xtype: 'label'
                text: "#{Math.floor(sliderMin + sliderMax) / 2} mm"
                itemId: "#{sliderId}_label"
                cls: 'fat-control-indicator'
            }
            {
                xtype: 'slider'
                width: 200
                itemId: sliderId
#                tipText: (thumb)->
#                    thumb.value + ' mm'
                useTips: no
                minValue: sliderMin
                maxValue: sliderMax
                value: Math.floor(sliderMin + sliderMax) / 2
                margin: 5
                listeners:
                    scope: @
                    change: (self, val)->
                        @down("##{sliderId}_label").setText "#{val} mm"
                        @updateHander()

            }

        ]
    constructor: (config)->
        Ext.applyIf config,
            layout: 'fit'
            items: [
                xtype: 'container',
                title: 'Profil Użytkownika',
                layout:
                    type: 'hbox'
                items: [
                    {
                        xtype: 'form'
                        border: no
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
                                        listeners:
                                            change:
                                                fn: @updateHander
                                                scope: @
                                    }
                                    {
                                        boxLabel: 'kobieta'
                                        name: 'size'
                                        inputValue: 'female'
                                        checked: yes
                                        itemId: 'femaleRadio'
                                        listeners:
                                            change:
                                                fn: @updateHander
                                                scope: @
                                    }
                                ]
                            }
                            {
                                xtype: 'numberfield'
                                itemId: 'ageInput'
                                fieldLabel: 'Wiek'
                                step: 1
                                value: 21
                                minValue: 18
                                maxValue: 55
                                width: 180
                                listeners:
                                    change:
                                        fn: @updateHander
                                        scope: @
                            }
                            {
                                xtype: 'fieldcontainer'
                                layout: 'hbox'
                                itemId: 'man_fat'
                                hidden: yes
                                cls: 'fat'
                                fieldLabel: 'Pomiar tłuszczu'
                                items: [
                                    @createFatControls('pępek', app.url('e-dietetyk/images/measurements/man_pepek.png'), 'man_slider_pepek',
                                        0, 100)
                                    @createFatControls('udo', app.url('e-dietetyk/images/measurements/man_udo.png'), 'man_slider_udo', 0,
                                        150)
                                    @createFatControls('klatka', app.url('e-dietetyk/images/measurements/man_klatka.png'),
                                        'man_slider_klatka', 0, 100)
                                ]
                            }
                            {
                                xtype: 'fieldcontainer'
                                layout: 'hbox'
                                itemId: 'woman_fat'
                                fieldLabel: 'Pomiar tłuszczu'
                                cls: 'fat'
                                items: [
                                    @createFatControls('biodro', app.url('e-dietetyk/images/measurements/woman_biodro.png'),
                                        'woman_slider_biodro', 0, 80)
                                    @createFatControls('udo', app.url('e-dietetyk/images/measurements/woman_udo.png'), 'woman_slider_udo',
                                        0, 90)
                                    @createFatControls('triceps', app.url('e-dietetyk/images/measurements/woman_triceps.png'),
                                        'woman_slider_triceps', 0, 60)
                                ]
                            }
                            {
                                xtype: 'fieldcontainer'

                                fieldLabel: '<i>Body Density</i>'
                                items: [
                                    {
                                        xtype: 'label'
                                        itemId: 'densityOutput'
                                        cls: 'body-density-info'
                                        text: '15%'
                                    }
                                ]
                            }
                            {
                                xtype: 'slider'
                                itemId: 'weightInput'
                                fieldLabel: 'waga [kg]'
                                minValue: 40
                                value: 60
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
                                value: 170
                                width: 400
                                listeners:
                                    change:
                                        fn: @updateHander
                                        scope: @
                            }
                        ]
                    }
                    {
                        flex: no
                        width: 295
                        height: 557
                        xtype: 'kineticstage'
                        itemId: 'stage'
                        margin: '0 0 0 10'
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
        @images.man.src = app.url('e-dietetyk/images/man.png')
        @images.woman.src = app.url('e-dietetyk/images/woman.png')
    startApp: ->
        mainLayer = @down('#stage').mainLayer
        @body = body = Ext.create 'app.view.human.Corps',
            initialAttrs:
                fill: 'green'
        #                opacity: 0.8
        @legs = Ext.create 'app.view.human.Legs',
            layoutX: 0.1
            layoutY: 0.45
            layoutWidth: 0.8
            layoutHeight: 0.55
            initialAttrs:
                fill: 'orange'
        @neck = Ext.create 'app.view.human.Neck',
            layoutX: 0.3
            layoutWidth: 0.4
            layoutY: -0.2
            layoutHeight: 0.3
            initialAttrs:
                fill: '#FFC276'
        #                fill: 'black'
        @breast = Ext.create 'app.view.human.Breast',
            layoutX: 0.20
            layoutY: 0.20
            layoutWidth: 0.27
            layoutHeight: 0.6
        @breast2 = Ext.create 'app.view.human.Breast',
            layoutX: 1 - 0.20
            layoutY: 0.20
            layoutWidth: 0.27
            layoutHeight: 0.6
            initialAttrs:
                scaleX: -1
        @leftArm = Ext.create 'app.view.human.Arm',
            layoutX: -0.27
            layoutWidth: 0.4
            layoutY: 0.05
            layoutHeight: 1.1
            initialAttrs:
                fill: '#0CA100'
        @rightArm = Ext.create 'app.view.human.Arm',
            layoutX: 1.27
            layoutWidth: 0.4
            layoutY: 0.05
            layoutHeight: 1.1
            initialAttrs:
                fill: '#0CA100'
                scaleX: -1
        @leftHand = Ext.create 'app.view.human.Hand',
            layoutWidth: 6
            relativeWidth: no
            layoutHeight: 6
            relativeHeight: no
            layoutY: 1.16
            layoutX: -0.21
            initialAttrs:
                fill: '#FFBE6D'
        @rightHand = Ext.create 'app.view.human.Hand',
            layoutWidth: 6
            relativeWidth: no
            layoutHeight: 6
            relativeHeight: no
            layoutY: 1.16
            layoutX: 1.21
            initialAttrs:
                fill: '#FFBE6D'
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
            layoutX: 0.21
            layoutY: 0.3
            layoutWidth: 1
            layoutHeight: 1
        @group.add @neck
        @group.add @legs
        @group.add
            wtype: 'group'
            children: [
                @leftHand
                @rightHand
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
        age = @down('#ageInput').getValue()
        @head.setImage if isFemale then @images.woman else @images.man
        @breast.setFemale isFemale
        @breast2.setFemale isFemale


        if isFemale
            @down('#woman_fat').setVisible yes
            @down('#man_fat').setVisible no
            Ext.fly('ext-body-women').setDisplayed yes
            Ext.fly('ext-body-men').setDisplayed no
            opts =
                biodro: @down('#woman_slider_biodro').getValue()
                triceps: @down('#woman_slider_triceps').getValue()
                udo: @down('#woman_slider_udo').getValue()
            dens = app.helpers.BodyCalculator.bodyDensity(no, age, opts)
        else
            @down('#woman_fat').setVisible no
            @down('#man_fat').setVisible yes
            Ext.fly('ext-body-women').setDisplayed no
            Ext.fly('ext-body-men').setDisplayed yes

            opts =
                klatka: @down('#man_slider_klatka').getValue()
                pepek: @down('#man_slider_pepek').getValue()
                udo: @down('#man_slider_udo').getValue()
            dens = app.helpers.BodyCalculator.bodyDensity(yes, age, opts)
        @down('#densityOutput').setText Ext.util.Format.number(dens * 100,
            "0.0%") + " <i>(reference: Jackson, et al. (1980), based on a sample aged 18-55)</i>", no
        Ext.fly('ext-body-density-output').setHTML Ext.util.Format.number(dens * 100,
            "0.0%")

        weight = Math.sqrt(@down('#weightInput').getValue()) / 40
        @group.setLayoutWidth (weight * 0.7 + dens * 0.3) * 1.5
        @group.setLayoutHeight (Math.sqrt(@down('#heightInput').getValue()) / 20) * 0.8
        @group.invalidate()

        bd = (dens * 0.7 + weight * 0.3)
        @body.setBodyDensity bd
        @breast.setBodyDensity bd
        @breast2.setBodyDensity bd
        @legs.setBodyDensity bd
        @neck.setBodyDensity bd
        @leftArm.setBodyDensity bd
        @leftHand.setBodyDensity bd
        @rightArm.setBodyDensity bd
        @rightHand.setBodyDensity bd