jQuery(document).ready(function($) {
    $( "#datepicker" ).datepicker();

	var sortList = $('ul#custom-type-list');
	var animation= $('#loading-animation');
	var pageTitle= $('div h2');
	sortList.sortable({
update:function(event,ui)
{
	animation.show();
	$.ajax({
		url:'/wp-admin/admin-ajax.php',
		type:'POST',
		dataType:'json',
		data:{
			action: 'save_sort',
			order: sortList.sortable('toArray').toString(),
			security: WP_HOUSE_LISTING.security
		},
		success:function(response){

$('div#message').remove();
pageTitle.after('<div id="message" class="updated"><p>'+WP_HOUSE_LISTING.success+'</p></div>');
animation.hide();
		},
		error:function(error){
$('div#message').remove();
pageTitle.after('<div id="message" class="error"><p> Ошибка сохранения</p></div>');
animation.hide();
		}
	});
}

	})
})