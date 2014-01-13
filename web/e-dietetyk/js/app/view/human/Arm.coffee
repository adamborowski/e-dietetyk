Ext.define 'app.view.human.Arm',
    extend: 'app.helpers.kinetic.ComponentWrapper'
    config:
        points:
            a: [1.1, 0]
            b: [1.15, 1 / 4]
            c: [0.3, 1]
            d: [0, 1]
        bodyDensity: 0.05
    drawFunction: (ctx, width, height)->
        p = @getPoints()
        bd = @getBodyDensity()*2
        ctx.moveTo p.a.x(), p.a.y()
        @deflectionPoint p.a, p.b, -1
        @deflectionPoint p.b, p.c, bd * 0.7
        @deflectionPoint p.c, p.d, 0.1
        @deflectionPoint p.d, p.a, -bd * 0.5
        @handPlaceholder =
            x: (p.c.x() + p.d.x()) / 2
            y: (p.c.y() + p.d.y()) / 2
        return
    applyBodyDensity: (val)->
        @invalidate()
        return val