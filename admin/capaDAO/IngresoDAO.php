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
class IngresoDAO  {
 	
   private $conexionDao;
   private $id;	
   private static $instanceIngresoDAO;
	
	
	
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

   public function actualizar($ingreso)
	{		            
		 $query = "UPDATE ingreso SET 
						`NOMBRES` = ? ,
						`APELLIDO_PATERNO` = ? ,
						`APELLIDO_MATERNO` = ? ,
						`FECHA_NACIMIENTO` = ? ,
						`NUMERO_FICHA_MEDICA` = ? ,
						`ID_RESPONSABLE_INGRESO_DATOS` = ? ,
						`ID_ESTADO_FICHA` = ? ,
						`FALLECE_SALA_PARTO` = ? ,
                        `ID_GENERO` = ? ,
						`ID_PRESENTACION` = ? ,
						`ID_TIPO_PARTO` = ? ,
						`PESO_NACIMIENTO` = ? ,
						`TALLA_NACIMIENTO` = ? ,
						`CIRC_CRANEO_NACIMIENTO` = ? ,
						`APGAR_1` = ? ,
						`APGAR_5` = ? ,
						`EDAD_GESTACIONAL` = ? 			 
						  WHERE `ID_NEOCOSUR`= ? ;  ";
						  //echo "quer ".$query;
     
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		
		$sentencia->bind_param("ssssssssssssssssss",
			$ingreso->NOMBRES ,
			$ingreso->APELLIDO_PATERNO ,
			$ingreso->APELLIDO_MATERNO ,
			$ingreso->FECHA_NACIMIENTO ,
			$ingreso->NUMERO_FICHA_MEDICA,
			$ingreso->ID_RESPONSABLE_INGRESO_DATOS ,
			$ingreso->ID_ESTADO_FICHA,
			$ingreso->FALLECE_SALA_PARTO ,
			$ingreso->ID_GENERO ,
			$ingreso->ID_PRESENTACION ,
			$ingreso->ID_TIPO_PARTO ,
			$ingreso->PESO_NACIMIENTO,
			$ingreso->TALLA_NACIMIENTO,
			$ingreso->CIRC_CRANEO_NACIMIENTO ,
			$ingreso->APGAR_1 ,
			$ingreso->APGAR_5 ,
			$ingreso->EDAD_GESTACIONAL,
			$ingreso->ID_NEOCOSUR	);
			
		 if(!$sentencia->execute()) { 
		 $sentencia->close();
			  return false;
			}
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno;            
		
	}
       
        public function guarda($ingreso)
	{
         $query ="INSERT INTO `ingreso` ( 
					 ID_CENTRO,
					`NOMBRES`, 
                    `APELLIDO_PATERNO`,
                    `APELLIDO_MATERNO`, 
                    `FECHA_NACIMIENTO`, 
                    `NUMERO_FICHA_MEDICA`, 
                    `ID_RESPONSABLE_INGRESO_DATOS`,
                    `ID_ESTADO_FICHA`,
                    `FALLECE_SALA_PARTO`, 
                    `ID_GENERO`,
                    `ID_PRESENTACION`,
                    `ID_TIPO_PARTO`,
                    `PESO_NACIMIENTO`, 
                    `TALLA_NACIMIENTO`, 
                    `CIRC_CRANEO_NACIMIENTO`, 
                    `APGAR_1`,
                    `APGAR_5`,
					EDAD_GESTACIONAL ) VALUES
					( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		
		$sentencia->bind_param("isssssssssssssssss",
			$ingreso->ID_CENTRO ,
			$ingreso->NOMBRES ,
			$ingreso->APELLIDO_PATERNO ,
			$ingreso->APELLIDO_MATERNO ,
			$ingreso->FECHA_NACIMIENTO ,
			$ingreso->NUMERO_FICHA_MEDICA,
			$ingreso->ID_RESPONSABLE_INGRESO_DATOS ,
			$ingreso->ID_ESTADO_FICHA,
			$ingreso->FALLECE_SALA_PARTO ,
			$ingreso->ID_GENERO ,
			$ingreso->ID_PRESENTACION ,
			$ingreso->ID_TIPO_PARTO ,
			$ingreso->PESO_NACIMIENTO,
			$ingreso->TALLA_NACIMIENTO,
			$ingreso->CIRC_CRANEO_NACIMIENTO ,
			$ingreso->APGAR_1 ,
			$ingreso->APGAR_5 ,
			$ingreso->EDAD_GESTACIONAL	);	
		if(!$sentencia->execute()) { 
		 $sentencia->close();
			  return false;
			}
		$res=$sentencia->execute();  
		$idLast = $this->conexionDao->ultimo();
		$this->setId($this->conexionDao->getId());
		$this->conexionDao->Cerrar();
		return $res;			
	}
      
