$(document).ready(function(){
	
	
	$('.navbar-nav').on('click','.dropdown-item',function(){
		
		var nueva_vista = $(this).data('nav');
		
		cargarDiv('view/'+nueva_vista);
		
	});
	
});


function cargarDiv(url){
	$('#cuerpo').load(url+'.php');
}
