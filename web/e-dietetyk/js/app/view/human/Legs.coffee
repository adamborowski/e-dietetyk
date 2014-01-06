Ext.define 'app.view.human.Legs',
    extend: 'app.helpers.kinetic.ShapeWrapper'
    config:
        points:
            a: [-3, 0]
            b: [3, 0]
            c: [2, 12]
            d: [0.5, 12]
            e: [0, 3]
            f: [-.5, 12]
            g: [-2, 12]
        bodyDensity: 0.5
    drawFunction: (ctx, width, height)->
        p = @getPoints()
        @currentContext.moveTo p.b.x(), p.b.y()
        bd=@getBodyDensity()+0.1
        @deflectionPoint p.b, p.c, bd
        @deflectionPoint p.c, p.d, -0.1
        @deflectionPoint p.d, p.e, bd
        @deflectionPoint p.e, p.f, bd
        @deflectionPoint p.f, p.g, -0.1
        @deflectionPoint p.g, p.a, bd
        @deflectionPoint p.a, p.b, 0.1


        return
    applyBodyDensity: (val)->
        @invalidate()
        return val