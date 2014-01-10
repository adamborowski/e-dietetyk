Ext.define 'app.helpers.kinetic.LayoutHelper',
    config:
        points: {}
        margin: 0
    calculateBounds: ->
        return
    constructor: (config)->
        return
    setSize: (width, height)->
        @currentWidth = width
        @currentHeight = height
    absX: (relativeX)->
        relativeX * @currentWidth
    absY: (relativeY)->
        relativeY * @currentHeight