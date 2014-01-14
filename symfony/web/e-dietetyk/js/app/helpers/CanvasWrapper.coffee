Ext.define 'app.helpers.CanvasWrapper',
    extend: 'Ext.Component'

    _applyListeners: ->
        @on
            scope: @
            resize: (self, width, height)->
                @canvas.width = width
                @canvas.height = height
                @render(width, height)
            render: ->
                @getEl().appendChild @canvas
                @render(@getWidth(), @getHeight())
            @canvas = Ext.DomHelper.createDom
                tag: 'canvas'


    constructor: (config = {})->
        @callParent arguments
        @_applyListeners()
        return
    render: -> # overridable handler for render event
        return
    getCanvas: ->
        @canvas