$(document).ready(function(){
	
	$('.navbar-nav').on('click','.dropdown-item',function(){
		
		var nueva_vista = $(this).data('nav');
		
		cargarDiv('view/'+nueva_vista);
		
	});
	
	fecha();
	
});


function cargarDiv(url){
	$('#cuerpo').load(url+'.php');
}

function fecha(){
	var d = new Date();

	var mes = d.getMonth()+1;
	var dia = d.getDate();

	var fecha_actual =  "Fecha: " + (dia<10 ? '0' : '') + dia + '/' + (mes<10 ? '0' : '') + mes + '/' + d.getFullYear();

	$('#fecha').html('<strong>'+fecha_actual+'</strong>');
}