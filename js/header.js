$(document).ready(function() {
    $('.sys-message').fadeOut(8000);
	$('#entry-button').on('click', function() {
		if($('#entry-button').hasClass('on')) {
			$('#entry-button').removeClass('on');
			$('.entry-form').hide();
		} else {
			$('#entry-button').addClass('on');
			$('.entry-form').show();
		}
	});
});