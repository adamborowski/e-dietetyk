// Generated by CoffeeScript 1.6.3
(function() {
  Ext.define('app.view.human.Corps', {
    extend: 'app.helpers.kinetic.ShapeWrapper',
    config: {
      points: {
        a: [-2, -1],
        b: [2, -1],
        c: [3, 2],
        d: [-3, 2]
      },
      bodyDensity: 0.05
    },
    drawFunction: function(ctx, width, height) {
      var p;
      p = this.getPoints();
      ctx.moveTo(p.a.x(), p.a.y());
      this.deflection(p.a.x(), p.a.y(), p.b.x(), p.b.y(), -this.getBodyDensity() + 0.2);
      this.deflection(p.b.x(), p.b.y(), p.c.x(), p.c.y(), this.getBodyDensity());
      this.deflection(p.c.x(), p.c.y(), p.d.x(), p.d.y(), this.getBodyDensity());
      this.deflection(p.d.x(), p.d.y(), p.a.x(), p.a.y(), this.getBodyDensity());
    },
    applyBodyDensity: function(val) {
      this.invalidate();
      return val;
    }
  });

}).call(this);

//# sourceMappingURL=Corps.map