Ext.define 'app.helpers.kinetic.ShapeWrapper',
    config:
        initialAttrs:
            fill: "#00D2FF"
            stroke: "black"
            strokeWidth: 4
            width: 100
            height: 100
            strokeScaleEnabled: no
            strokeEnabled: yes
        points:
            a: [0, 0]
            b: [1, 0]
            c: [1, 1]
            d: [0, 1]
        margin: 0
    constructor: (config)->
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

        if config.kineticShape?
            @kineticShape = config.kineticShape
            delete config.kineticShape
            @kineticShape.setAttrs shapeConfig
        else
            this.kineticShape = new Kinetic.Shape shapeConfig
        return
    calculateBounds: (width, height)->
        return
    normalize: (point)->
        #normalize point from initial bounds to current dimensions
        return

    drawFunction: (ctx, width, height)->
        p = @getPoints()
        ctx.moveTo p.a.x(), p.a.y()
        ctx.lineTo p.b.x(), p.b.y()
        ctx.lineTo p.c.x(), p.c.y()
        ctx.lineTo p.d.x(), p.d.y()
        return
    setAttrs: (attrs)->
        @kineticShape.setAttrs attrs
    get: ->
        @kineticShape

    applyPoints: (points)->
        #calculate bounds of points
        minx = 0
        miny = 0
        maxx = 0
        maxy = 0
        me = @
        for key, point of points
            point.x = ->
                this[0] / me.boundsWithMargin.width * me.currentWidth
            point.y = ->
                this[1] / me.boundsWithMargin.height * me.currentHeight
            minx = Math.min(point[0], minx)
            maxx = Math.max(point[0], maxx)
            miny = Math.min(point[1], miny)
            maxy = Math.max(point[1], maxy)
        @bounds =
            minx: minx
            maxx: maxx
            miny: miny
            maxy: maxy
            width: maxx - minx
            height: maxy - miny
        @calculateBoundsWithMargin()

        return points
    calculateBoundsWithMargin: ->
        margin = @getMargin()
        return unless margin?
        @boundsWithMargin =
            minx: @bounds.minx + margin.left
            maxx: @bounds.maxx - margin.right
            miny: @bounds.miny + margin.top
            maxy: @bounds.maxy - margin.bottom
            width: @bounds.width - margin.left - margin.right
            height: @bounds.height - margin.top - margin.bottom
    getPoint: (point)->
        x: point[0] / @boundsWithMargin.width * @currentWidth
        y: point[1] / @boundsWithMargin.height * @currentHeight
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

    applyMargin: (margin)->
        if Ext.isString margin
            margin = margin.split ' '
            if margin.length == 4
                return{
                top: margin[0]
                right: margin[1]
                bottom: margin[2]
                left: margin[3]
                }
            else if margin.length == 2
                return {
                top: margin[0]
                right: margin[1]
                bottom: margin[0]
                left: margin[1]
                }
        if Ext.isNumber margin
            return {
            top: margin
            right: margin
            bottom: margin
            left: margin
            }

        margin.left = 0 unless margin.left?
        margin.top = 0 unless margin.top?
        margin.bottom = 0 unless margin.bottom?
        margin.right = 0 unless margin.right?
        @calculateBoundsWithMargin() if @bounds?
        return margin
    invalidate: ->
        @kineticShape.getStage().draw() if @kineticShape?
    