// Generated by CoffeeScript 1.6.3
(function() {
  Ext.define('app.helpers.kinetic.BaseWrapper', {
    alias: 'kinetic.wrapper.base',
    config: {
      layoutX: 0,
      layoutY: 0,
      layoutWidth: 1,
      layoutHeight: 1,
      relativeX: true,
      relativeY: true,
      relativeWidth: true,
      relativeHeight: true,
      margin: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
      initialAttrs: {
        fill: "#00D2FF",
        stroke: "black",
        strokeWidth: 4,
        width: 100,
        height: 100,
        strokeScaleEnabled: false,
        strokeEnabled: false
      }
    },
    doLayout: function(parentWidth, parentHeight) {
      var layoutHeight, layoutWidth, layoutX, layoutY, margin;
      layoutX = this.getLayoutX();
      layoutY = this.getLayoutY();
      layoutWidth = this.getLayoutWidth();
      layoutHeight = this.getLayoutHeight();
      if (this.getRelativeX()) {
        layoutX *= parentWidth;
      }
      if (this.getRelativeY()) {
        layoutY *= parentHeight;
      }
      if (this.getRelativeWidth()) {
        layoutWidth *= parentWidth;
      }
      if (this.getRelativeHeight()) {
        layoutHeight *= parentHeight;
      }
      margin = this.getMargin();
      layoutX += margin.left;
      layoutY += margin.top;
      layoutWidth -= margin.left + margin.right;
      layoutHeight -= margin.top + margin.bottom;
      this.updateLayout(layoutX, layoutY, layoutWidth, layoutHeight);
    },
    updateLayout: function(x, y, width, height) {
      this.kineticObject.setX(x);
      this.kineticObject.setY(y);
    },
    applyMargin: function(margin) {
      if (Ext.isString(margin)) {
        margin = margin.split(' ');
        if (margin.length === 4) {
          return {
            top: margin[0],
            right: margin[1],
            bottom: margin[2],
            left: margin[3]
          };
        } else if (margin.length === 2) {
          return {
            top: margin[0],
            right: margin[1],
            bottom: margin[0],
            left: margin[1]
          };
        }
      }
      if (Ext.isNumber(margin)) {
        return {
          top: margin,
          right: margin,
          bottom: margin,
          left: margin
        };
      }
      if (margin.left == null) {
        margin.left = 0;
      }
      if (margin.top == null) {
        margin.top = 0;
      }
      if (margin.bottom == null) {
        margin.bottom = 0;
      }
      if (margin.right == null) {
        margin.right = 0;
      }
      return margin;
    },
    invalidate: function() {
      if ((this.kineticObject != null) && (this.kineticObject.getStage() != null)) {
        return this.kineticObject.getStage().draw();
      }
    },
    constructor: function(config, kineticObject) {
      if (kineticObject == null) {
        kineticObject = null;
      }
      this.kineticObject = kineticObject;
      this.initConfig(config);
      this.kineticObject.setAttrs(this.getInitialAttrs());
    },
    get: function() {
      return this.kineticObject;
    }
  });

}).call(this);

//# sourceMappingURL=BaseWrapper.map
