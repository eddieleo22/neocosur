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
                stroke: baseColor,
                'stroke-width': 1
            },
            series: [
            {
                'stroke-width': 1
            },{
                'stroke-width': 2
            }
            ],
            axisLabelLeft: {
                fill: baseColor,
                font : '9px Verdana',
                x: 45
            },
            axisLabelBottom: {
                //                fill: baseColor,
                fill: '#03449a',
                font : "8px Arial"
            },
            axisLabelTop: {
                fill: '#999999',
                font : 'italic 10px Arial'
            },
            axisTitleLeft: {
                fill: baseColor,
                font : 'bold 12px Arial',
                y:18 
            },
            axisTitleBottom: {
                fill: baseColor,
                font : "bold 12px Arial",
                y: 10
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
        icon: '../images/print.png',
        handler : function(btn){
            //filterPanel.collapse(Ext.Component.DIRECTION_TOP);
            filterPanel.hide();
            window.print();
            filterPanel.show();
        //            filterPanel.expand();
        }
    });
    var morbilidadBtn = new Ext.Button({
        text    : 'Mortalidad',
        icon: '../images/grafico.png',
        handler : function(btn){
            window.location = 'mortalidad';
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
        fields: ['tramo', 'f','si', 'no','nf', 'tr','sn', 's_n', 'total', 'tn'],
        proxy: {
            type: 'ajax',
            url : '../graficos/condicion/data',
            reader: {
                type: 'json'
            }
        },
        listeners: {
            beforeload: function(){
            },
            load: function(){
                Ext.getCmp('panel_chart').setTitle('Totales ' + cmbCentros.getRawValue())
                Ext.getCmp('chart_centro').surface.add({
                    type: 'circle',
                    fill: '#79BB3F',
                    radius: 100,
                    id: 'circulo',
                    x: 100,
                    y: 100
                });
                //Ext.getCmp('chart_centro').axes.get('top').setTitle('Totales ' + cmbCentros.getRawValue())
                //console.log(Ext.getCmp('cmbCentros').getRawValue());
                panel1.getEl().unmask();
            }
        }
    });
    
    
    var json_store_total = Ext.create('Ext.data.Store', {
        fields: ['tramo', 'f','si', 'no','nf', 'tr','sn', 's_n', 'total', 'tn'],
        proxy: {
            type: 'ajax',
            url : '../graficos/condicion/data',
            reader: {
                type: 'json'
            }
        },
        listeners: {
            beforeload: function(){
            },
            load: function(){
            //Ext.getCmp('total_chart').setTitle('Totales ' + cmbCentros.getRawValue())
            //Ext.getCmp('chart_centro').axes.get('top').setTitle('Totales ' + cmbCentros.getRawValue())
            //console.log(Ext.getCmp('cmbCentros').getRawValue());
            //panel_total.getEl().unmask();
            }
        }
    });
    
    var cmbAnios = Ext.create('Ext.form.ComboBox', {
        fieldLabel: 'Año',
        labelWidth: 30,
        width: 140,
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
        labelWidth: 55,
        width: 195,        
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
        labelWidth: 40,
        width: 260,
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
        width       : 920,
        title       : 'Estadisticas de morbilidad',
        collapsible : true,
        layout: {
            type: 'table',
            columns: 5,
            tableAttrs: {
                cellpading: 5,
                style: {
                    width: '100%'
                }
            }
        }, 
        renderTo    : 'combo',
        items : [
        cmbAnios,
        cmbTrimestre,
        cmbCentros,
        editBtn,
        morbilidadBtn
        ]
    });
    
    //    json_store.load({
    //        params:{
    //            id_centro: id_centro
    //        }
    //    });
    
    var panel1 = Ext.create('widget.panel', {
        width: 454,
        height: 352,
        title: false,
        border: false,
        id: 'panel_chart',
        renderTo: 'panel',
        layout:'absolute',
        cls: 'center',
        items: {
            layout:'absolute',
            xtype: 'chart',
            id: 'chart_centro',
            theme : 'Uc',
            animate: false,
            shadow: false,
            store: json_store,
            legend: false,
            x: -28,
            width: 484,
            height: 314,
            items: [{
                type: 'text',
                text: 'Cantidad',
                fill: '#999999',
                font: 'italic 10px Arial',
                y: 6,
                x:31
            },{
                type: 'text',
                text: 'niños P.',
                fill: '#999999',
                font: 'italic 10px Arial',
                y: 16,
                x:31
            },
            {
                type: 'rect',
                x: 76,
                y: 260,
                height : 40,
                width: 400,
                fill: '#eaeaea'
            }],
            listeners:{
                afterrender: selectData
            },
            axes: [{
                type: 'Numeric',
                position: 'left',
                fields: ['si', 'no'],

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
                grid: false,
                fields: ['tramo'],
                title: 'Condición'
            } ,{
                type: 'Category',
                position: 'top',
                grid: false,
                fields: ['total']
            }
            ],
            series: [{
                type: 'column',
                axis: 'top',
                highlight: false,
                gutter: 60,
                xField: 'tramo',
                yField: ['si', 'no', 'sn'],
                stacked: true,
                //                tips: {
                //                    trackMouse: true,
                //                    width: 115,
                //                    height: 28,
                //                    renderer: function(storeItem, item) {
                //                        this.setTitle(''+item.value[0].replace('\n', '-')+': '+item.value[1]+ '% ');
                //                    }
                //                },
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
    
    var panel_total = Ext.create('widget.panel', {
        width: 454,
        height: 352,
        title: 'Totales Neocosur',
        border: false,
        id: 'total_chart',
        renderTo: 'panel_total',
        layout:'absolute',
        cls: 'center',
        items: {
            layout:'absolute',
            xtype: 'chart',
            id: 'chart_centro',
            theme : 'Uc',
            animate: false,
            shadow: false,
            store: json_store_total,
            legend: false,
            x: -28,
            width: 484,
            height: 314,
            items: [{
                type: 'text',
                text: 'Cantidad',
                fill: '#999999',
                font: 'italic 10px Arial',
                y: 6,
                x:31
            },{
                type: 'text',
                text: 'niños P.',
                fill: '#999999',
                font: 'italic 10px Arial',
                y: 16,
                x:31
            },
            {
                type: 'rect',
                x: 76,
                y: 260,
                height : 40,
                width: 400,
                fill: '#eaeaea'
            }],
            listeners:{
                afterrender: selectData
            },
            axes: [{
                type: 'Numeric',
                position: 'left',
                fields: ['si', 'no'],

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
                grid: false,
                fields: ['tramo'],
                title: 'Condición'
            } ,{
                type: 'Category',
                position: 'top',
                grid: false,
                fields: ['total']
            }
            ],
            series: [{
                type: 'column',
                axis: 'top',
                highlight: false,
                gutter: 60,
                xField: 'tramo',
                yField: ['si', 'no', 'sn'],
                stacked: true,
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
    
    Ext.create('Ext.draw.Component', {
        renderTo: Ext.get('leyend'),
        viewBox: false,
        autoSize: false,
        height: 64,
        width: 452,
        padding: 0,
        items: [{
            type: 'text',
            text: '= Presenta Patología (P)',
            fill: '#000',
            font: '10px Arial',
            x: 294,
            y: 16
        },{
            type: 'rect',
            x: 275,
            y: 10,
            height : 12,
            width: 12,
            fill: '#eaeaea',
            stroke: '#83B6E9',
            'stroke-width': 1
        },{
            type: 'text',
            text: '= No Presenta Patología (N/P)',
            fill: '#000',
            font: '10px Arial',
            x: 294,
            y: 30
        },{
            type: 'rect',
            x: 275,
            y: 24,
            height : 12,
            width: 12,
            fill: '#99CCFF',
            stroke: '#0065A8',
            'stroke-width': 1
        },{
            type: 'text',
            text: '= Sin Información (S/I)',
            fill: '#000',
            font: '10px Arial',
            x: 294,
            y: 44
        },{
            type: 'rect',
            x: 275,
            y: 38,
            height : 12,
            width: 12,
            fill: '#99FFCC',
            stroke: '#339900',
            'stroke-width': 1
        }]
    });
    Ext.create('Ext.draw.Component', {
        renderTo: Ext.get('leyend_total'),
        viewBox: false,
        autoSize: false,
        height: 64,
        width: 452,
        padding: 0,
        items: [{
            type: 'text',
            text: '= Presenta Patología (P)',
            fill: '#000',
            font: '10px Arial',
            x: 294,
            y: 16
        },{
            type: 'rect',
            x: 275,
            y: 10,
            height : 12,
            width: 12,
            fill: '#eaeaea',
            stroke: '#83B6E9',
            'stroke-width': 1
        },{
            type: 'text',
            text: '= No Presenta Patología (N/P)',
            fill: '#000',
            font: '10px Arial',
            x: 294,
            y: 30
        },{
            type: 'rect',
            x: 275,
            y: 24,
            height : 12,
            width: 12,
            fill: '#99CCFF',
            stroke: '#0065A8',
            'stroke-width': 1
        },{
            type: 'text',
            text: '= Sin Información (S/I)',
            fill: '#000',
            font: '10px Arial',
            x: 294,
            y: 44
        },{
            type: 'rect',
            x: 275,
            y: 38,
            height : 12,
            width: 12,
            fill: '#99FFCC',
            stroke: '#339900',
            'stroke-width': 1
        }]
    });
    //Creando el objeto Ext.grid.GridPanel
    var grid = new Ext.grid.GridPanel({
        title:'Detalle',
        store: json_store,
        width: 454,
        cls: 'data',
        stripeRows: true,
        //  height:500,
        //        layout: 'vbox',
        renderTo: 'grid',
        columns: [
        {
            id:'tramo',
            header: "Condición", 
            width: 110, 
            sortable: false, 
            dataIndex: 'tramo',
            cls:'blue',
            hideable: false
        },
        {
            header: "F", 
            width: 35, 
            sortable: false, 
            dataIndex: 'f',
            hideable: false
        },
        {
            header: "%F", 
            width: 35, 
            sortable: false, 
            dataIndex: 'si',
            hideable: false
        },
        {
            header: "NF", 
            width: 35, 
            sortable: false, 
            dataIndex: 'nf',
            hideable: false
        },
        {
            header: "%NF", 
            width: 35, 
            sortable: false, 
            //renderer: Ext.util.Format.dateRenderer('m/d/Y'), 
            dataIndex: 'no',
            hideable: false
        },
        {
            header: "Total reg.", 
            width: 60, 
            sortable: false, 
            dataIndex: 'tr',
            hideable: false
        },
        {
            header: "S/I", 
            width: 35, 
            sortable: false, 
            dataIndex: 's_n',
            hideable: false
        },
        {
            header: "%S/I", 
            width: 35, 
            sortable: false, 
            dataIndex: 'sn',
            hideable: false
        },
        {
            header: "Total Niños", 
            sortable: false,
            width: 70, 
            dataIndex: 'tn',
            hideable: false
        }
        ]
    }); //Creando el objeto Ext.grid.GridPanel
    var grid_total = new Ext.grid.GridPanel({
        title:'Detalle',
        store: json_store_total,
        width: 454,
        cls: 'data',
        stripeRows: true,
        //  height:500,
        //        layout: 'vbox',
        renderTo: 'grid_total',
        columns: [
        {
            id:'tramo_total',
            header: "Condición", 
            width: 110, 
            sortable: false, 
            dataIndex: 'tramo',
            cls:'blue',
            hideable: false
        },
        {
            header: "F", 
            width: 35, 
            sortable: false, 
            dataIndex: 'f',
            hideable: false
        },
        {
            header: "%F", 
            width: 35, 
            sortable: false, 
            dataIndex: 'si',
            hideable: false
        },
        {
            header: "NF", 
            width: 35, 
            sortable: false, 
            dataIndex: 'nf',
            hideable: false
        },
        {
            header: "%NF", 
            width: 35, 
            sortable: false, 
            //renderer: Ext.util.Format.dateRenderer('m/d/Y'), 
            dataIndex: 'no',
            hideable: false
        },
        {
            header: "Total reg.", 
            width: 60, 
            sortable: false, 
            dataIndex: 'tr',
            hideable: false
        },
        {
            header: "S/I", 
            width: 35, 
            sortable: false, 
            dataIndex: 's_n',
            hideable: false
        },
        {
            header: "%S/I", 
            width: 35, 
            sortable: false, 
            dataIndex: 'sn',
            hideable: false
        },
        {
            header: "Total Niños", 
            sortable: false,
            width: 70, 
            dataIndex: 'tn',
            hideable: false
        }
        ]
    }); 
    function selectData(combo,  records,  eOpts){
        //Ext.getCmp('chart_centro').axes.get('top').setTitle('Totales ' + cmbCentros.getRawValue())
        //Ext.getCmp('panel_chart').getEl().mask('Cargando...');
        // Ext.getCmp('total_chart').getEl().mask('Cargando...');

        json_store.load({
            params:{
                id_centro: cmbCentros.getValue(),
                id_trimestre: cmbTrimestre.getValue(),
                anio: cmbAnios.getValue()
            }
        });
        
        json_store_total.load({
            params:{
                id_trimestre: cmbTrimestre.getValue(),
                anio: cmbAnios.getValue()
            }
        });
    }
});
