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
    var condicionesStore = Ext.create('Ext.data.Store', {
        fields: ['value', 'name'],
        proxy: {
            type: 'ajax',
            url : '../combos/condiciones',
            reader: {
                type: 'json'
            }
        }
    });
    
    condicionesStore.load(); 
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
        fields: ['tramo','f', 'si', 'no','nf','tr', 'sn','s_n', 'total', 'tn'],
        proxy: {
            type: 'ajax',
            url : '../graficos/resumen/data',
            reader: {
                type: 'json'
            }
        },
        listeners: {
            beforeload: function(){
                Ext.getCmp('panel_chart').getEl().mask('Cargando...');
            },
            load: function(){
                Ext.getCmp('panel_chart').setTitle('Totales ' + cmbCentros.getRawValue())
                Ext.getCmp('chart_centro').axes.get('bottom').setTitle('Rango de ' + cmbTramos.getRawValue());
                //Ext.getCmp('chart_centro').axes.get('top').setTitle('Totales ' + cmbCentros.getRawValue())
                //console.log(Ext.getCmp('cmbCentros').getRawValue());
                panel1.getEl().unmask();
                //               Ext.getCmp('chart_centro').setVisible(false);

                Ext.getCmp('chart_centro').redraw();
            //Ext.getCmp('chart_centro').setVisible(true);
            }
        }
    });
    var json_store_total = Ext.create('Ext.data.Store', {
        fields: ['tramo','f', 'si', 'no','nf','tr', 'sn','s_n', 'total', 'tn'],
        proxy: {
            type: 'ajax',
            url : '../graficos/resumen/data',
            reader: {
                type: 'json'
            }
        },
        listeners: {
            beforeload: function(){
                Ext.getCmp('total_panel').getEl().mask('Cargando...');

            },
            load: function(){
                //Ext.getCmp('chart_centro').setVisible(true);
                //Ext.getCmp('panel_total').setTitle('Totales ' + cmbCentros.getRawValue())
                Ext.getCmp('chart_total').axes.get('bottom').setTitle('Rango de ' + cmbTramos.getRawValue());
                //Ext.getCmp('chart_centro').axes.get('top').setTitle('Totales ' + cmbCentros.getRawValue())
                //console.log(Ext.getCmp('cmbCentros').getRawValue());
                panel_total.getEl().unmask();
                //               Ext.getCmp('chart_centro').setVisible(false);

                Ext.getCmp('chart_total').redraw();
            //Ext.getCmp('chart_centro').setVisible(true);
            }
        }
    });
    
    var cmbAnios = Ext.create('Ext.form.ComboBox', {
        fieldLabel: 'Año',
        width: 300,
        store: 'aniosStore',
        emptyText:'Selecione Año...',
        queryMode: 'local',
        displayField: 'name',
        valueField: 'value',
        listeners:{
            'select': selectData
        }
    });
    var cmbCondiciones = Ext.create('Ext.form.ComboBox', {
        fieldLabel: 'Condiciones',
        width: 300,
        store: condicionesStore,
        emptyText:'Selecione Condicion...',
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
        emptyText:'Selecione Trimestre...',
        queryMode: 'local',
        displayField: 'name',
        valueField: 'value',
        listeners:{
            'select': selectData
        }
    });
    
    var cmbTramos = new Ext.form.ComboBox({
        fieldLabel: 'Tramo',
        hiddenName:'tramo',
        store: new Ext.data.ArrayStore({
            fields: ['name', 'value'],
            data : [['Peso', 'peso'],['Semanas','semana']]// from states.js
        }),
        valueField:'value',
        displayField:'name',
        typeAhead: true,
        mode: 'local',
        triggerAction: 'all',
        emptyText:'Selecione tramo...',
        selectOnFocus:true,
        width:300,
        listeners:{
            select: selectData
        }
    });
    cmbTramos.setRawValue('Semanas');

    
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
            }
        }
    });
    
    var filterPanel = new Ext.Panel({
        bodyPadding: 5,
        width       : 920,
        title       : 'Estadísticas por condicion',
        collapsible : true,
        renderTo    : 'combo',
        layout: {
            type: 'table',
            columns: 3,
            tableAttrs: {
                cellpading: 5,
                style: {
                    width: '100%'
                }
            }
        },        
        items : [
        cmbCondiciones,
        cmbAnios,
        cmbTrimestre,
        cmbTramos,
        cmbCentros,
        editBtn
        ]
    });
    
       
    //Creando el objeto Ext.grid.GridPanel
    var grid_total = new Ext.grid.GridPanel({
        title:'Detalle',
        store: json_store_total,
        width: 454,
        cls: 'data',
        stripeRows: true,
        renderTo: 'grid_total',
        columns: [
        {
            id:'tramo_total',
            header: "Rango de peso (g.)", 
            width: 110, 
            sortable: true, 
            dataIndex: 'tramo',
            cls:'blue'
        },
        {
            header: "P", 
            width: 35, 
            sortable: true, 
            dataIndex: 'f'
        },
        {
            header: "%P", 
            width: 35, 
            sortable: true, 
            dataIndex: 'si'
        },
        {
            header: "NP", 
            width: 35, 
            sortable: true, 
            dataIndex: 'nf'
        },
        {
            header: "%NP", 
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
            width: 70, 
            dataIndex: 'tn'
        }
        ]        
    });
    var grid = new Ext.grid.GridPanel({
        title:'Detalle',
        store: json_store,
        width: 454,
        cls: 'data',
        stripeRows: true,
        renderTo: 'grid',
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
            header: "P", 
            width: 35, 
            sortable: true, 
            dataIndex: 'f'
        },
        {
            header: "%P", 
            width: 35, 
            sortable: true, 
            dataIndex: 'si'
        },
        {
            header: "NP", 
            width: 35, 
            sortable: true, 
            dataIndex: 'nf'
        },
        {
            header: "%NP", 
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
            width: 70, 
            dataIndex: 'tn'
        }
        ]        
    });
    var leyend = {
        xtype: 'draw',
        cls: 'linetop',
        viewBox: false,
        autoSize: false,
        height: 64,
        width: 452,
        padding: 0,
        items: [{
            type: 'text',
            text: '= Presenta (F)',
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
            text: '= No Presenta (N/F)',
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
    };
    var leyend_total = {
        xtype: 'draw',
        cls: 'linetop',
        viewBox: false,
        autoSize: false,
        height: 64,
        width: 452,
        padding: 0,
        items: [{
            type: 'text',
            text: '= Presenta (P)',
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
            text: '= No Presenta (N/P)',
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
    };
    var panel1 = Ext.create('widget.panel', {
        width: 454,
        height: 464,
        title: '  .',
        id: 'panel_chart',
        cls: 'center',
        renderTo : 'panel',
        layout: 'auto',
        items: [{
            xtype: 'chart',
            id: 'chart_centro',
            width: 454,
            height: 380,
            theme : 'Uc',
            animate: false,
            shadow: false,
            store: json_store,
            legend: false,
            //            listeners:{
            //                afterrender: selectData
            //            },
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
                fields: ['total']
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
        },leyend]
    });
    var panel_total = Ext.create('widget.panel', {
        width: 454,
        height: 464,
        title: 'Totales Neocosur',
        id: 'total_panel',
        cls: 'center',
        renderTo : 'wrap_total',
        layout: 'auto',
        
        items: [{
            xtype: 'chart',
            id: 'chart_total',
            width: 454,
            height: 380,
            theme : 'Uc',
            animate: false,
            shadow: false,
            store: json_store_total,
            legend: false,
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
                fields: ['total']
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
        },leyend_total]
    });
    
    function selectData(combo,  records,  eOpts){
        
        json_store.load({
            params:{
                id_centro: cmbCentros.getValue(),
                id_trimestre: cmbTrimestre.getValue(),
                anio: cmbAnios.getValue(),
                condicion: cmbCondiciones.getValue(),
                tramo: cmbTramos.getValue()
            }
        });
        
        json_store_total.load({
            params:{
                id_trimestre: cmbTrimestre.getValue(),
                anio: cmbAnios.getValue(),
                condicion: cmbCondiciones.getValue(),
                tramo: cmbTramos.getValue()
            }
        });
    }
});
