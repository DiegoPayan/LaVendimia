$(document).ready(function(){
	
	$('.nuevo_cliente').hide();
	
	$.ajax({
		url: 'api/api.php/clientes',
		type: 'GET',
		dataType: 'JSON',
		success:function(data){
			$(data.data).each(function(i,v){
				$('#carga_clientes').append('<tr>'
											  +'<td>'+v.id_cliente+'</td>'
											  +'<td>'+v.nombre_completo+'</td>'
											  +'<td class="text-right"><button class="btn btn-small btn-info" id="btn_info_cliente" data-id="'+v.id_cliente+'"><i class="fa fa-edit"></i></button></td>'
											+'</tr>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError: " + err);
		}
	});
	
	$('#btn_nuevo_cliente').click(function(){
		$('#btn_nuevo_cliente').hide();
		$('.clientes_registrados').hide();
		$('.nuevo_cliente').fadeIn('fast');
		
		$.ajax({
			url: 'api/api.php/clave_cliente',
			type: 'GET',
			dataType: 'JSON',
			success:function(data){
				$(data.data).each(function(i,v){
					$('#clave_cliente').html('Clave: '+ v.id_cliente);
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError: " + err);
			}
		});
	
	});
	
	$('#btn_aceptar_cliente').click(function(){
		
		$('#btn_aceptar_cliente').hide();
		
		if(!$('#txt_nombre').val() || !$('#txt_apellido_paterno').val() || !$('#txt_rfc').val()){
			var mensaje = "";
			
			if(!$('#txt_nombre').val()){
				mensaje += "El campo *Nombre* es obligatorio.</br>";
			}
			
			if(!$('#txt_apellido_paterno').val()){
				mensaje += "El campo *Apellido paterno* es obligatorio.</br>";
			}
			
			if(!$('#txt_rfc').val()){
				mensaje += "El campo *RFC* es obligatorio.</br>";
			}
			
			swal({
				title: "No es posible continuar",
				text: mensaje,
				type: "error",
				html: true,
				timer: 3500
			});
		}else{
			
			var update = $(this).data('update');
			
			if(update == 1){
				
				var datos = {
					"id_cliente" : $('#btn_aceptar_cliente').data('id'),
					"nombre" : $('#txt_nombre').val(),
					"apellido_paterno" : $('#txt_apellido_paterno').val(),
					"apellido_materno" : $('#txt_apellido_materno').val(),
					"rfc" : $('#txt_rfc').val()
				}
			
				$.ajax({
					url: 'api/api.php/cliente',
					data: datos,
					type: 'PUT',
					success:function(data){
						swal({
							title: "¡Bien hecho!",
							text: "El cliente ha sido actualizado correctamente.",
							type: "success",
							timer: 3000
						});
						
						setTimeout(function(){
							cargarDiv('view/cliente');
						},3100);
					},
					error: function(xhr, desc, err){
						console.log(xhr);
						console.log("Detalles: " + desc + "\nError: " + err);
					}
				});
				
			}else{
				
				var datos = {
					"nombre" : $('#txt_nombre').val(),
					"apellido_paterno" : $('#txt_apellido_paterno').val(),
					"apellido_materno" : $('#txt_apellido_materno').val(),
					"rfc" : $('#txt_rfc').val()
				}
			
				$.ajax({
					url: 'api/api.php/cliente',
					data: datos,
					type: 'POST',
					success:function(data){
						swal({
							title: "¡Bien hecho!",
							text: "El cliente ha sido registrado correctamente.",
							type: "success",
							timer: 3000
						});
						
						setTimeout(function(){
							cargarDiv('view/cliente');
						},3100);
					},
					error: function(xhr, desc, err){
						console.log(xhr);
						console.log("Detalles: " + desc + "\nError: " + err);
					}
				});
				
			}
			
		}
		
	});
	
	$('#carga_clientes').on('click','#btn_info_cliente',function(){
		
		$('.clientes_registrados').hide();
		$('.nuevo_cliente').fadeIn('fast');
		
		var id_cliente = $(this).data('id');
		
		$.ajax({
			url: 'api/api.php/cliente_por_id?id_cliente='+id_cliente,
			type: 'GET',
			dataType: 'JSON',
			success:function(data){
				$(data.data).each(function(i,v){
					$('#txt_nombre').val(v.nombre);
					$('#txt_apellido_paterno').val(v.apellido_paterno);
					$('#txt_apellido_materno').val(v.apellido_materno);
					$('#txt_rfc').val(v.rfc);
				});
				
				$('#btn_aceptar_cliente').data('update',1);
				$('#btn_aceptar_cliente').data('id',id_cliente);
				$('#btn_aceptar_cliente').html('<i class="fa fa-edit"></i> Actualizar');
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
				
				cargarDiv('view/cliente');
				
			}
		  
		});
		
	});
	
});