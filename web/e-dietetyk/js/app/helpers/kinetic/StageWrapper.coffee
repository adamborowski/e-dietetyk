Ext.define 'app.helpers.kinetic.StageWrapper',
    alias: 'widget.kineticstage'
    extend: 'Ext.Component'

    _applyListeners: ->
        @on
            scope: @
            resize: (self, width, height)->
                @stage.setWidth width
                @stage.setHeight height
                @stage.draw()
            render: ->
                @stage = new Kinetic.Stage
                    container: @getEl()
                    width: @getWidth()
                    height: @getHeight()
                @mainLayer = @addLayer new Kinetic.Layer()
                @fireEvent 'stageready'
                @stage.draw()
                @initValidation()




    constructor: (config = {})->
        @callParent arguments
        @_applyListeners()
        @layers = []
        window.requestAnimFrame =
            window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimationFrame
        return

    addLayer: ->
        layer = new Kinetic.Layer()
        layerWrapper = Ext.create 'app.helpers.kinetic.LayoutWrapper', {}, layer
        @layers.push layerWrapper
        @stage.add layer

    initValidation: ->
        stage = @stage
        stage.__valid$ = true
        stage.drawImpl = stage.draw
        validate = ->
#            console.log "validation"
            stage.__valid$ = true
            for layer in @layers
                layer.doLayout(stage.getWidth(), stage.getHeight())
            stage.drawImpl()
        stage.draw = ->
#            console.log "draw request", "stage.__valid$", stage.__valid$
            if stage.__valid$
                stage.__valid$ = false
                window.requestAnimationFrame validate, null