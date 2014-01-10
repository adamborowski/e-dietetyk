Ext.define 'app.helpers.kinetic.BaseWrapper',
    config:
    # layoutConfig is used to compute layout parameters dependents from parent layout
        layoutX: 0 #0...1 or absolute
        layoutY: 0 #0...1 or absolute
        layoutWidth: 1 #0...1 or absolute
        layoutHeight: 1 #0...1 or absolute
        relativeX: yes #whether or not track layoutX as absolute or positive
        relativeY: yes #whether or not track layoutY as absolute or positive
        relativeWidth: yes #whether or not track layoutWidth as absolute or positive
        relativeHeight: yes #whether or not track layoutHeight as absolute or positive
        layoutMargin: # extra margin when doLayout()
            top: 0
            right: 0
            bottom: 0
            left: 0
        initialAttrs: {} # initial kinetic shape attributes
    doLayout: (parentWidth, parentHeight)->
        # !!! final !!!
        layoutX = @getLayoutX()
        layoutY = @getLayoutY()
        layoutWidth = @getLayoutWidth()
        layoutHeight = @getLayoutHeight()
        layoutX *= parentWidth if @getRelativeX()
        layoutY *= parentHeight if @getRelativeY()
        layoutWidth *= parentWidth if @getRelativeWidth()
        layoutHeight *= parentHeight if @getRelativeHeight()
        margin = @getMargin() # this is absolute margin
        layoutX += margin.left
        layoutY += margin.top
        layoutWidth -= (margin.left + margin.right)
        layoutHeight -= (margin.top + margin.bottom)
        @updateLayout layoutX, layoutY, layoutWidth, layoutHeight
        return
    updateLayout: (x, y, width, height)->
        # !!! overridable !!!
        # this methods maps calculated params to achieve desired effect
        # for example:
        # - shape wrapper uses {x, y, scaleX, scaleY} attrs of kinetic object
        # - component wrapper uses {x, y} attrs of kinetic objects but its getPoint() method uses width and height to scale given points of drawn shape
        # - group wrapper calls doLayut of its children
        # every object uses translate to map x and y
        @kineticObject.setX x
        @kineticObject.setY y
        return
    applyMargin: (margin)->
        if Ext.isString margin
            margin = margin.split ' '
            if margin.length == 4
                return{
                top: margin[0]
                right: margin[1]
                bottom: margin[2]
                left: margin[3]
                }
            else if margin.length == 2
                return {
                top: margin[0]
                right: margin[1]
                bottom: margin[0]
                left: margin[1]
                }
        if Ext.isNumber margin
            return {
            top: margin
            right: margin
            bottom: margin
            left: margin
            }
        margin.left = 0 unless margin.left?
        margin.top = 0 unless margin.top?
        margin.bottom = 0 unless margin.bottom?
        margin.right = 0 unless margin.right?
        return margin
    constructor: (config, kineticObject = null)->
        @kineticObject = kineticObject
        @initConfig config