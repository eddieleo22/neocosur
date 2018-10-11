<?php
error_reporting(0);
    extract($_GET);
	
  get_persons($id, $id2, $id3, $id4, $id5, $graph);
 
  
   
function get_persons( $id, $id2, $id3, $id4, $id5, $graph) {  
   

   
    if( $id == "1" && $graph == "1"){		
        $jsondata["success"] = true;
        $jsondata["data"]["etiqueta"] = ["UNO", "February", "March", "April", "May", "June", "July"];//sprintf("Se han encontrado %d usuarios", $result->num_rows);
        $jsondata["data"]["valores"] = [[61,23,0,29,23,6,30], [10,65,30,40,63,60,70], [29,12,70,31,14,34,0]];//array();
    }
    elseif( $id == "2" && $graph == "1"){
        $jsondata["success"] = true;
        $jsondata["data"]["etiqueta"] = ["DOS", "February", "March", "April", "May", "June", "July"];//sprintf("Se han encontrado %d usuarios", $result->num_rows);
        $jsondata["data"]["valores"] = [[29,12,70,31,14,34,0], [61,23,0,29,23,6,30], [10,65,30,40,63,60,70]];//array();
    }
    elseif( $id == "3" && $graph == "1"){
        $jsondata["success"] = true;
        $jsondata["data"]["etiqueta"] = ["TRES", "February", "March", "April", "May", "June", "July"];//sprintf("Se han encontrado %d usuarios", $result->num_rows);
        $jsondata["data"]["valores"] = [[10,65,30,40,63,60,70], [29,12,70,31,14,34,0], [61,23,0,29,23,6,30]];//array();
    }
    
	
	// Grafico 2
	
	if( $id == "3" && $graph == "2"){		
        $jsondata["success"] = true;
        $jsondata["data"]["etiqueta"] = ["3-2", "February", "March", "April", "May", "June", "July"];//sprintf("Se han encontrado %d usuarios", $result->num_rows);
        $jsondata["data"]["valores"] = [[61,23,0,29,23,6,30], [10,65,30,40,63,60,70], [29,12,70,31,14,34,0]];//array();
    }
    elseif( $id == "1" && $graph == "2"){
        $jsondata["success"] = true;
        $jsondata["data"]["etiqueta"] = ["1-2", "February", "March", "April", "May", "June", "July"];//sprintf("Se han encontrado %d usuarios", $result->num_rows);
        $jsondata["data"]["valores"] = [[29,12,70,31,14,34,0], [61,23,0,29,23,6,30], [10,65,30,40,63,60,70]];//array();
    }
    elseif( $id == "2" && $graph == "2"){
        $jsondata["success"] = true;
        $jsondata["data"]["etiqueta"] = ["2-2", "February", "March", "April", "May", "June", "July"];//sprintf("Se han encontrado %d usuarios", $result->num_rows);
        $jsondata["data"]["valores"] = [[10,65,30,40,63,60,70], [29,12,70,31,14,34,0], [61,23,0,29,23,6,30]];//array();
    }
    
    header('Content-type: application/json; charset=utf-8;');
	echo json_encode($jsondata, JSON_FORCE_OBJECT);
	
}

  
   
    
        //header("location: ../stacked.html");

?>