<?php 
$shtml="<table>"; 
$shtml=$shtml."<tr>"; 
$shtml=$shtml."<td>Id</td><td>Codigo</td><td>US$</td>"; 
$shtml=$shtml."</tr>"; 
$shtml=$shtml."<tr>"; 
$shtml=$shtml."<td>1</td><td>C4325</td><td>2000.00</td>"; 
$shtml=$shtml."</tr>"; 
$shtml=$shtml."<tr>"; 
$shtml=$shtml."<td>2</td><td>DX456</td><td>1000.00</td>"; 
$shtml=$shtml."</tr>"; 
$shtml=$shtml."<tr>"; 
$shtml=$shtml."<td>3</td><td>&nbsp;</td><td>-50.00</td>"; 
$shtml=$shtml."</tr>"; 
$shtml=$shtml."<tr>"; 
$shtml=$shtml."<td>4</td><td>A18-TG</td><td>20.64</td>"; 
$shtml=$shtml."</tr>"; 
$shtml=$shtml."</table>"; 
$scarpeta=""; //carpeta donde guardar el archivo. 
//debe tener permisos 775 por lo menos 
$sfile=$scarpeta."docs/xxxx.xls"; //ruta del archivo a generar 
$fp=fopen($sfile,"w"); 
fwrite($fp,$shtml); 
fclose($fp); 
echo "<a href='".$sfile."'>Haz click aqui</a>"; 
?>