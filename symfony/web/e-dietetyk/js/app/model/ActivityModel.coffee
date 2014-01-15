Ext.define "app.model.ActivityModel",
    extend: "Ext.data.Model"
    fields: [
        {
            name: "type" # część nazwy pliku obrazka
            type: "string"
        }
        {
            name: "name"
            type: "string"
        }
        {
            name:'dayPart' # przed śniadaniem, po śniadaniu, przed obiadem, po obiedzie, przed kolacją, po kolacji
            type:'string'
        }
        {
            name:'weekDay' # dzień tygodnia, będzie sortowanie i grupowanie (grouper)
            type:'string'
        }
        {
            name:'duration' # ilość godzin
            type:'number'
        }
    ]
