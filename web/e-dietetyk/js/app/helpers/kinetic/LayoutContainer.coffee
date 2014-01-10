Ext.define 'app.helpers.kinetic.LayoutContainer',
    config:
        width: 100
        height: 100
        x: 0
        y: 0
    constructor: (config)->
        @initConfig config
        @group = new Kinetic.Group()
    addChild: (child)->
        @children.push child
        @group.add child.get()
    addRawChild: (rawChild)->
        child = Ext.create 'app.helpers.kinetic.ShapeWrapper',
            kineticShape: rawChild
        @children.push child
        @group.add child
    get: ->
        @group
    setWidth:(width)->
        @width=width
        