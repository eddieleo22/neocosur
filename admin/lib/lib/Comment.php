<?php
  /**
   *
   * Comment.php
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

class Comment {

  private $comment_id = null;
  private $comment = null;
  private $content_id = null;
  private $date_created = null;
  private $esapi = null;
  private $encoder = null;
  private $validator = null;
  private $error_list = null;

  function __construct($comment_id = '') {
    $this->esapi = new ESAPI("/var/www/insecure_week2/lib/owasp/test/testresources/ESAPI.xml");
    ESAPI::setEncoder(new DefaultEncoder());

    ESAPI::setValidator(new BlogValidator());
    $this->encoder = ESAPI::getEncoder();
    $this->validator = ESAPI::getValidator();
    if($comment_id) {
      $this->retrieve_comment($comment_id);
    }
  }

  function get_comment_id() {
    return $this->comment_id;
  }

  function set_comment_id($comment_id) {
    $comment_id = $this->canonicalize($comment_id);
    if($this->validator->isValidNumber("Comment ID", $comment_id, 1, 65535, false)) {
      $this->comment_id = $comment_id;
    } else {
      $this->error_list[] = $this->validator->getLastError();
    }
    
  }

  function get_comment() {
    return $this->comment;
  }

  function set_comment($comment) {
    $comment = $this->canonicalize($comment);
    if($this->validator->isValidPrintable("Comment", $comment, 140, false)) {
      $this->comment= $comment;
    } else {
      $this->error_list[] = $this->validator->getLastError();
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

  function get_date_created() {
    return $this->date_created;
  }
  
  function set_date_created($date_created) {
    $date->created = $this->canonicalize($date_created);
    if($this->validator->isValidDate("Content date created", $date_created, "Y-m-d H:i:s", false)) {
      $this->date_created = $date_created;      
    } else {
      $this->error_list[] = $this->validator->getLastError();
    }

  }

  function write() {
    $db = DB::get_instance();
    $sql = "insert into comments (comment, content_id, date_created) values ('" . $this->comment . "', '" . $this->content_id . "', '" . date("Y-m-d") . "')";
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

  function clear_error_list() {
    $this->error_list = null;
  }

  function get_error_list() {
    return $this->error_list;
  }

  function retrieve_comment($comment_id) {
    $db = DB::get_instance();
    $sql = "SELECT * FROM comments WHERE id = " . $comment_id;
    $result = $db->query($sql);
    $row = $db->fetch_assoc($result);
    $this->comment_id = $row['comment_id'];
    $this->comment = $row['comment'];
    $this->content_id = $row['content_id'];
    $thisw->date_created = $row['date_created'];
  }

}

?>
