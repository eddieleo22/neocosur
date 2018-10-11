<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IngresoDAO
 *
 * @author Luis
 */
class fichasDAO  {
 
		private $conexionDao;
		private $id;	
		public function __construct($con)
		{
			   $this->conexionDao = $con;
		}
		function __destruct() {
		$this->conexionDao =null;
		}


		public function setId($id='')
		{
		$this->id = $id;
		return true;
		}

		public function getId()
		{
		return $this->id;
		}
 
	public function contarControles($id)
	{
		 $query="
			 select count(ct.ID_CONTROL) as controles,
				ct.ID_CONTROL 
				from control  ct
				where ID_NEOCOSUR =".$id.";
			
		";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
		
	public function  buscarFicha($filtroCentro,$filtroPais,$filtro,$filtroEstado)
	{
	
		/*
		
		$centro  
		$pais
		$estado
		$ap_paterno
		$ap_materno
		$identificador
		$fecha_desde
		$fecha_hasta
		$num_ficha 
		$peso_desde
		$peso_hasta
		 */
		    $query="  
				select 
				
				i.ID_NEOCOSUR,NOMBRES,p.descripcion,ID_DESTINO,
				FECHA_NACIMIENTO,PESO_NACIMIENTO AS peso,
				APGAR_1,APGAR_5,NUMERO_FICHA_MEDICA,
				FALLECE_SALA_PARTO,
				ESTADO_FICHA,
				c.c_nombre
				FROM ingreso i 
				
				inner join centro c on i.id_centro=c.c_id_centro  $filtroCentro 
				inner join pais p on  p.id_Pais=c.c_id_pais $filtroPais 
				inner join informacion_alta  inal on  inal.ID_NEOCOSUR=i.ID_NEOCOSUR
				
				inner join condicion_ingreso co on co.ID_CONDICION_INGRESO =i.ID_ESTADO_FICHA  $filtroEstado
				where  1   $filtro 
				
				group by i.ID_NEOCOSUR 
				order by i.ID_NEOCOSUR desc ,NOMBRES desc limit 0,500;	
				

		";
		
      
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		
		$this->conexionDao->Cerrar();
		return $retorno;
	}
	
			

}
