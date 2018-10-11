<?php
//include ('IngresoDAO.php');
  /**
   *
   * User.php
   * 
   * This code is part of a tutorial on using the Open Web Application Security Project (OWASP)
   * Enterprise Security API (ESAPI) project. It is extremely insecure! Please do not use
   * this in any kind of production environment 
   * 
   * @author jackwillk
   * @created 2010
   *
   */

require_once ("../../admin/lib/lib/owasp/src/ESAPI.php");
require_once("../../admin/lib/lib/owasp/src/reference/BlogValidator.php");
require_once("../../admin/lib/lib/owasp/src/reference/BlogHTTPUtilities.php");
class User {
	
	
	private  $id;
	private  $pais;
	private  $centro;
	private  $perfil;
	private  $id_responsable;
	private  $id_centro;
	private  $usuario; 
	private  $password; 
	private  $us_id_user; 
	private  $salt; 
	private  $ingresoDAO;
	private static $instanceUser;
	
	
	private $httputils = null;
	private $logged_in = null;
	private $expire_time = 600;
	
	
	public function __construct($usuario) {
    $this->esapi = new ESAPI("../../admin/lib/lib/owasp/test/testresources/ESAPI.xml");
    ESAPI::setHTTPUtilities(new BlogHTTPUtilities());
    $this->httputils = ESAPI::getHTTPUtilities();
    $this->logged_in = 0;
    $this->usuario = $usuario;
    if($this->check_user_session()==0) {
     if($this->retrieve_user()==0) {
				$this->logged_in = 1;
		  } 
		  
		} 
	}

	public function setId($id='')
		{
		$this->id = $id;
		return 1;
		}

		public function getId()
		{
		return $this->id;
		}
	
	
	
  
	function set_password($password) {
    $this->password = $password;
	  }

	  function get_password() {
		return $this->password;
	  }

	  function get_token() {
		return $this->httputils->getCSRFToken();
	  }

	  function get_logged_in() {
		return $this->logged_in;
	  }
	  
	  function set_logged_in($logged_in) {
		$this->logged_in = $logged_in;
	  }
  
  
  /*
     public function __construct() {

		 if($this->check_user_session()) {
		
		   $this->pais=$_SESSION['pais'];
		   $this->centro=$_SESSION['centro'];
		   $this->perfil=$_SESSION['perfil'];
		   $this->id_responsable=$_SESSION['id_responsable'];
		   $this->id_centro=$_SESSION['id_centro'];
		   $this->usuario=$_SESSION['usuario'];
		 }
		
      }
	  */
	  

     function get_user_id() {
		return $this->us_id_user;
      }

      function set_user_id($us_id_user) {
		$this->us_id_user = $us_id_user;
      }
 /*
      function get_username() {
 return $this->username;
      }

      function set_username($username) {
 $this->username = $username;
      } 
	  */
	  
	public function guarda($usuario)
		{
		 $db = ConexionDAO::get_instance();	 
		$this->username = $usuario->us_usuario;
			if(!$this->salt) {
					  $this->gen_salt();
			} 
			
		$usuario->us_password = $this->hash_pass($usuario->us_password, $this->salt);	
       $query ="INSERT INTO `usuario` ( 
					`us_id_perfil`, 
                    `us_id_centro`,
                    `us_nombres`, 
                    `us_ape_paterno`, 
                    `us_ape_materno`, 
                    `us_usuario`,
                    `us_email`,
                    `us_password`, 
                    `us_salt`, 
                    `us_fecha_crea`,
                    `us_fecha_modi`,
                    `us_activo`)
				VALUES
					(?,?,?,?,?,?,?,?,?,?,?,?);";
		$db->Abrir();
		$sentencia = $db->prepare($query);		
		$sentencia->bind_param("ssssssssssss",
					$usuario->us_id_perfil,
					$usuario->us_id_centro,
					$usuario->us_nombres,
					$usuario->us_ape_paterno,
					$usuario->us_ape_materno,
					$usuario->us_usuario,
					$usuario->us_email,
					$usuario->us_password,
					$this->salt,
					$usuario->us_fecha_crea,
					$usuario->us_fecha_modi,
					$usuario->us_activo 
					);
			//die;
		$retorno=$sentencia->execute(); 
		$idLast = $db->ultimo();
		
		$this->setId($idLast );
		
