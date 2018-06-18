$(document).ready(function(){
	
	$('.nuevo_articulo').hide();
	
	$.ajax({
		url: 'api/api.php/articulos',
		type: 'GET',
		dataType: 'JSON',
		success:function(data){
			$(data.data).each(function(i,v){
				$('#carga_articulos').append('<tr>'
											  +'<td>'+v.id_articulo+'</td>'
											  +'<td>'+v.descripcion+'</td>'
											  +'<td class="text-right"><button class="btn btn-small btn-info" id="btn_info_articulo" data-id="'+v.id_articulo+'"><i class="fa fa-edit"></i></button></td>'
											+'</tr>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError: " + err);
		}
	});
	
	$('#btn_nuevo_articulo').click(function(){
		$('#btn_nuevo_articulo').hide();
		$('.articulos_registrados').hide();
		$('.nuevo_articulo').fadeIn('fast');
		
		$.ajax({
			url: 'api/api.php/clave_articulo',
			type: 'GET',
			dataType: 'JSON',
			success:function(data){
				$(data.data).each(function(i,v){
					$('#clave_articulo').html('Clave: '+ v.id_articulo);
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError: " + err);
			}
		});
	});
	
	$('#btn_aceptar_articulo').click(function(){
		
		$('#btn_aceptar_articulo').hide();
		
		if(!$('#txt_descripcion').val() || !$('#txt_precio').val() || !$('#txt_existencia').val()){
			var mensaje = "";
			
			if(!$('#txt_descripcion').val()){
				mensaje += "El campo *Descripcion* es obligatorio.</br>";
			}
			
			if(!$('#txt_precio').val()){
				mensaje += "El campo *Precio* es obligatorio.</br>";
			}
			
			if(!$('#txt_existencia').val()){
				mensaje += "El campo *Existencia* es obligatorio.</br>";
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
					"id_articulo" : $('#btn_aceptar_articulo').data('id'),
					"descripcion" : $('#txt_descripcion').val(),
					"modelo" : $('#txt_modelo').val(),
					"precio" : $('#txt_precio').val(),
					"existencia" : $('#txt_existencia').val()
				}
			
				$.ajax({
					url: 'api/api.php/articulo',
					data: datos,
					type: 'PUT',
					success:function(data){
						swal({
							title: "¡Bien hecho!",
							text: "El articulo ha sido actualizado correctamente.",
							type: "success",
							timer: 3000
						});
						
						setTimeout(function(){
							cargarDiv('view/articulo');
						},3100);
					},
					error: function(xhr, desc, err){
						console.log(xhr);
						console.log("Detalles: " + desc + "\nError: " + err);
					}
				});
				
			}else{
				
				var datos = {
					"descripcion" : $('#txt_descripcion').val(),
					"modelo" : $('#txt_modelo').val(),
					"precio" : $('#txt_precio').val(),
					"existencia" : $('#txt_existencia').val()
				}
			
				$.ajax({
					url: 'api/api.php/articulo',
					data: datos,
					type: 'POST',
					success:function(data){
						swal({
							title: "¡Bien hecho!",
							text: "El articulo ha sido registrado correctamente.",
							type: "success",
							timer: 3000
						});
						
						setTimeout(function(){
							cargarDiv('view/articulo');
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
	
	$('#carga_articulos').on('click','#btn_info_articulo',function(){
		
		$('.articulos_registrados').hide();
		$('.nuevo_articulo').fadeIn('fast');
		
		var id_articulo = $(this).data('id');
		
		$.ajax({
			url: 'api/api.php/articulo_por_id?id_articulo='+id_articulo,
			type: 'GET',
			dataType: 'JSON',
			success:function(data){
				$(data.data).each(function(i,v){
					$('#txt_descripcion').val(v.descripcion);
					$('#txt_modelo').val(v.modelo);
					$('#txt_precio').val(v.precio);
					$('#txt_existencia').val(v.existencia);
				});
				
				$('#btn_aceptar_articulo').data('update',1);
				$('#btn_aceptar_articulo').data('id',id_articulo);
				$('#btn_aceptar_articulo').html('<i class="fa fa-edit"></i> Actualizar');
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
				
				cargarDiv('view/articulo');
				
			}
		  
		});
		
	});
	
});