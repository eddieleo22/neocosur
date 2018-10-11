<?php
  /**
   *
   * Content.php
   * 
   * This code is part of a tutorial on using the Open Web Application Security Project (OWASP)
   * Enterprise Security API (ESAPI) project. It is extremely insecure! Please do not use
   * this in any kind of production environment 
   * 
   * @author jackwillk
   * @created 2010
   *
   */

require_once("owasp/src/ESAPI.php");
require_once("owasp/src/reference/BlogValidator.php");

class Content {
  private $content_id = null;
  private $user_id = null;
  private $title = null;
  private $content = null;
  private $date_created = null;
  private $esapi = null;
  private $encoder = null;
  private $validator = null;
  private $error_list = null;

  function __construct($content_id = '') {
    $this->esapi = new ESAPI("/var/www/insecure_week2/lib/owasp/test/testresources/ESAPI.xml");
    ESAPI::setEncoder(new DefaultEncoder());
    ESAPI::setValidator(new BlogValidator());
    $this->encoder = ESAPI::getEncoder();
    $this->validator = ESAPI::getValidator();
    if($content_id) {
      $this->retrieve_content($content_id);
    }
  }

  function get_content_id() {
    return $this->content_id;
  }

  function set_content_id($content_id) {
    $content_id = $this->canonicalize($content_id);
    if($this->validator->isValidNumber("Content ID", $content_id, 1, 65535, false)) {
      $this->content_id = $content_id;
    } else {
      $this->error_list[] = $this->validator->getLastError();
    }

  }

  function get_user_id() {
    return $this->user_id;
  }

  function set_user_id($user_id) {
    $user_id = $this->canonicalize($user_id);
    if($this->validator->isValidNumber("User ID", $user_id, 1, 10000, false)) {
      $this->user_id = $user_id;
    } else {
      $this->error_list[] = $this->validator->getLastError();
    }
       
  }

  function get_title() {
    return $this->title;
  }

  function set_title($title) {
    $title = $this->canonicalize($title);
    if($this->validator->isValidPrintable("Post Title", $title, 140, false)) {
      $this->title = $title;
    } else {
      $this->error_list[] = $this->validator->getLastError();
    }
  }

  function get_content() {
    return $this->content;
  }
  
  function set_content($content) {
    $content = $this->canonicalize($content);
    if($this->validator->isValidPrintable("Post Content", $content, 65535, false)) {
      $this->content = $content;
    } else {
      $this->error_list[] = $this->validator->getLastError();
    }

  }

  function get_date_created() {
    return $this->date_created();
  }

  function set_date_created($date_created) {
    $date_created = $this->canonicalize($date_created);
    if($this->validator->isValidDate("Content date created", $date_created, "Y-m-d H:i:s", false)) {
      $this->date_created = $date_created;
    } else {
      $this->error_list[] = $this->validator->getLastError();
    }

  }

  function clear_error_list() {
    $this->error_list = null;
  }

  function get_error_list() {
    return $this->error_list;
  }

  private function retrieve_content($content_id) {
    $db = DB::get_instance();
    $sql = "SELECT * FROM content WHERE id = " . $content_id;
    $result = $db->query($sql);
    $row = $db->fetch_assoc($result);
    $this->content_id = $row['id'];
    $this->user_id = $row['user_id'];
    $this->title = $row['title'];
    $this->content = $row['content'];
    $this->date_created = $row['date_created'];
  }

  function write() {
    $db = DB::get_instance();
    $sql = "INSERT INTO content (user_id, title, content, date_created) values ('" . $this->user_id . "', '" . $this->title . "', '" . $this->content . "', '" . date("Y-m-d") . "')";
    $result = $db->query($sql);
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

  }

?>
