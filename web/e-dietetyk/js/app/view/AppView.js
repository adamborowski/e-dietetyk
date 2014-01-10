// Generated by CoffeeScript 1.6.3
(function() {
  Ext.define('app.view.AppView', {
    extend: 'Ext.container.Viewport',
    requires: ['app.view.HumanView', 'app.helpers.kinetic.StageWrapper', 'app.helpers.kinetic.ShapeWrapper', 'app.view.human.Corps', 'app.view.human.Legs', 'app.view.human.Arm', 'app.view.human.Hand', 'app.view.human.Head'],
    constructor: function(config) {
      var body, mainLayer, me;
      Ext.applyIf(config, {
        layout: 'fit',
        items: [
          {
            xtype: 'panel',
            title: 'Users',
            layout: {
              type: 'vbox',
              align: 'stretch',
              pack: 'stretch'
            },
            items: [
              {
                flex: 2,
                xtype: 'kineticstage',
                itemId: 'stage',
                style: 'border: 1px solid #5fae32',
                margin: 10
              }, {
                xtype: 'form',
                defaults: {
                  margin: 20
                },
                items: [
                  {
                    xtype: 'slider',
                    itemId: 'weightInput',
                    fieldLabel: 'waga [kg]',
                    minValue: 30,
                    maxValue: 200,
                    width: 400,
                    listeners: {
                      change: {
                        fn: this.updateHander,
                        scope: this
                      }
                    }
                  }, {
                    xtype: 'slider',
                    itemId: 'heightInput',
                    fieldLabel: 'wzrost [cm]',
                    minValue: 140,
                    maxValue: 220,
                    width: 400,
                    listeners: {
                      change: {
                        fn: this.updateHander,
                        scope: this
                      }
                    }
                  }
                ]
              }
            ]
          }
        ]
      });
      this.callParent(arguments);
      mainLayer = this.down('#stage').mainLayer;
      this.body = body = Ext.create('app.view.human.Corps', {
        initialAttrs: {
          fill: 'green',
          x: 0,
          y: 0,
          width: 305,
          height: 210,
          strokeEnabled: false
        }
      });
      this.legs = Ext.create('app.view.human.Legs', {
        initialAttrs: {
          fill: 'orange',
          stroke: 'grey',
          x: 0,
          y: 85,
          width: 250,
          height: 300,
          strokeEnabled: false
        }
      });
      this.leftArm = Ext.create('app.view.human.Arm', {
        initialAttrs: {
          fill: 'gray',
          x: -105,
          y: -50,
          width: 90,
          height: 240,
          strokeEnabled: false
        }
      });
      this.rightArm = Ext.create('app.view.human.Arm', {
        initialAttrs: {
          fill: 'gray',
          x: 105,
          y: -50,
          scaleX: -1,
          width: 90,
          height: 240,
          strokeEnabled: false
        }
      });
      this.leftHand = Ext.create('app.view.human.Hand', {
        initialAttrs: {
          fill: 'yellow',
          x: 105,
          y: -50,
          width: 13,
          height: 13,
          strokeEnabled: false
        }
      });
      this.rightHand = Ext.create('app.view.human.Hand', {
        initialAttrs: {
          fill: 'yellow',
          x: 105,
          y: -50,
          width: 13,
          height: 13,
          strokeEnabled: false
        }
      });
      this.head = Ext.create('app.view.human.Head', {
        initialAttrs: {
          fill: '#ECCAB9',
          x: 0,
          y: -140,
          width: 90,
          height: 90,
          strokeEnabled: false
        }
      });
      this.group = new Kinetic.Group({
        x: 500,
        y: 300,
        width: 200,
        height: 500
      });
      mainLayer.add(this.group);
      this.group.add(this.head.get());
      this.group.add(this.legs.get());
      this.group.add(this.leftHand.get());
      this.group.add(this.rightHand.get());
      this.group.add(this.leftArm.get());
      this.group.add(this.rightArm.get());
      this.group.add(this.body.get());
      me = this;
      window.requestAnimationFrame(function() {
        return me.updateHander();
      });
    },
    updateHander: function() {
      this.body.setBodyDensity((this.down('#weightInput').getValue() - 70) / -400);
      this.legs.setBodyDensity((this.down('#weightInput').getValue() - 70) / -400);
      this.leftArm.setBodyDensity((this.down('#weightInput').getValue() - 70) / -400);
      this.leftHand.get().setX(this.leftArm.handPlaceholder.x + this.leftArm.get().getX());
      this.leftHand.get().setY(this.leftArm.handPlaceholder.y + this.leftArm.get().getY());
      this.rightHand.get().setX(-this.rightArm.handPlaceholder.x + this.rightArm.get().getX());
      this.rightHand.get().setY(this.rightArm.handPlaceholder.y + this.rightArm.get().getY());
      return this.group.setAttrs({
        scaleX: Math.sqrt(this.down('#weightInput').getValue() / 200),
        scaleY: this.down('#heightInput').getValue() / 200
      });
    }
  });

}).call(this);

//# sourceMappingURL=AppView.map