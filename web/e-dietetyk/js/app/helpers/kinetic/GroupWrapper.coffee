Ext.define 'app.helpers.kinetic.GroupWrapper',
    extend:'app.helpers.kinetic.BaseWrapper'
    updateLayout:(x, y, w, h)->
        @kineticObject.setX x
        @kineticObject.setY y
        @callParent arguments