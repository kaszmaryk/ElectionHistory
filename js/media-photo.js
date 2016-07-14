$(document).ready(function(){
    var $state = 0;
    $(".tests-add").on('click', function(){
        if($state == 0) {
            $('.send-photo-form').slideDown();
            $state++;
        }else {
            $('.send-photo-form').slideUp();
            $state = 0;
        }
    });
});
