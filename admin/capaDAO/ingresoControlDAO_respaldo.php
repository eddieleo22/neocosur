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
class ingresoControlDAO  {
 
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
    public function actualizarControl($ingreso)
	{		
            
		$query = "UPDATE control SET 
						 
						FECHA_CONTROL = '" . ($ingreso->FECHA_CONTROL) . "',
						EDAD_CORREGIDA_AGNOS = '" . ($ingreso->EDAD_CORREGIDA_AGNOS) . "',
						EDAD_CORREGIDA_MESES = '" . ($ingreso->EDAD_CORREGIDA_MESES) . "',
						EDAD_CRONOLOGICA_AGNOS = '" . ($ingreso->EDAD_CRONOLOGICA_AGNOS) . "',
						EDAD_CRONOLOGICA_MESES = '" . ($ingreso->EDAD_CRONOLOGICA_MESES) . "',
						ID_RESPONSABLE = '" . ($ingreso->ID_RESPONSABLE) . "',
						VALIDO = '" . ($ingreso->VALIDO) . "' ,						 
						nombre_control = '" . ($ingreso->nombre_control) . "' 						 
						WHERE `ID_CONTROL`='{$ingreso->ID_CONTROL}' and ID_NEOCOSUR ='{$ingreso->ID_NEOCOSUR}' ; ";
       
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
                return $retorno;                  
		
	}
       
		public function actualizarIngreso($ingreso)
	{		
            
		$query = "UPDATE control SET  
						FECHA_INGRESO_PROGRAMA = '" . ($ingreso->FECHA_INGRESO_PROGRAMA) . "',
						ID_RESPONSABLE = '" . ($ingreso->ID_RESPONSABLE) . "',
						VALIDO = '" . ($ingreso->VALIDO) . "' 						 
						WHERE `ID_CONTROL`='{$ingreso->ID_CONTROL}' and ID_NEOCOSUR ='{$ingreso->ID_NEOCOSUR}' ; ";
   
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);						
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
                return $retorno;                  
		
	}
	public function retornoCentro($idNeocosur ){
		 $query ="select ID_CENTRO
				from    ingreso i  where i.ID_NEOCOSUR =".$idNeocosur ."  ; ";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;		
	}
	public function listarControles($activo,$idNeocosur ){
		$query ="select EDAD_CORREGIDA_AGNOS,EDAD_CORREGIDA_MESES , nombre_control,ID_CONTROL,FECHA_INGRESO_PROGRAMA
				from  control  ct
				inner join ingreso i   on  ct.ID_NEOCOSUR=i.ID_NEOCOSUR and i.ID_NEOCOSUR =".$idNeocosur ."

				where 	VALIDO =".$activo."  
				 

				order by EDAD_CORREGIDA_AGNOS,EDAD_CORREGIDA_MESES asc  ; ";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		
		$this->conexionDao->Cerrar();
		return $retorno;		
	}
	
	
    public function guarda($ingreso)
	{
                $query ="INSERT INTO control
					(
						
						ID_NEOCOSUR, 
						FECHA_INGRESO_PROGRAMA, 
						FECHA_CONTROL, 
						EDAD_CORREGIDA_AGNOS, 
						EDAD_CORREGIDA_MESES, 
						EDAD_CRONOLOGICA_AGNOS, 
						EDAD_CRONOLOGICA_MESES, 
						ID_RESPONSABLE, 
						VALIDO,
						nombre_control
						) 
					VALUES
					(
				'" . ($ingreso->ID_NEOCOSUR) . "',
				'" . ($ingreso->FECHA_INGRESO_PROGRAMA) . "',
				'" . ($ingreso->FECHA_CONTROL) . "',
				'" . ($ingreso->EDAD_CORREGIDA_AGNOS) . "',
				'" . ($ingreso->EDAD_CORREGIDA_MESES) . "',
				'" . ($ingreso->EDAD_CRONOLOGICA_AGNOS) . "',
				'" . ($ingreso->EDAD_CRONOLOGICA_MESES) . "' ,
				'" . ($ingreso->ID_RESPONSABLE) . "',
				'" . ($ingreso->VALIDO) . "' ,  
				'" . ($ingreso->nombre_control) . "' 			  
					);";
		
			//echo $query;die;
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->insertUpdateDelete($query);
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $retorno;
	}
        
	public function  buscarFichaId($idN)
	{
		$query = "select  *  from control 
				WHERE ID_NEOCOSUR=".$idN." ;"; 
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	public function  buscarFichaIdSeg($idN,$idControl)
	{
		$query = "select  *  from control 
				WHERE ID_NEOCOSUR=".$idN."  and ID_CONTROL = ".$idControl.";"; 
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	public function buscarFechaControl1($idN){
		
		$query = "select  *  from control 
				WHERE  ID_NEOCOSUR =".$idN . " and VALIDO=1 
				and nombre_control='40 semanas'
				order by ID_CONTROL desc ;"; 
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		//$fecha=  echo "query 40 semanas  <br>".;
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	public function buscarFechaControl($fecha,$idN){
		
	      $query = "select  *  from control 
				WHERE  nombre_control ='".$fecha ."' 
				and ID_NEOCOSUR =".$idN . "
				and VALIDO=1 order by ID_CONTROL desc ;"; 
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$id=$row["ID_CONTROL"];
		$this->conexionDao->Cerrar();
		return $id;
	}
	
	public function buscarFichaSegId($id){
		$query = "select  
				NOMBRES,
				APELLIDO_MATERNO,
				APELLIDO_PATERNO,
				FECHA_NACIMIENTO,
				NUMERO_FICHA_MEDICA,
				EDAD_GESTACIONAL,
				ID_RESPONSABLE_INGRESO_DATOS,
				PESO_NACIMIENTO,
				TALLA_NACIMIENTO,
				CIRC_CRANEO_NACIMIENTO,
				APGAR_1,
				APGAR_5,
				APGAR_1,
				ID_GENERO,
				c.c_nombre,
				c_tipo,
				pr.MULTIPLE,
				DATE_FORMAT(FECCHA_ALTA_FALLECE,'%Y-%m-%d') as FECCHA_ALTA_FALLECE,
				DATE_FORMAT( DATE_ADD(FECHA_NACIMIENTO , INTERVAL ((40-EDAD_GESTACIONAL)*7) DAY), '%Y-%m-%d') AS EDAD_CRONOLOGICA
				from ingreso i  
				inner join centro c on i.ID_CENTRO=c.c_id_centro 
				inner join antecedentes_prenatales  pr on  pr.ID_NEOCOSUR  =  i.ID_NEOCOSUR
				inner join informacion_alta inf on inf.ID_NEOCOSUR  =  i.ID_NEOCOSUR
				WHERE i.ID_NEOCOSUR=".$id; 
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
        

}
