// Generated by CoffeeScript 1.6.3
(function() {
  Ext.define('app.helpers.kinetic.StageWrapper', {
    alias: 'widget.kineticstage',
    extend: 'Ext.Component',
    cls: 'kinetic-stage',
    _applyListeners: function() {
      return this.on({
        scope: this,
        resize: function(self, width, height) {
          this.stage.setWidth(width);
          this.stage.setHeight(height);
          return this.stage.draw();
        },
        render: function() {
          this.stage = new Kinetic.Stage({
            container: this.getEl(),
            width: this.getWidth(),
            height: this.getHeight()
          });
          this.mainLayer = this.addLayer(new Kinetic.Layer());
          this.fireEvent('stageready');
          this.stage.draw();
          return this.initValidation();
        }
      });
    },
    constructor: function(config) {
      if (config == null) {
        config = {};
      }
      this.callParent(arguments);
      this._applyListeners();
      this.layers = [];
      window.requestAnimFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame;
    },
    addLayer: function() {
      var layer, layerWrapper;
      layer = new Kinetic.Layer();
      layerWrapper = Ext.create('app.helpers.kinetic.LayerWrapper', {}, layer);
      this.layers.push(layerWrapper);
      this.stage.add(layer);
      layerWrapper.invalidate();
      return layerWrapper;
    },
    initValidation: function() {
      var me, stage, validate;
      stage = this.stage;
      stage.__valid$ = true;
      stage.drawImpl = stage.draw;
      me = this;
      validate = function() {
        var layer, _i, _len, _ref;
        stage.__valid$ = true;
        _ref = me.layers;
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          layer = _ref[_i];
          layer.doLayout(stage.getWidth(), stage.getHeight());
        }
        return stage.drawImpl();
      };
      return stage.draw = function() {
        if (stage.__valid$) {
          stage.__valid$ = false;
          return window.requestAnimationFrame(validate, null);
        }
      };
    }
  });

}).call(this);

//# sourceMappingURL=StageWrapper.map
