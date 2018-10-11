<?php

/******************************************************************************
* Class for neocosur.ingreso
*******************************************************************************/
require_once "/var/www/html/neocosur/admin/lib/owasp/src/ESAPI.php";
require_once("/var/www/html/neocosur/admin/lib/owasp/src/reference/BlogValidator.php");

class UserValidate
{
	
	private $us_id_user;
	private $id_neocosur;
	private $idControl;
	private $esapi = null;
	private $encoder = null;
	private $validator = null;
	private $error_list = null;
	private static $instanceUserValidate;
	
	private $httputils = null;
	private $logged_in = null;
	private $salt = null;
	private $expire_time = 600;
	
	
        function __construct()
	 	{
	 		
			$this->esapi = new ESAPI("/var/www/html/neocosur/admin/lib/owasp/test/testresources/ESAPI.xml");
			ESAPI::setEncoder(new DefaultEncoder());
			ESAPI::setValidator(new BlogValidator());
			$this->encoder = ESAPI::getEncoder();
			$this->validator = ESAPI::getValidator();
			

	 	}
	function set_id($id) {
			$id = $this->canonicalize($id);
			if($this->validator->isValidNumber("ID", $id, 1, 65535, false)) {
			  $this->id = $id;
			} else {
			  $this->error_list[] = $this->validator->getLastError();
			}

		  }

	  function get_id() {
		return $this->id;
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
		
	 function clear_error_list() {
		$this->error_list = null;
	  }

	  function get_error_list() {
		return $this->error_list;
	  }
	  
		function canonicalize($input) {
		try {
		  $input = $this->encoder->canonicalize($input);
		} catch (IntrusionException $e) {
		  echo($e->getUserMessage());
		  exit();
		}
		return $input;
	  }
	  
	  static function get_instanceUserValidate() {
			if(!self::$instanceUserValidate) {
			  self::$instanceUserValidate = new UserValidate;
			}
			return self::$instanceUserValidate;
		}
	  
	private function gen_salt() {
	$this->salt = rand(1,100000) . time() . $this->username . rand(1,100000);
	}

	private function hash_pass($password, $salt) {
	return md5($password.$salt);
	}  
	  
   public function verifyCSRFToken($token) {  
	  if(!$this->getCSRFToken() == $token) {
		 throw new IntrusionException('Authentication failed.', 'Possibly forged HTTP request without proper CSRF token detected.');
		 return false;
			  }
			  return true;
		  
	}
	  
	  
	  
}