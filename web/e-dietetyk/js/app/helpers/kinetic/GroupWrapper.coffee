Ext.define 'app.helpers.kinetic.GroupWrapper',
    extend:'app.helpers.kinetic.BaseWrapper'
    updateLayout:(x, y, w, h)->
        # we added ability to set x and y using kinetic object attrs
        @kineticObject.setX x
        @kineticObject.setY y
        @callParent arguments