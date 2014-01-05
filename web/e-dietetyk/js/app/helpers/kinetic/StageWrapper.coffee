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
                @mainLayer = new Kinetic.Layer()
                @stage.add @mainLayer
                @fireEvent 'stageready'
                @stage.draw()
                @initValidation()




    constructor: (config = {})->
        @callParent arguments
        @_applyListeners()

        window.requestAnimFrame =
            window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimationFrame
        return

    initValidation: ->
        stage = @stage
        stage.__valid$ = true
        stage.drawImpl = stage.draw
        validate = ->
            console.log "validation"
            stage.__valid$ = true
            stage.drawImpl()
        stage.draw = ->
            console.log "draw request", "stage.__valid$", stage.__valid$
            if stage.__valid$
                stage.__valid$ = false
                window.requestAnimationFrame validate, null