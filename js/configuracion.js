$(document).ready(function(){
	
	$.ajax({
		url: 'api/api.php/configuracion',
		type: 'GET',
		dataType: 'JSON',
		success:function(data){
			$(data.data).each(function(i,v){
				$('#txt_taza').val(v.taza_financiamiento);
				$('#txt_enganche').val(v.enganche);
				$('#txt_plazo').val(v.plazo_maximo);
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError: " + err);
		}
	});
	
	$('#btn_aceptar_configuracion').click(function(){
		
		var datos = {
			"taza" : parseFloat($('#txt_taza').val()),
			"enganche" : $('#txt_enganche').val(),
			"plazo" : $('#txt_plazo').val(),
		}
	
		$.ajax({
			url: 'api/api.php/configuracion',
			data: datos,
			type: 'POST',
			success:function(data){
				swal({
					title: "¡Bien hecho!",
					text: "La configuracion ha sido registrada correctamente.",
					type: "success",
					timer: 3000
				});
				
				setTimeout(function(){
					cargarDiv('view/configuracion');
				},3100);
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError: " + err);
			}
		});
		
	});
	
	$('#btn_cancelar').click(function(){
		
		swal({
			title: "¿Desea salir de la pantalla actual?",
			text: "",
			type: "warning",
			showCancelButton: true,
			cancelButtonClass: "btn-secondary",
			confirmButtonColor: "#5cb85c",
			confirmButtonText: "Acepto salir",
			cancelButtonText: "Cancelar",
			closeOnConfirm: true,
			closeOnCancel: true
		},
		function(isConfirm) {
			
			if (isConfirm) {
				
				cargarDiv('view/configuracion');
				
			}
		  
		});
		
		
	});
	
});