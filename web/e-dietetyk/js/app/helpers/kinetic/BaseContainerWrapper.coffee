Ext.define 'app.helpers.kinetic.BaseContainerWrapper',
    extend: 'app.helpers.kinetic.BaseWrapper'
    updateLayout: (x, y, w, h)->
        for child in @getChildren()
            child.doLayout w, h # call children to do layout according to new parent dimensions
    config:
        children: []
    applyChildren: (children)->
        return (@convertChild child for child in children)
    convertChild: (child)->
        return child
    add: (children)->
        configChildren = @getChildren()
        if Ext.isArray children
            convertedChildren = @convertChild child for child in children
            configChildren.push child for child in convertedChildren
            return convertedChildren
        else
            child = children # children is not an array
            convertedChild = @convertChild child
            configChildren.push converterChild
            return convertedChild

