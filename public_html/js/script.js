$(function(){
	$('#add').click(function(){
		if ($('.add-to-trash').css('display')=='none')
			$('.add-to-trash').fadeIn(300);
		else
			$('.add-to-trash').fadeOut(300);

	});

	$('#cancel').click(function(){
		$('.add-to-trash').fadeOut(300);
	});
});