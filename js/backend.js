"use strict";

$(document).ready(function(){
	$('.close-flash').click(function(){
		$(this).parent('.flash').fadeOut('fast');
	});

	$('.on.enabled, .off.disabled').click(function(){
		return false;
	});
});