		//var_dump($retorno);die;
		$db->Cerrar();
		return $retorno;
	}
	  
	  
	  
	  
	  
	  
	 public function actualizarBasico($usuario)
	 {		
	 $db = ConexionDAO::get_instance();	 
            //$this->conexionDao =$conexionDao;

		$query="select 		 
					pf_descripcion as 'perfil' ,
					us_salt as 'salt'
					from usuario us  
						 inner join perfil_user pf   on us.us_id_perfil=pf.pf_id_perfil and  pf.activo=1 
					where us_usuario = ? ;";
		
		// $user = mysql_real_escape_string($user);	
		$db->Abrir();
		$sentencia = $db->prepare($query);
		$sentencia->bind_param("s", $usuario->us_usuario );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();

		
		//$retorno = $db->select($query);						
		//$row = $retorno->fetch_assoc();
		$db->Cerrar();
		$perfil= $row['perfil']; 
		$this->salt= $row['salt'];	
		
	
		
		$usuario->us_password = $this->hash_pass($usuario->us_password, $this->salt);
		$query = "UPDATE usuario SET 
						us_nombres=	 ? ,
						us_ape_paterno=	? ,
						us_ape_materno=	? ,
						us_usuario=	? ,
						us_email= ? ,
						us_password= ? ,
						us_salt= ? ,
						us_fecha_modi= ?
						  WHERE `us_id_user`= ? ";
	
				
		//die;
                //$this->conexionDao->Abrir();
		
		$db->Abrir();
		$sentencia = $db->prepare($query);		
		$sentencia->bind_param("sssssssss",
					$usuario->us_nombres,
					$usuario->us_ape_paterno,
					$usuario->us_ape_materno,
					$usuario->us_usuario,
					$usuario->us_email,
					$usuario->us_password,
					$this->salt,
					$usuario->us_fecha_modi,
					$usuario->us_id_user 
					);
		
		
		if(!$sentencia->execute()) {
		  $this->error_list[] = "Could not update.";
		  $sentencia->free_result();
		  return 0;
		}
		
		
		$retorno=$sentencia->execute(); 
		//$idLast = $this->conexionDao->ultimo();
		//$this->setId($this->conexionDao->getId());
		//var_dump($retorno);die;
		$db->Cerrar();
		return $retorno; 
		}

      /**
       * This function will check a user submitted username and password against 
       * the database. If it exists, it sets up a new session
      */
      function loginUser($username, $password,$db) {
	
		//echo "<br> username ---> ".$username;
		$query="select 		 
					pf_descripcion as 'perfil' ,
					us_salt as 'salt'
					from usuario us  
						 inner join perfil_user pf   on us.us_id_perfil=pf.pf_id_perfil and  pf.activo=1 
					where us_usuario = ? ;";
		
		// $user = mysql_real_escape_string($user);	
		$db->Abrir();
		$sentencia = $db->prepare($query);
		$sentencia->bind_param("s", $username );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$row = $resultado->fetch_assoc();

		
		//$retorno = $db->select($query);						
		//$row = $retorno->fetch_assoc();
		$db->Cerrar();
		$perfil= $row['perfil']; 
		$salt= $row['salt']; 
		//echo "<br> perfil ---> ".$perfil;
		//echo "<br> salt ---> ".$salt;
		$password2 = $this->hash_pass($password, $salt);
		//echo "<br> password2 ---> ".$password2;
		//die;
			if($perfil=='Administrador' || $perfil =='Supervisor' || $perfil=='Estadistico' ) {
				$inner = "   ";
				$mostrarCampo = " 'id_centro', 'centro', 'pais', " ;
				
			}
			else { 
				$inner = " inner join  centro c on c.c_id_centro =us_id_centro and c_activo=1 ";
				$mostrarCampo .=" c_id_centro as 'id_centro', c_nombre as 'centro', c_id_pais as 'pais',";
			}
		
		
		$query="select 
		us_id_user as  'id_responsable',
		".$mostrarCampo ."
		
		
		pf_descripcion as 'perfil',
		us.us_id_user as 'us_id_user',
		us.us_nombres as 'usuario',
		us.us_password as 'password',
		us.us_salt as 'salt'
		from usuario us 
		    ".$inner."
			
			 inner join perfil_user pf   on us.us_id_perfil=pf.pf_id_perfil and  pf.activo=1 
		where us_usuario = ? 
				AND us_password = ? 
				AND us_activo = 1;";
		

		$db->Abrir();
		$sentencia = $db->prepare($query); 
		$sentencia->bind_param('ss',$username,$password2);	 
		 if(!$sentencia->execute()) {
			  $this->error_list[] = "Could not log in.";
			  $sentencia->close();
			  return 0;
			}

		$sentencia->store_result();
		if($sentencia->num_rows() != 1) { 
		  $this->error_list[] = "Could not log in.";
		  $sentencia->free_result();
		  return 0;
		}
			
		 $sentencia->bind_result($id_responsable,$id_centro, $centro,$pais,$perfil,$usuario,$us_id_user,$stored_pass,$salt);
		// $sql->bind_result($pais, $centro,$centro, $stored_pass, $salt);
			$sentencia->fetch();
			$sentencia->free_result();
			$sentencia->close();
			
		if($this->hash_pass($password, $salt) != $stored_pass) {
		  $this->error_list[] = "Invalid password.";
		  return 0;
		}
		
		
	
		//die;
			$this->pais=$pais;
			$this->centro=$centro;
			$this->perfil=$perfil;
			$this->id_responsable=$id_responsable==''?  '99999' :  $id_responsable;
			$this->id_centro=$id_centro;
			$this->usuario=$usuario;
			   
			$this->salt = $salt;
		if(!$this->create_user_session()) {
			  return 0;
		}
		
		return 1;
	
		//$sentencia->execute(); 
		/*$resultado = $sentencia->get_result(); 
		$row = $resultado->fetch_assoc(); 
		$db->Cerrar();
		$resp=$row;

		if($resp!=null) {
			   //$row = $db->fetch_assoc($result);
				
			   		   $this->pais=$resp['pais'];
					   $this->centro=$resp['centro'];
					   $this->perfil=$resp["perfil"];
					   $this->id_responsable=$resp["id_responsable"]==''?  '99999' :  $resp["id_responsable"];
					   $this->id_centro=$resp["id_centro"];
					   $this->usuario=$resp["usuario"];
			//print_r($this);
			
			   $this->create_user_session();
			 }
		return $row;*/
      }
 
      /**
       * This function is used to start a session and set initial variables
             }
		*/ 

      private function create_user_session() {
		 session_start();
			if(!session_regenerate_id(1)) {
					$this->error_list[] = "Could not create user session. Please try again";
					return 0;
				} 
    $this->httputils->setCSRFToken();
			 $_SESSION['pais']=$this->pais;
			 $_SESSION['centro']=$this->centro;
		     $_SESSION['perfil']=$this->perfil;
		     $_SESSION['id_responsable']=$this->id_responsable;
			 $_SESSION['id_centro']=$this->id_centro;
		     $_SESSION['usuario']=$this->usuario;
		     $_SESSION['token']=$this->httputils->getCSRFToken();
		     $_SESSION['csrf']=sha1($this->httputils->getCSRFToken());
			 $_SESSION['expire_time'] = time() + $this->expire_time;
		 return 1;	
	  }

      /**
       * This function checks to see if a user is logged in. 
       */

    public function check_user_session() {
	 session_start();	
    $token = $_GET['token'];
    if(!$token) {
      $token = $_POST['token'];
    } 
    if(!$token) {
      return 0;
    }
   
    if(!$this->httputils->verifyCSRFToken($token)) {
      $this->error_list[] = "Could not verify session.";
	  	session_unset();
		session_destroy();
		ob_start();
		ob_end_flush();
      return 0;
    }
    
    if(!$_SESSION['expire_time'] || time() > $_SESSION['expire_time']) {
      $this->expire_session();
      $this->error_list[] = "Session_expired";
	  	session_unset();
		session_destroy();
		ob_start();
		ob_end_flush();
      return 0;
    }

    if(!$_SESSION['id_responsable']) {
      $this->error_list[] = "Session not found.";
		session_unset();
		session_destroy();
		ob_start();
		ob_end_flush();
      return 0;
    } else {
      $this->user_id = $_SESSION['id_responsable'];
    }


    $this->update_expire_time();
	
		 if($_SESSION['id_responsable'] && $_SESSION['perfil']) {
		   return 1;
		 }
		 return 0;
      }
	 
	function expire_session() {
		session_destroy();
	}

	  function update_expire_time() {
		$_SESSION['expire_time'] = time() + $this->expire_time;
	  }
	 
	 
 private function retrieve_user() {
	//include "ConexionDAO.php";	 
	if(!$this->user_id) {
      $this->error_list[] = "No user to retrieve!";

      return 0;
    }
	
    
    $db = ConexionDAO::get_instance();	
	$db->Abrir();
	 $query="SELECT us.us_usuario as 'usuario',us.us_password as 'password' FROM usuario us WHERE us_usuario = ? ; ";
	$sentencia = $db->prepare($query);
	$usuario = $this->usuario;
   $sentencia->bind_param('s', $usuario); 
    if(!$sentencia->execute()) {
      $this->error_list[] = "Could not retrieve user.";
      $sentencia->close();
      return 0;
    }
    $sentencia->store_result();
    if($sentencia->num_rows() != 1) {
      $this->error_list[] = "Could not retrieve user";
      $sentencia->free_result();
      $sentencia->close();
      return 0;
    }
    $sentencia->bind_result($this->usuario, $this->password);
    $sentencia->fetch();
    $sentencia->free_result();
    $sentencia->close();
    return 1;
  }
	
	private function gen_salt(){
		$this->salt = rand(1,100000) . time() . $this->username . rand(1,100000);
	}

	private function hash_pass($password, $salt) {
		$pass= md5($password.$salt);
	return md5($password.$salt);
	}
	
	public function verifyCSRFToken($token) {  
		  if(!$this->getCSRFToken() == $token) {
			 throw new IntrusionException('Authentication failed.', 'Possibly forged HTTP request without proper CSRF token detected.');
			 return 0;
		  }
		  return 1;
		  
	}
	 
	  static function get_instanceUser() {
			if(!self::$instanceUser) {
			  self::$instanceUser = new User;
			}
			return self::$instanceUser;
		}
	  	public function __get($property) 
		{
			if (property_exists($this, $property)) 
			{
				return $this->$property;
			}
		}

		public function __set($property, $value) 
		{
			if (property_exists($this, $property)) 
			{
				$this->$property = $value;
                        }
		}
		
		
}

?>