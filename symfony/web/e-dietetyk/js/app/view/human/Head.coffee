Ext.define 'app.view.human.Head',
    extend: 'app.helpers.kinetic.ShapeWrapper'
    config:
        image: null
    constructor: (config)->
        @callParent [config, new Kinetic.Image()]
        return
    updateLayout: (x, y, w, h)->
        @kineticObject.setAttrs
            x: x
            y: y
            width: w
            height: Math.sqrt(h * 32)+Math.sqrt(w * 15)
    applyImage: (image, oldImage)->
        @kineticObject.setImage image if image isnt oldImage
        return image