Ext.define 'app.view.HumanView',
    extend: 'app.helpers.CanvasWrapper'
    config:
        values:
            isMale: yes
            age: 22
            minAge: 10
            maxAge: 80
            weight: 80
            minWeight: 30
            maxWeight: 200
            height: 175
            minHeight: 0
            maxHeight: 220
            waistline: 80
            minWaistLine: 50
            maxWaistLine: 140
            hipSize: 88
            minHipSize: 50
            maxHipSize: 130
        drawing:
            corps:
                fill: "#444444"
                strokeWidth: 8
                strokeStyle: "#666666"
                lineJoin: 'round'
                lineCap: 'round'
                minHeight: 70
                maxHeight: 270
                maxWidth: 100
                armNarrow: 53
                maxSpace: 100
                maxBottomNarrow: 40

    constructor: (config = {})->
        @callParent arguments
        @cx = @canvas.getContext('2d')
        @params =
            symmetryLine: null
            corps:
                A: null
                B: null
                C: null
                D: null
                E: null
                F: null
                G: null
                H: null
                I: null
                J: null
                K: null
                L: null

        return
    normalize: (name, newMin = null, newMax = null)->
        values = @getValues()
        val = values[name]
        maxVal = values['max' + name.charAt(0).toUpperCase() + name.slice(1)]
        minVal = values['min' + name.charAt(0).toUpperCase() + name.slice(1)]
        if newMax?
            return (val - minVal) / (maxVal - minVal) * (newMax - newMin) + newMin
        return (val - minVal) / (maxVal - minVal)


    calculateParams: ->
        dr = @getDrawing()
        symLine = @params.symmetryLine = 0
        weightRatio = @normalize 'weight'

        # corps
        leftSpaceLine = symLine - weightRatio * dr.corps.maxSpace - 30
        rightSpaceLine = symLine + weightRatio * dr.corps.maxSpace + 30
        leftBound = symLine - 90
        rightBound = symLine + 90
        topBound = 0 - dr.corps.maxHeight / 2
        bottomBound = 0 + dr.corps.maxHeight / 2
        dynamicNarrow = weightRatio * dr.corps.maxBottomNarrow
        #------------------------
        @params.corps.A = {x: leftBound + dynamicNarrow / 2, y: bottomBound}
        @params.corps.B = {x: leftBound + dr.corps.armNarrow, y: topBound}
        @params.corps.C = {x: rightBound - dr.corps.armNarrow, y: topBound}
        @params.corps.D = {x: rightBound - dynamicNarrow / 2, y: bottomBound}
        @params.corps.E = {x: leftSpaceLine, y: 0}
        @params.corps.F = {x: rightSpaceLine, y: 0}
        @params.corps.G = {x: leftSpaceLine + dynamicNarrow, y: bottomBound}
        @params.corps.H = {x: leftSpaceLine, y: topBound}
        @params.corps.I = {x: rightSpaceLine, y: topBound}
        @params.corps.J = {x: rightSpaceLine - dynamicNarrow, y: bottomBound}
        @params.corps.K = {x: symLine, y: topBound + 20}
        @params.corps.L = {x: symLine, y: bottomBound - 20}

    bezier: (pa, pb)->
        @cx.save()
        @cx.quadraticCurveTo pa.x, pa.y, pb.x, pb.y
        @cx.lineStyle = 'black'
        @cx.fillStyle = 'white'
        @cx.lineWidth = 1
        @cx.fillRect(pa.x - 2, pa.y - 2, 4, 4);
        @cx.strokeRect(pa.x - 2, pa.y - 2, 4, 4);
        @cx.restore()

    bezier4: (pax, pay, pbx, pby)->
        @bezier {x: pax, y: pay}, {x: pbx, y: pby}

    render: (w = @getWidth(), h = @getHeight()) ->
        @w = w
        @h = h
        @calculateParams()
        @cx.save()
        @cx.clearRect 0, 0, w, h
        @cx.translate @w / 2, @h / 2
        @renderHand()
        @renderCorps()
        @cx.restore()

    renderCorps: ->
        @cx.save()
        pc = @params.corps
        dr = @getDrawing()
        @cx.fillStyle = dr.corps.fill
        @cx.lineStyle = dr.corps.strokeStyle
        @cx.lineWidth = dr.corps.strokeWidth
        @cx.lineJoin = dr.corps.lineJoin
        @cx.lineCap = dr.corps.lineCap

        heightRatio = @normalize 'height'
        @cx.save()
        @cx.scale(1, heightRatio)
        @cx.beginPath()

        @cx.moveTo pc.A.x, pc.A.y

        @bezier pc.E, pc.B
        @bezier pc.K, pc.C
        @bezier pc.F, pc.D
        @bezier pc.L, pc.A
        @cx.fill()
        @cx.restore()
        @cx.stroke()
        @cx.restore()
    renderHand: ->
        @cx.save()
        @cx.fillStyle = 'green'
        @cx.translate @params.corps.B.x, @params.corps.B.y
        @cx.rotate Math.PI * 1 / 4
        p1 = 20
        p2 = 130
        @cx.beginPath()
        @cx.moveTo -p1, 0
        @bezier4 -p1, p2, 0, p2
        @bezier4 p1, p2, p1, 0
        @cx.closePath()
        @cx.fill()
        @cx.stroke()
        @cx.restore()