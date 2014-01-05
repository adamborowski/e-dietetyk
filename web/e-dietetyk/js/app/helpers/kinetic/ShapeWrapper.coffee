Ext.define 'app.helpers.kinetic.ShapeWrapper',
    config:
        initialAttrs:
            fill: "#00D2FF"
            stroke: "black"
            strokeWidth: 4
    constructor: (config)->
        @initConfig config
        @callParent arguments
        me = @
        shapeConfig = @getInitialAttrs()
        shapeConfig.drawFunc = (context) ->
            context.beginPath()
            width = @getWidth()
            height = @getHeight()
            #implementation of shape
            me.drawFunction context, width, height
            context.closePath()
            # KineticJS specific context method
            context.fillStrokeShape @

        this.kineticShape = new Kinetic.Shape shapeConfig

    drawFunction: (ctx, width, height)->
        ctx.drawRect 0, 0, width, height
        return
    setAttrs: (attrs)->
        @kineticShape.setAttrs attrs
    get: ->
        @kineticShape

