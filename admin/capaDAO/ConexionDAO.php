
<?php
include 'ConfigDAO.php';

class ConexionDAO
	{
		private $mysqli;
		private $conexion;
		private static $instance;
        private $id;
                
      public function setId($id='')
                {
                        $this->id = $id;
                        return true;
                }

                public function getId()
                {

                        return $this->id;
                }
		/* 
		 * CONSTRUCTOR POR DEFECTO DE LA CLASE ConexionDAO
		 */
		public  function __construct()
		{
 			$this->conexion = new ConfigDAO();

		}

		/*  FUNCIÓN Abrir
		 *	Permite abrir la conexión a la base de datos */
		public function abrir()
		{
			$this->mysqli = new mysqli($this->conexion->servidor, $this->conexion->usuario, $this->conexion->password, $this->conexion->bd );
			//Consulta si hubo un error
			if ($this->mysqli->connect_error) 
			{
				die("Error : ".$this->mysqli->connect_error);
			}

			
		}



		/*  FUNCIÓN Cerrar
		 *	Permite Cerrar la conexión de la base de datos */
		public function cerrar()
		{
			$this->mysqli->close();
		}

		/*  FUNCIÓN Select
		 *  @param query: Una consulta SQL en formato CADENA de tipo SELECT
		 *	@return Obtiene los datos de una consulta de tipo SELECT en formato ARRAY */
		public function select($query)
		{			
			$resultado = $this->mysqli->query($query);
			//print_r($resultado);
			return $resultado;
		}
		public function prepare($query)
		{			
			$stm = $this->mysqli->prepare($query);
			return $stm;
		}
		
		
		/*  FUNCIÓN InsertUpdateDelete
		 *  @param query: Una consulta SQL en formato CADENA de tipo Insert, Update o DELETE
		 *	@return Devuelve TRUE si hubieron filas afectadas, false sino hubo. */
		public function insertUpdateDelete($query)
		{
			$comprobador = FALSE;
			if($this->mysqli->query($query) == TRUE)
			{
				if($this->mysqli->affected_rows > 0)
				{
                                    $vari = $this->mysqli->insert_id;
                                    $this->setId($vari);
					$comprobador = TRUE;
				}
			}
			return $comprobador;
		}
      public function ultimo(){
			 $vari = $this->mysqli->insert_id;
			  $this->setId($vari);
			 return $vari;
		}	           
      public function test_input($data) {
		  $data = trim($data);
		$data = str_ireplace("SELECT","",$data);
		$data = str_ireplace("COPY","",$data);
		$data = str_ireplace("DELETE","",$data);
		$data = str_ireplace("DROP","",$data);
		$data = str_ireplace("DUMP","",$data);
		$data = str_ireplace(" OR ","",$data); 
		$data = str_ireplace("%","",$data);
		$data = str_ireplace("LIKE","",$data);
		$data = str_ireplace("--","",$data);
		$data = str_ireplace("^","",$data);
		$data = str_ireplace("[","",$data);
		$data = str_ireplace("]","",$data);
		$data = str_ireplace("\ ","",$data);
		$data = str_ireplace("!","",$data);
		$data = str_ireplace("¡","",$data);
		$data = str_ireplace("?","",$data);
		$data = str_ireplace("=","",$data);
		$data = str_ireplace("&","",$data);
		$data = str_ireplace(";","",$data);
		$data = str_ireplace("'","",$data);
		$data = str_ireplace("*","",$data);
		$data = str_ireplace("ALTER","",$data);
		$data = str_ireplace(" AND ","",$data);
		$data = str_ireplace("TABLE","",$data);
		$data = str_ireplace("CREATE","",$data);
		$data = str_ireplace("WHERE","",$data);
		$data = str_ireplace("INNER","",$data);
		$data = str_ireplace("Boolean","",$data);
		$data = str_ireplace("HAVING","",$data);
		$data = str_ireplace("UNION","",$data);
		$data = str_ireplace("if(","",$data);
		$data = str_ireplace("sysdate()","",$data);
 		 	
  			$data = addslashes($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);  
  			$data = strip_tags($data);  

			return $data;
	   }


	static function get_instance() {
    if(!self::$instance) {
      self::$instance = new ConexionDAO;
    }
    return self::$instance;
    }
		
                
}