// Generated by CoffeeScript 1.6.3
(function() {
  Ext.application({
    requires: ['Ext.container.Viewport', 'app.view.HumanView'],
    name: 'app',
    appFolder: 'e-dietetyk/js/app',
    launch: function() {
      return Ext.create('Ext.container.Viewport', {
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
                xtype: 'label',
                html: 'human body renderer'
              }, Ext.create('app.view.HumanView', {
                flex: 1,
                style: 'border: 1px solid #445555',
                margin: 10
              })
            ]
          }
        ]
      });
    }
  });

}).call(this);

//# sourceMappingURL=app.map
