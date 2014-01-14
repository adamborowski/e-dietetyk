Ext.define 'app.view.human.Breast',
    extend: 'app.helpers.kinetic.ComponentWrapper'
    config:
        bodyDensity: 0.5
        age: 1
        female: no
        autoClose: no
        initialAttrs:
            strokeWidth: 1.54
            fill: 'transparent'
            stroke: '#066A00'
            strokeEnabled: yes
            strokeScaleEnabled: yes
    drawFunction: (ctx, width, height)->
        female = @getFemale()
        bd = @getBodyDensity()
        if female
            bd *= 0.7
            bd += 0.2
        else
            bd *= 0.3
            bd += 0.05


        if female
            xa = 0
            xb = 0.25 - bd  - @getAge() / 50 / 3
            xc = 0.75 + bd * 0.5
            xd = 1
            ya = 1 / 3
            yb = 1 / 3 + bd + @getAge() / 50 / 3
            yc = 1 / 3 + bd + @getAge() / 50 / 3
            yd = 1 / 3 + bd * 0.3
        else
            xa = 0
            xb = 0.25
            xc = 0.75
            xd = 1
            ya = 1 / 3
            yb = 1 / 3 + bd
            yc = 1 / 3 + bd
            yd = 1 / 3

        @currentContext.moveTo @normalizeX(xa), @normalizeY(ya)
        @bezier3Relative xb, yb, xc, yc, xd, yd

        return
    applyBodyDensity: (val)->
        @invalidate()
        return val