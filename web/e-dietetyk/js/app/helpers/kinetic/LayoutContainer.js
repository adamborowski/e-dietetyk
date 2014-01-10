// Generated by CoffeeScript 1.6.3
(function() {
  Ext.define('app.helpers.kinetic.LayoutContainer', {
    config: {
      width: 100,
      height: 100,
      x: 0,
      y: 0
    },
    constructor: function(config) {
      this.initConfig(config);
      return this.group = new Kinetic.Group();
    },
    addChild: function(child) {
      this.children.push(child);
      return this.group.add(child.get());
    },
    addRawChild: function(rawChild) {
      var child;
      child = Ext.create('app.helpers.kinetic.ShapeWrapper', {
        kineticShape: rawChild
      });
      this.children.push(child);
      return this.group.add(child);
    },
    get: function() {
      return this.group;
    },
    setWidth: function(width) {
      return this.width = width;
    }
  });

}).call(this);

//# sourceMappingURL=LayoutContainer.map
