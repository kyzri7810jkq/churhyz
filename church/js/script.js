
$(function(){
	$('.deleteme').click(function(){
		var info = $(this).data('info')
		if(confirm('You are going to delete ' + info + ', are you sure?')){
			return true;
		}
		return false;
	});
});