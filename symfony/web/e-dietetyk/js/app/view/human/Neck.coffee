Ext.define 'app.view.human.Neck',
    extend: 'app.helpers.kinetic.ComponentWrapper'
    config:
        points:
            a: [1 / 4, 0]
            b: [3 / 4, 0]
            c: [1, 1]
            d: [0, 1]
        bodyDensity: 0.05
    drawFunction: (ctx, width, height)->
        p = @getPoints()
        bd = @getBodyDensity() - 0.3
        ctx.moveTo p.a.x(), p.a.y()
        @deflectionPoint p.a, p.b, -0.2
        @deflectionPoint p.b, p.c, -bd
        @deflectionPoint p.c, p.d, -0.2
        @deflectionPoint p.d, p.a, -bd

        return
    applyBodyDensity: (val)->
        @invalidate()
        return val