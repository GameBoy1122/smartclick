(function($) {
    $.fn.mnFileInput = function(params) {
        this.change(function(e) {
          $valueDom = $(this).closest('.customFile').find('.selectedFile');
          // $valueDom.addClass('inProgress');
          var filename = $('.customFile').data('label');
          if(e.target){
            var fullPath = e.target.value;
            filename = fullPath.replace(/^.*[\\\/]/, '');
            $valueDom.text(filename);
            // $valueDom.removeClass('inProgress');
          }
        });
    };
})(jQuery);

$(".customFile > input").mnFileInput();