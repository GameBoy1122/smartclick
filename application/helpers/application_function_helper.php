<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// MAIN ASSETS DIRECTORY
function forwardGetParams ($params){
    if(count($params) > 0){
        return "?".http_build_query($params);
    }else{
        return "";
    }
}

