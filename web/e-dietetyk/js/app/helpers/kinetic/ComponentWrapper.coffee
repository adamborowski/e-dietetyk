Ext.define 'app.helpers.kinetic.ComponentWrapper',
    extend: 'app.helpers.kinetic.BaseWrapper'
    updateLayout: (x, y, w, h)->
        #only remember those parameters for further drawing
        @currentX = x
        @currentY = y
        @currentWidth = w
        @currentHeight = h
    constructor: (config, kineticObject = null)->
        Ext.apply @getInitialAttrs(), config.initialAttrs
        @initConfig config
        @callParent arguments
        me = @
        shapeConfig = @getInitialAttrs()
        shapeConfig.drawFunc = (context) ->
            width = me.currentWidth = @getWidth()
            height = me.currentHeight = @getHeight()
            me.currentContext = context
            #implementation of shape
            context.beginPath()
            me.drawFunction context, width, height
            context.closePath()
            # KineticJS specific context method
            context.fillStrokeShape @

        if kineticObject?
            kineticObject.setAttrs shapeConfig
        else
            kineticObject = new Kinetic.Shape shapeConfig
        @callParent [config, kineticObject]
        return

    drawFunction: (ctx, width, height)->
        p = @getPoints()
        ctx.moveTo p.a.x(), p.a.y()
        ctx.lineTo p.b.x(), p.b.y()
        ctx.lineTo p.c.x(), p.c.y()
        ctx.lineTo p.d.x(), p.d.y()
        return
    setAttrs: (attrs)->
        @kineticObject.setAttrs attrs
    get: ->
        @kineticObject

    applyPoints: (points)->
        #calculate bounds of points
        me = @
        for key, point of points
            point.x = ->
                this[0] * me.currentWidth
            point.y = ->
                this[1] * me.currentHeight
        return points
    getPoint: (point)->
        x: point[0] * @currentWidth
        y: point[1] * @currentHeight
    bezier2: (a, b)->
        @currentContext.quadraticCurveTo a.x(), a.y(), b.x(), b.y()
    bezier3: (a, b, c)->
        a = @getPoint a
        b = @getPoint b
        c = @getPoint c
        @currentContext.bezierCurveTo a.x, a.y, b.x, b.y, c.x, c.y

    deflection: (aX, aY, bX, bY, balance)->
        middleX = (aX + bX) / 2
        middleY = (aY + bY) / 2
        vecX = bX - middleX
        vecY = bY - middleY
        px = -vecY
        py = +vecX
        controlX = middleX + px * balance
        controlY = middleY + py * balance
        @currentContext.quadraticCurveTo controlX, controlY, bX, bY
    deflectionPoint: (a, b, balance)->
        aX = a.x()
        aY = a.y()
        @deflection aX, aY, b.x(), b.y(), balance

