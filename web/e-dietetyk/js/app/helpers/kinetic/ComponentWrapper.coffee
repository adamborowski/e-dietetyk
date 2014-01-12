Ext.define 'app.helpers.kinetic.ComponentWrapper',
    extend: 'app.helpers.kinetic.BaseWrapper'
    alias: 'kinetic.wrapper.component'
    config:
        centerX: 0
        centerY: 0
        centerXRelative: yes # center offset of drawing points (may be relative to parent)
        centerYRelative: yes
        points:[]
        autoClose:yes
    updateLayout: (x, y, w, h)->
        #only remember those parameters for further drawing
        @currentX = x
        @currentY = y
        @currentWidth = w
        @currentHeight = h
        @currentCenterX = @getCenterX()
        @currentCenterX *= w  if @getCenterXRelative()
        @currentCenterY = @getCenterY()
        @currentCenterY *= h if @getCenterYRelative()
        @callParent arguments
    constructor: (config, kineticObject = new Kinetic.Shape())->
        me = @
        shapeConfig =
            drawFunc: (context) ->
                width = me.currentWidth
                height = me.currentHeight
                me.currentContext = context
                #implementation of shape
                context.beginPath()
                me.drawFunction context, width, height
                if me.getAutoClose()
                    context.closePath()
                # KineticJS specific context method
                context.fillStrokeShape @
        #                context._context.strokeRect 0, 0, width, height
        @callParent [config, kineticObject]
        kineticObject.setAttrs shapeConfig
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
    applyPoints: (points)->
        #calculate bounds of points
        me = @
        for key, point of points
            point.x = ->
                this[0] * me.currentWidth + me.currentCenterX
            point.y = ->
                this[1] * me.currentHeight + me.currentCenterY
        return points
    getPoint: (point)->
        x: point[0] * @currentWidth + @currentCenterX
        y: point[1] * @currentHeight + @currentCenterY
    normalizeX: (x)->
        x * @currentWidth + @currentCenterX
    normalizeY: (y)->
        y * @currentHeight + @currentCenterY
    bezier2: (a, b)->
        @currentContext.quadraticCurveTo a.x(), a.y(), b.x(), b.y()
    bezier3: (a, b, c)->
        a = @getPoint a
        b = @getPoint b
        c = @getPoint c
        @currentContext.bezierCurveTo a.x, a.y, b.x, b.y, c.x, c.y
    bezier3Relative: (xa, ya, xb, yb, xc, yc)->
        @currentContext.bezierCurveTo(@normalizeX(xa), @normalizeY(ya), @normalizeX(xb), @normalizeY(yb), @normalizeX(xc), @normalizeY(yc))
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

