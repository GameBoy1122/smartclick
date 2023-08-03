<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Language extends CI_Controller

{

  function __construct()

  {

    parent::__construct();
  }



  public function change($Language)

  {
    if (empty($Language)) {
      die();
    }

    if ($Language == "th") {
      $this->session->set_userdata("CURRENT_LANGUAGE", "th");
    } elseif($Language == "en") {
      $this->session->set_userdata("CURRENT_LANGUAGE", "en");
    } elseif($Language == "ae") {
      $this->session->set_userdata("CURRENT_LANGUAGE", "ae");
    }
    
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("Location: $previous_page");
  }
}
