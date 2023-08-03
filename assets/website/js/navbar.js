jQuery(document).ready(function($) {
  var alterClass = function() {
  var ww = document.body.clientWidth;
    if (ww < 992) {
      $('.navbar').addClass('fixed-top');
    } 
    else if (ww >= 992) {
          $('.navbar').removeClass('fixed-top');
        };
    };
    $(window).resize(function(){
        alterClass();
    });
    //Fire it when the page first loads:
    alterClass();
});