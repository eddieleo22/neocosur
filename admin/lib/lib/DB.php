<?php
  /**
   *
   * DB.php
   * 
   * This code is part of a tutorial on using the Open Web Application Security Project (OWASP)
   * Enterprise Security API (ESAPI) project. It is extremely insecure! Please do not use
   * this in any kind of production environment. 
   * 
   * @author jackwillk
   * @created 2010 
   * 
   */

class DB {
  
  /**
   * This class provides the barest wrapper for MySQL
   */ 

  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $db_name = "neocosur_prueba";
  private static $instance;

  private function __construct() {
    $this->connect();
  }

  function connect() {
    $this->connection = mysql_connect($this->host, $this->username, $this->password);
    if(!$this->connection) {
      echo(mysql_error());
    }
    mysql_select_db($this->db_name);
  }

  function query($sql) {
    $result = mysql_query($sql, $this->connection);
    if(!$result) {
      echo(mysql_error());
    }
    return $result;
  }

  function count_rows($result) {
    return mysql_num_rows($result);
  }
  
  function fetch_assoc($result) {
    return mysql_fetch_assoc($result);
  }

  static function get_instance() {
    if(!self::$instance) {
      self::$instance = new DB;
    }
    return self::$instance;
    }

  }

?>
