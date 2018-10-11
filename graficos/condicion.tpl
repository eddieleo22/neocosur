<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Graficos</title>
        <link rel="stylesheet" type="text/css" href="../../ext-4.0.7-gpl/resources/css/ext-all.css" />
        <script type="text/javascript" charset="utf-8">
            var centro = '{$centro}';
            var id_centro = {$id_centro};
            var anio_minimo = {$anio_minimo};
            var anio_maximo = {$anio_maximo};
        </script>
        <script type="text/javascript" src="../../ext-4.0.7-gpl/bootstrap.js"></script>
        <script type="text/javascript" src="condicion.js" charset="utf-8"></script>
        <style type="text/css">
            #wraper { 
                width: 920px;
                margin: 0 auto;
            }
            .center .x-panel-header-text-container{
                text-align: center}
            .x-grid-cell-tramo .x-grid-cell-inner,.x-grid-cell-tramo_total .x-grid-cell-inner {
                background-color: #d5e6f7;
                color: #023ca9;
                font-weight: bold;
            }
            .x-column-header-inner{
                background-color: #d5e6f7;
                color: #023ca9;
                font-weight: bold;}
            .data .x-panel-header-default {
                background-image: none;
                background-color: #0065a8 !important;
                color: #FFFFFF;
                font-weight: bold;
                text-align: center;
            }
            .data .x-panel-header-text-default {
                color: #FFFFFF;}
            </style>
        </head>
        <body id="docbody">
        <div id="wraper">
            <div id="combo"></div>
            <div style="width: 452px; float: left;">
                <div id="panel" style="float: left; width: 452px; "></div>
                <div id="leyend" style="float: left; width: 452px; height: 64px; border-top:dashed 1px #023c8a"></div>   
                <div id="grid" style="float: left; width: 452px;"></div>   
            </div>
            <div style="width:14px; height: 100%; float:left">&nbsp;</div>
            <div style="width: 452px; float: left;">
                <div id="panel_total" style="float: left; width: 452px; "></div>
                <div id="leyend_total" style="float: left; width: 452px; height: 64px; border-top:dashed 1px #023c8a"></div>   
                <div id="grid_total" style="float: left; width: 452px;"></div>   
            </div>
            <!--div style="float: left; background-image: url( graf.png); width: 452px; height: 414px" ></div-->
        </div>
    </body>
</html>