	public function  buscarFichaId($id)
	{
		
		//$query = "select  *  from ingreso WHERE ID_NEOCOSUR=".$id;
		 $query = "SELECT * FROM ingreso WHERE ID_NEOCOSUR = ?";
		
		
		$this->conexionDao->Abrir();
		//	var_dump($this->conexionDao);
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );	
		if(!$sentencia->execute()) { 
				 $sentencia->close();
					  return false;
		}		
		$res=$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();
		//var_dump($row);
		//$retorno = $this->conexionDao->select($query);						
		//$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	 public function rescataPerfilUsuario($user){
			
			
			 $query="select 		 
					pf_descripcion as 'perfil' 
					from usuario us  
						 inner join perfil_user pf   on us.us_id_perfil=pf.pf_id_perfil and  pf.activo=1 
					where us_usuario = ? ;";
		
		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("s", $user );	
		if(!$sentencia->execute()) { 
				 $sentencia->close();
					  return false;
		}
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();
		//$retorno = $this->conexionDao->select($query);						
		//$retorno = $this->conexionDao->select($query);						
		//$row = $resultado->fetch_assoc();
		$this->conexionDao->Cerrar();
		 $row['perfil'];
	} 

	public function login($user,$password){
		 $query="select 		 
					pf_descripcion as 'perfil' 
					from usuario us  
						 inner join perfil_user pf   on us.us_id_perfil=pf.pf_id_perfil and  pf.activo=1 
					where us_usuario = ? ;";
		
		// $user = mysql_real_escape_string($user);
		//echo "<br>paso despues user 22  > ".$user;	
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("s", $user );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();
		
		
		//$retorno = $this->conexionDao->select($query);						
		//$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		$perfil= $row['perfil']; 
			if($perfil=='Administrador' || $perfil =='Supervisor' || $perfil=='Estadistico' ) {
				$inner = "   ";
				$mostrarCampo = " " ;
				
			}
			else { 
				$inner = " inner join  centro c on c.c_id_centro =us_id_centro and c_activo=1 ";
				$mostrarCampo .=" c_id_centro as 'id_centro', c_nombre as 'centro', c_id_pais as 'pais',";
			}
		
		
		$query="select 
		us_id_user as  'id_responsable',
		".$mostrarCampo ."
		
		
		pf_descripcion as 'perfil',
		us.us_nombres as 'usuario'
		from usuario us 
		    ".$inner."
			
			 inner join perfil_user pf   on us.us_id_perfil=pf.pf_id_perfil and  pf.activo=1 
		where us_usuario = ? 
				AND us_password = ? 
				AND us_activo = 1;";
		
		
		//die;
		//echo "query ".$query;die;
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		
		$sentencia->bind_param('ss',$user,$password );	 		
		$sentencia->execute(); 
		$resultado = $sentencia->get_result(); 
		$row = $resultado->fetch_assoc(); 
		$this->conexionDao->Cerrar();
		return $row;
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
				
				inner join centro c on c.c_id_centro=i.id_centro 
				left join antecedentes_prenatales  pr on  pr.ID_NEOCOSUR  =  i.ID_NEOCOSUR
				left join informacion_alta inf on inf.ID_NEOCOSUR  =  i.ID_NEOCOSUR
				WHERE i.ID_NEOCOSUR=  ? ; "; 
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		
		$sentencia->bind_param('i',$id );	 
		if(!$sentencia->execute()) { 
				 $sentencia->close();
					  return false;
		}
		$sentencia->execute(); 
		$resultado = $sentencia->get_result(); 
		$row = $resultado->fetch_assoc(); 
		$this->conexionDao->Cerrar();
		if($row!=null){
			$this->pais=$resp['pais'];
			$this->centro=$resp['centro'];
			$this->perfil=$resp["perfil"];
			$this->id_responsable=$resp["id_responsable"];
			$this->id_centro=$resp["id_centro"];
			$this->usuario=$resp["usuario"];
		}
		return $row;
	}
	
	public function actualizarFallece($ingreso){
		
		 $query = "UPDATE ingreso SET 
		`FALLECE_SALA_PARTO` = ? 
		 WHERE `ID_NEOCOSUR`= ? ; ";
		//echo "query".$query;
		//die;  
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		
		$sentencia->bind_param("ss", 
			$ingreso->FALLECE_SALA_PARTO,  
			$ingreso->ID_NEOCOSUR	);	
		if(!$sentencia->execute()) { 
				 $sentencia->close();
					  return false;
		}
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno; 
	}
	
	public function actualizaEstado($ingreso){
		
		$query = "UPDATE ingreso SET 
		`ID_ESTADO_FICHA` = ? 
		WHERE `ID_NEOCOSUR`= ? "; 
		//echo "query".$query;
		//die;  
		$this->conexionDao->Abrir();
		
		$sentencia = $this->conexionDao->prepare($query);		
		
		$sentencia->bind_param("si", 
			$ingreso->ID_ESTADO_FICHA,  
			$ingreso->ID_NEOCOSUR	);	
		if(!$sentencia->execute()) { 
				 $sentencia->close();
					  return false;
		}
		$retorno=$sentencia->execute(); 
		$this->conexionDao->Cerrar();
		return $retorno; 
	}
	 /**
       * This function checks to see if a user is logged in. 
       */

      function check_user_session() {
			 session_start();
			 if($_SESSION['id_responsable'] && $_SESSION['usuario']) {
			   return true;
			 }
			 return false;
      }

}
