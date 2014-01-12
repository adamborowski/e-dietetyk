// Generated by CoffeeScript 1.6.3
(function() {
  Ext.define('app.view.human.Head', {
    extend: 'app.helpers.kinetic.ShapeWrapper',
    config: {
      image: null
    },
    constructor: function(config) {
      this.callParent([config, new Kinetic.Image()]);
    },
    updateLayout: function(x, y, w, h) {
      return this.kineticObject.setAttrs({
        x: x,
        y: y,
        width: w,
        height: Math.sqrt(h * 32) + Math.sqrt(w * 15)
      });
    },
    applyImage: function(image, oldImage) {
      if (image !== oldImage) {
        this.kineticObject.setImage(image);
      }
      return image;
    }
  });

}).call(this);

//# sourceMappingURL=Head.map
