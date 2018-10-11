<?php
//include 'ConexionDAO.php';
//include './coneglobal.php';
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
class usuarioDAO  {
 
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
        public function actualizarBasico($usuario)
		{		

            
		$query = "UPDATE usuario SET 
						us_nombres=	 ? ,
						us_ape_paterno=	? ,
						us_ape_materno=	? ,
						us_usuario=	? ,
						us_email= ? ,
						us_password= ? ,
						us_fecha_modi= ?
						  WHERE `us_id_user`= ? ";

		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("ssssssss",
					$usuario->us_nombres,
					$usuario->us_ape_paterno,
					$usuario->us_ape_materno,
					$usuario->us_usuario,
					$usuario->us_email,
					$usuario->us_password,
					$usuario->us_fecha_modi,
					$usuario->us_id_user 
					);
		
		$retorno=$sentencia->execute(); 
		$idLast = $this->conexionDao->ultimo();

		$this->conexionDao->Cerrar();
		return $retorno; 
		}
		
		public function actualizarPermiso($usuario)
		{		

            
		$query = "UPDATE usuario SET 
						us_id_perfil= ? ,
						us_id_centro= ? ,
						us_fecha_modi=	? ,
						us_activo=	? 
						  WHERE `us_id_user`= ?  ";
						  
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssss",
					$usuario->us_id_perfil,
					$usuario->us_id_centro,
					$usuario->us_fecha_modi,
					$usuario->us_activo,
					$usuario->us_id_user				
					);

		$retorno=$sentencia->execute(); 
				$idLast = $this->conexionDao->ultimo();
		$this->setId($this->conexionDao->getId());

		$this->conexionDao->Cerrar();
		return $retorno;	
                
		}
		
       
    public function guarda($usuario)
	{
		
		
       $query ="INSERT INTO `usuario` ( 
					`us_id_perfil`, 
                    `us_id_centro`,
                    `us_nombres`, 
                    `us_ape_paterno`, 
                    `us_ape_materno`, 
                    `us_usuario`,
                    `us_email`,
                    `us_password`, 
                    `us_fecha_crea`,
                    `us_fecha_modi`,
                    `us_activo`)
				VALUES
					(?,?,?,?,?,?,?,?,?,?,?);";
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);		
		$sentencia->bind_param("sssssssssss",
					$usuario->us_id_perfil,
					$usuario->us_id_centro,
					$usuario->us_nombres,
					$usuario->us_ape_paterno,
					$usuario->us_ape_materno,
					$usuario->us_usuario,
					$usuario->us_email,
					$usuario->us_password,
					$usuario->us_fecha_crea,
					$usuario->us_fecha_modi,
					$usuario->us_activo 
					);

		$retorno=$sentencia->execute(); 
				$idLast = $this->conexionDao->ultimo();
		$this->setId($this->conexionDao->getId());

		$this->conexionDao->Cerrar();
		return $retorno;
	}
      
	public function  buscarId($id)
	{
  
		$query = "select  *  from usuario WHERE us_id_user= ? ;";
        
		
		$this->conexionDao->Abrir();
		$sentencia = $this->conexionDao->prepare($query);
		$sentencia->bind_param("i", $id );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();

		

		if ($resultado)
		{
			$row = $resultado->fetch_assoc();
		}
		else {
			$row = null;
		}

		$this->conexionDao->Cerrar();
		return $row;
	}
	
	  
	public function login($user,$password){
		
		$query="select 
		us_id_user as as 'id_responsable',
		c_id_centro as 'id_centro',
		c_nombre as 'centro',
		pf_descripcion as 'perfil'
		from usuario us inner join  centro c on c.c_id_centro =us_id_centro and c_activo=1
			 inner join perfil_user pf   on us.us_id_perfil=pf.pf_id_perfil and pf_activo=1 
		where us_usuario = $user
				AND us_password =$password
				AND us_activo = 1;";
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);						
		$row = $retorno->fetch_assoc();
		$this->conexionDao->Cerrar();
		return $row;
	}
	
	public function  filtroUsuario($query)
	{ 
		$this->conexionDao->Abrir();
		$retorno = $this->conexionDao->select($query);	
		$this->conexionDao->Cerrar();
		return $retorno;
	}
			

}
