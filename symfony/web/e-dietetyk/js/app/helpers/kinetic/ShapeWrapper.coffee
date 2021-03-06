Ext.define 'app.helpers.kinetic.ShapeWrapper',
    extend: 'app.helpers.kinetic.BaseWrapper'
    alias: 'kinetic.wrapper.shape'
    updateLayout: (x, y, w, h)->
        #parent will move to the right position
        @callParent arguments
        # now use width / height to stretch the shape
        @kineticObject.setWidth w
        @kineticObject.setHeight h
    constructor: (config, kineticShape = new Kinetic.Shape())->
        @callParent [config, kineticShape]
    