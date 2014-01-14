Ext.define 'app.helpers.BodyCalculator',
    singleton: yes
    bodyDensity: (male = yes, age, config)->
        if male == no # kobieta
            X3 = config.biodro + config.triceps + config.udo
            X4 = age
            bd = 1.099421 - (0.0009929 * X3) + (0.0000023 * X3 * X3) - ( 0.0001392 * X4)
            percent = (457 / bd) - 414.2
            return percent / 100
        else
            X3 = config.klatka + config.pepek + config.udo
            X4 = age
            bd = 1.1093800 - (0.0008267 * X3) + (0.0000016 * X3 * X3) - (0.0002574 * X4)
            percent = (457 / bd) - 414.2
            return percent / 100