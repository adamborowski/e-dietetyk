Ext.define 'app.view.human.Arm',
    extend: 'app.helpers.kinetic.ShapeWrapper'
    config:
        points:
            a: [0, 0]
            b: [0.5, 0.5]
            c: [-1.5, 4.8]
            d: [-2.4, 5]
        bodyDensity: 0.05
    drawFunction: (ctx, width, height)->
        p = @getPoints()
        bd = @getBodyDensity() - 0.5
        ctx.moveTo p.a.x(), p.a.y()
        @deflectionPoint p.a, p.b, 1
        @deflectionPoint p.b, p.c, -bd * 0.7
        @deflectionPoint p.c, p.d, 0.1
        @deflectionPoint p.d, p.a, bd * 0.6
        @handPlaceholder =
            x: (p.c.x() + p.d.x()) / 2
            y: (p.c.y() + p.d.y()) / 2
        return
    applyBodyDensity: (val)->
        @invalidate()
        return val