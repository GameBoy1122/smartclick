<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// MAIN ASSETS DIRECTORY
function assetsDirectory ($destination){
    return base_url().'assets/'.$destination;
}
function uploadsDirectory ($destination){
    return base_url().'assets/uploads/'.$destination;
}

function faviconDirectory ($destination){
    return base_url().'assets/website/Favicon/'.$destination;
}
function flagDirectory ($destination){
    return base_url().'assets/website/Flag/'.$destination;
}
function fontDirectory ($destination){
    return base_url().'assets/website/Font/'.$destination;
}
function logoDirectory ($destination){
    return base_url().'assets/website/Logo/'.$destination;
}

