Ext.define 'app.view.human.Hand',
    extend: 'app.helpers.kinetic.ComponentWrapper'
    config:
        points:
            a: [0, 0]
            b: [0.5, 0.5]
            c: [-1.5, 4.8]
            d: [-2.4, 5]
        bodyDensity: 0.05
    drawFunction: (ctx, width, height)->
        p = @getPoints()
        ctx._context.arc(0, 0, width, 0, 2 * Math.PI, false)
        return
    applyBodyDensity: (val)->
        @invalidate()
        return val