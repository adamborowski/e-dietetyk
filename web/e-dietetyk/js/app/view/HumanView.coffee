Ext.define 'app.view.HumanView',
    extend: 'app.helpers.CanvasWrapper'
    config:
        isMale: yes
        age: 22
        weight: 80
        height: 175
        waistline: 80
        hipSize: 88

    setIsMale: ->
        @render()
#        @callParent arguments
    setAge: ->
        @render()
#        @callParent arguments
    setWeight: ->
        @render()
#        @callParent arguments
    setHeight: ->
        @render()
#        @callParent arguments
    setWaistLine: ->
        @render()
#        @callParent arguments
    setHipSize: ->
        @render()
    render: (w, h) ->
        #        throw new Error 'Not implemented'
        @circle.scaleX = w/100
        @circle.scaleY = h/100
        @callParent arguments
        @stage.update();
        return
    constructor: (config = {})->
        @callParent arguments
        @_initEasel()
        return
    _initEasel: ->
        @stage = stage = new createjs.Stage @getCanvas()
        @circle = circle = new createjs.Shape()
        circle.graphics.beginFill("red").drawCircle(0, 0, 24)
        circle.x = 0
        circle.y = 0
        stage.addChild(circle)
        stage.update()
        return