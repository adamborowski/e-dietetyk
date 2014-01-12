Ext.define 'app.helpers.kinetic.BaseContainerWrapper',
    extend: 'app.helpers.kinetic.BaseWrapper'
    updateLayout: (x, y, w, h)->
        for child in @getChildren()
            child.doLayout w, h # call children to do layout according to new parent dimensions
#do not call parent because it uses x and y
    config:
        children: []
    applyChildren: (children)->
        return (@convertChild child for child in children)
    convertChild: (child)->
        if child instanceof app.helpers.kinetic.BaseWrapper
            return child
        if Ext.isObject child
            if child.wtype?
                wtype = child.wtype
                delete child.wtype
                return Ext.createByAlias "kinetic.wrapper.#{wtype}", child
            else
                throw new Error 'You must provide wtype property for child config'
        throw new Error 'Conversion not supported for this child specification'
    add: (children)->
        configChildren = @getChildren()
        if Ext.isArray children
            convertedChildren = @convertChild child for child in children
            configChildren.push child for child in convertedChildren
            @kineticObject.add child.get() for chid in convertedChildren
            return convertedChildren
        else
            child = children # children is not an array
            convertedChild = @convertChild child
            configChildren.push convertedChild
            @kineticObject.add convertedChild.get()
            return convertedChild

