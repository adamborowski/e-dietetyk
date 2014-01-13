Ext.define 'app.view.human.Corps',
    extend: 'app.helpers.kinetic.ComponentWrapper'
    config:
        points:
            a: [-2 / 6, 0]
            b: [2 / 6, 0]
            c: [3 / 6, 1]
            d: [-3 / 6, 1]
        bodyDensity: 0.05
        centerX: 0.5
    drawFunction: (ctx, width, height)->
        p = @getPoints()
        ctx.moveTo p.a.x(), p.a.y()
        bd = @getBodyDensity() - 0.3
        @deflection p.a.x(), p.a.y(), p.b.x(), p.b.y(), bd*2
        @deflection p.b.x(), p.b.y(), p.c.x(), p.c.y(), -bd
        @deflection p.c.x(), p.c.y(), p.d.x(), p.d.y(), -bd
        @deflection p.d.x(), p.d.y(), p.a.x(), p.a.y(), -bd
        return
    applyBodyDensity: (val)->
        @invalidate()
        return val