Ext.require('Ext.chart.*');
Ext.require('Ext.layout.container.Fit');
var colors = ['#9BCBFB',
'#E7EAEF',
'#9EFFC1',
'#888',
'#999'];

var baseColor = '#156195';

Ext.define('Ext.chart.theme.Uc', {
    extend: 'Ext.chart.theme.Base',

    constructor: function(config) {
        this.callParent([Ext.apply({
            axis: {
                fill: baseColor,
                stroke: baseColor
            },
            axisLabelLeft: {
                fill: baseColor,
                font : 'bold 10px Verdana'
            },
            axisLabelBottom: {
                fill: baseColor,
                font : 'bold 10px Arial'

            },
            axisTitleLeft: {
                fill: baseColor,
                font : 'bold 13px Arial'

            },
            axisTitleBottom: {
                fill: baseColor,
                font : 'bold 13px Arial'
            },
            colors: colors
        }, config)]);
    }
});


Ext.onReady(function () {

    aniosData = new Array();
    
    for(anio_minimo ; anio_minimo <= anio_maximo; anio_minimo++){
        aniosData.push([anio_minimo,anio_minimo])
    }
    var aniosStore = Ext.create('Ext.data.ArrayStore', {
        // store configs
        autoDestroy: true,
        storeId: 'aniosStore',
        // reader configs
        idIndex: 0,
        data: aniosData,
        fields: [
        'name',
        'value'
        ]
    });
    
    var editBtn = new Ext.Button({
        text    : 'Imprimir',
        handler : function(btn){
            filterPanel.collapse(Ext.Component.DIRECTION_TOP);
            window.print();
            filterPanel.expand();
        }
    });
    
    //Contiene los centros
    var centros = Ext.create('Ext.data.Store', {
        fields: ['value', 'name'],
        proxy: {
            type: 'ajax',
            url : '../combos/centros',
            reader: {
                type: 'json'
            }
        }
    });
    centros.load();
    
    //Contiene los trimestres
    var trimestresStore = Ext.create('Ext.data.Store', {
        fields: ['value', 'name'],
        proxy: {
            type: 'ajax',
            url : '../combos/trimestres',
            reader: {
                type: 'json'
            }
        }
    });
    trimestresStore.load(); 
    
    var json_store = Ext.create('Ext.data.Store', {
//        fields: ['tramo','f', 'si', 'no','nf','tr', 'sn','s_n', 'total', 'tn'],
        fields: ['tramo','si', 'no','sn','total'],
        proxy: {
            type: 'ajax',
            url : '../graficos/mortalidad/data',
            reader: {
                type: 'json'
            }
        },
        listeners: {
            beforeload: function(){
            },
            load: function(){
                Ext.getCmp('chart_centro').axes.get('top').setTitle('Totales ' + cmbCentros.getRawValue())
                //console.log(Ext.getCmp('cmbCentros').getRawValue());
                panel1.getEl().unmask();
            }
        }
    });
    
    var cmbAnios = Ext.create('Ext.form.ComboBox', {
        fieldLabel: 'Año',
        width: 300,
        store: 'aniosStore',
        queryMode: 'local',
        displayField: 'name',
        valueField: 'value',
        listeners:{
            'select': selectData
        }
    });
    
   
    var cmbTrimestre = Ext.create('Ext.form.ComboBox', {
        fieldLabel: 'Trimestre',
        width: 300,
        store: trimestresStore,
        queryMode: 'local',
        displayField: 'name',
        valueField: 'value',
        listeners:{
            'select': selectData
        }
    });
    
    var cmbCentros = Ext.create('Ext.form.ComboBox', {
        fieldLabel: 'Centro',
        width: 300,
        store: centros,
        id: 'cmbCentros',
        queryMode: 'local',
        displayField: 'name',
        valueField: 'value',
        listeners:{
            select: selectData,
            afterrender : function(combo){
                combo.setValue(id_centro);//el valor del valueField del combo
            //combo.setRawValue(centro);//el valor del DisplayField del combo
            }
        }
    });
    
    
    var filterPanel = new Ext.Panel({
        bodyPadding: 5,
        width       : 550,
        title       : 'Filtros',
        collapsible : true,
        renderTo    : 'panel',
        items : [
        cmbAnios,
        cmbTrimestre,
        cmbCentros,
        editBtn
        ]
    });
    
    var panel1 = Ext.create('widget.panel', {
        width: 550,
        height: 400,
        title: false,
        id: 'panel_chart',
        renderTo: Ext.getBody(),
        layout: 'fit',
        items: {
            xtype: 'chart',
            id: 'chart_centro',
            theme : 'Uc',
            animate: false,
            shadow: false,
            store: json_store,
            legend: true,
            listeners:{
                afterrender: selectData
            },
            axes: [{
                type: 'Numeric',
                position: 'left',
                fields: ['si', 'no'],
                width: 70,
                title: 'Porcentaje Ni\u00f1os',
                grid: true,
                label: {
                    renderer: function(v) {
                        return v+'%';
                    }
                },
                roundToDecimal: true
            }, {
                type: 'Category',
                position: 'bottom',
                grid: true,
                fields: ['tramo'],
                title: 'Rangos de peso'
            }, {
                type: 'Category',
                position: 'top',
                grid: false,
                fields: ['total'],
                title: 'Totales '+centro
            }],
            series: [{
                type: 'column',
                axis: 'top',
                highlight: false,
                gutter: 60,
                xField: 'tramo',
                yField: ['si', 'no', 'sn'],
                stacked: true,
                tips: {
                    trackMouse: true,
                    width: 115,
                    height: 28,
                    renderer: function(storeItem, item) {
                        this.setTitle(''+item.value[0].replace('\n', '-')+': '+item.value[1]+ '% ');
                    }
                },
                label: {
                    display: 'middle',
                    'text-anchor': 'middle',
                    //'style': 'font-weight: bold',
                    field: ['si', 'no', 'sn'],
                    renderer: function(v) {
                        return (v < 10 || v == 0 ||typeof v === 'undefined')?'':v+'%';
                    },
                    font: 'bold 9px Arial',
                    orientation: 'vertical',
                    fill: baseColor
                }
            }]
        }
    });
    
    function selectData(combo,  records,  eOpts){
        //Ext.getCmp('chart_centro').axes.get('top').setTitle('Totales ' + cmbCentros.getRawValue())
        Ext.getCmp('panel_chart').getEl().mask('Cargando...');
        json_store.load({
            params:{
                id_centro: cmbCentros.getValue(),
                id_trimestre: cmbTrimestre.getValue(),
                anio: cmbAnios.getValue()
            }
        });
    }
    
    

    //Creando el objeto Ext.grid.GridPanel
   /* var grid = new Ext.grid.GridPanel({
        title:'Detalle',
        store: json_store,
        //renderTo: 'frame',
        columns: [
        {
            id:'tramo',
            header: "Rango de peso (g.)", 
            width: 110, 
            sortable: true, 
            dataIndex: 'tramo',
            cls:'blue'
        },

        {
            header: "F", 
            width: 35, 
            sortable: true, 
            dataIndex: 'f'
        },

        {
            header: "%F", 
            width: 35, 
            sortable: true, 
            dataIndex: 'si'
        },

        {
            header: "NF", 
            width: 35, 
            sortable: true, 
            dataIndex: 'nf'
        },

        {
            header: "%NF", 
            width: 35, 
            sortable: true, 
            //renderer: Ext.util.Format.dateRenderer('m/d/Y'), 
            dataIndex: 'no'
        },
        {
            header: "Total reg.", 
            width: 60, 
            sortable: true, 
            dataIndex: 'tr'
        },
        {
            header: "S/I", 
            width: 35, 
            sortable: true, 
            dataIndex: 's_n'
        },
        {
            header: "%S/I", 
            width: 35, 
            sortable: true, 
            dataIndex: 'sn'
        },
        {
            header: "Total Niños", 
            fill:true ,
            dataIndex: 'tn'
        }
        ],
        stripeRows: false,
        height:300,
        width:550        
    });*/


    
});
