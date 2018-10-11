<?php
include '../capaDAO/ConexionDAO.php';
$cone= new ConexionDAO();
//$dbh = mysql_connect("localhost", $user, $pass);
//$db = mysql_select_db($bbdd);
//$_GET['id']=1;
$consulta = "SELECT * from ciudad WHERE ID_PAI = ".$_GET['id'];
echo " query ".$consulta;
$cone->Abrir();
$retorno = $cone->select($consulta);						
$cone->Cerrar();
//var_dump($retorno);
//Debug::dump($query);
while ($fila = $retorno->fetch_array()) {
	
    echo utf8_encode('<option value="'.$fila['ID_CIU'].'" $selected >'.$fila['DESC_CIU'].'</option>');
	
};
echo '<option value="-1">Otra</option>';
?>
                     