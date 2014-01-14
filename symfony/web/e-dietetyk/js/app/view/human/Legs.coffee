Ext.define 'app.view.human.Legs',
    extend: 'app.helpers.kinetic.ComponentWrapper'
    config:
        points:
            a: [-2.9 / 6, 0 / 12]
            b: [2.9 / 6, 0 / 12]
            c: [2 / 6, 12 / 12]
            d: [0.5 / 6, 12 / 12]
            e: [0 / 6, 3 / 12]
            f: [-.5 / 6, 12 / 12]
            g: [-2 / 6, 12 / 12]
        bodyDensity: 0.5
        centerX: 0.5
    drawFunction: (ctx, width, height)->
        p = @getPoints()
        @currentContext.moveTo p.b.x(), p.b.y()
        bd = Math.pow(@getBodyDensity(), 2) - 0.1
        @deflectionPoint p.b, p.c, -bd
        @deflectionPoint p.c, p.d, -0.1
        @deflectionPoint p.d, p.e, -bd
        @deflectionPoint p.e, p.f, -bd
        @deflectionPoint p.f, p.g, -0.1
        @deflectionPoint p.g, p.a, -bd
        @deflectionPoint p.a, p.b, -0.9


        return
    applyBodyDensity: (val)->
        @invalidate()
        return val