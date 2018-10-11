<?php
error_reporting(0);
include 'capaDAO/cirugiaDAO.php';
include 'capaDAO/ConexionDAO.php';

$conex= new ConexionDAO();

$dao = new cirugiaDAO($conex);
$id=1;

$ar=$dao->buscarId($id);



?>


<table>
<tr>
	<td>Edad</td>
	<td>Cirugías</td>
	<td>Otro</td>
	<td></td>
	<td></td>
</tr>


</table>