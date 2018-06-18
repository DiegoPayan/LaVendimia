$(document).ready(function(){
	
	$('.nueva_venta').hide();
	$('#abonos_mensuales').hide();
	
	$.ajax({
		url: 'api/api.php/ventas',
		type: 'GET',
		dataType: 'JSON',
		success:function(data){			
			$(data.data).each(function(i,v){
				$('#carga_ventas').append('<tr>'
											  +'<td>'+v.id_venta+'</td>'
											  +'<td>'+v.id_cliente+'</td>'
											  +'<td>'+v.nombre_completo+'</td>'
											  +'<td>$'+v.total+'</td>'
											  +'<td>'+v.fecha_creacion+'</td>'
											+'</tr>');
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError: " + err);
		}
	});
	
	$('#btn_nueva_venta').click(function(){
		
		$('.ventas_registradas').hide();
		$('.nueva_venta').fadeIn('fast');
		
		$('#btn_nueva_venta').hide();
		
		$.ajax({
			url: 'api/api.php/clave_venta',
			type: 'GET',
			dataType: 'JSON',
			success:function(data){
				$(data.data).each(function(i,v){
					$('#clave_venta').html('Clave: '+ v.id_venta);
				});
			},
			error: function(xhr, desc, err){
				console.log(xhr);
				console.log("Detalles: " + desc + "\nError: " + err);
			}
		});
	});
	
	var tasa = 0;
	var porcentaje_enganche = 0;
	var plazo_maximo = 0;
	
	$.ajax({
		url: 'api/api.php/configuracion',
		type: 'GET',
		dataType: 'JSON',
		success:function(data){
			$(data.data).each(function(i,v){
				tasa = v.taza_financiamiento;
				porcentaje_enganche = v.enganche;
				plazo_maximo = v.plazo_maximo;
			});
		},
		error: function(xhr, desc, err){
			console.log(xhr);
			console.log("Detalles: " + desc + "\nError: " + err);
		}
	});
	
	var i = 0;
	$('#btn_agregar_producto').click(function(){
	
		var data_cliente = $('#txt_cliente').data('id');
		var data_articulo = $('#txt_producto').data('id');
		var cantidad = $('#txt_cantidad').val();
		
		if($('#txt_producto').val() && data_articulo != 0 && cantidad >= 1){
			
			var existencia = $('#txt_producto').data('exist');
			var mensaje = "";
			
			if(existencia == 0 || cantidad > existencia){
				
				if(existencia == 0){
					mensaje = "No hay ni una sola pieza de este producto en stock.";
				}else if(cantidad > existencia){
					mensaje = "Existencia insuficiente, el producto cuenta con "+ existencia+ " unidades.";
				}
				
				swal({
					title: "¡Problemas con la existencia!",
					text: mensaje,
					type: "error",
					html: true,
					timer: 2500
				});
				
			}else{
				
				var id_articulo = $('#txt_producto').data('id');
				var descripcion = $('#txt_producto').data('description');
				var modelo = $('#txt_producto').data('model');
				var precio = $('#txt_producto').data('price');
				
				var precio_calculado = parseFloat(precio * (1 + (parseFloat(tasa * plazo_maximo)) / 100));
				
				var importe = parseFloat(cantidad * precio_calculado).toFixed(2);
				
				$('#carga_articulos').append('<tr>'
											  +'<td>'+descripcion+'</label>'
											  +'<td>'+modelo+'</label>'
											  +'<td><input type="number" class="form-control tb_dt text-center" min="1" id="txt_cantidad_dinamica" value="'+cantidad+'" data-position="'+i+'" data-quantity="'+existencia+'" data-id="'+id_articulo+'"></td>'
											  +'<td>$'+parseFloat(precio_calculado).toFixed(2)+'</label>'
											  +'<td class="imp">$'+importe+'</label>'
											  +'<td class="text-right"><button class="btn btn-small btn-danger" id="btn_cancelar_articulo" data-id="'+id_articulo+'"><i class="fa fa-times"></i></button></td>'
											+'</tr>');
											
				i++;
				
				calculo_enganche_importe();
			}
			
		}else{
			
			var mensaje = "";
			
			if(!$('#txt_producto').val() || data_articulo == 0){
				mensaje += "Favor de utilizar la función de autocompletado del campo Articulo.</br>";
			}
			
			if(cantidad < 1){
				mensaje += "Favor de teclear una cantidad válida.";
			}
			
			swal({
				title: "¡Espera!",
				text: mensaje,
				type: "error",
				html: true,
				timer: 2500
			});
			
		}
		
	});
	
	$('#carga_articulos').on('change','#txt_cantidad_dinamica',function(){
		
		var id_articulo = $(this).data('id');
		var posicion = $(this).data('position');
		var cantidad_dinamica = $(this).val();
		
		var existencia_bd = 0;
		
		if($(this).val()){
			
			existencia_bd = $(this).data('quantity');
			
			var cantidad_desicion = cantidad_dinamica;
			
			if(cantidad_dinamica > existencia_bd){
				
				swal({
					title: "¡Cuidado!",
					text: "Esta excediendo la cantidad de unidades en stock",
					type: "error",
					timer: 2500
				});
				
				$(this).val(existencia_bd);
				
				cantidad_desicion = existencia_bd;
		
			}
			
			var importe_total = 0;
			$('#carga_articulos tbody tr').each(function(i, v){
				$(this).children('td').each(function(ii, vv){
					if(i == posicion && ii == 3){
						var importe_unitario = ($(this).text()).substr(1);
						importe_total = parseFloat(importe_unitario * cantidad_desicion).toFixed(2);
					}
					if(i == posicion && ii == 4){
						$(this).text('$'+importe_total);
					}
					
				}); 
				
			});
			
			calculo_enganche_importe();
			
		}
		
	});
	
	$('#carga_articulos').on('click','#btn_cancelar_articulo',function(){
		$(this).closest('tr').remove();
		i--;
		calculo_enganche_importe();
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
				
				cargarDiv('view/venta');
				
			}
		  
		});
		
	});
	
	$('#btn_siguiente').click(function(){
		
		if(calculo_enganche_importe() > 0 && $('#txt_cliente').data('id') > 0){
			
			$('.registro_producto').hide();
			$('#abonos_mensuales').fadeIn('fast');
			
			$("#carga_mensualidades tr").remove();
			
			carga_mensualidades();
			
		}else{
			var mensaje = "";
			
			if(calculo_enganche_importe() <= 0){
				mensaje += "Favor de ingresar al menos un producto.</br>";
			}
			
			if($('#txt_cliente').data('id') <= 0){
				mensaje += "Favor de ingresar un cliente.</br>";
			}
			
			swal({
				title: "Los datos ingresados no son correctos, favor de verificar",
				text: mensaje,
				type: "error",
				html: true,
				timer: 3000
			});
		}
		
	});
	
	$('#btn_volver').click(function(){
		
		$('#abonos_mensuales').hide();
		$('.registro_producto').fadeIn('fast');
		
	});
	
	var opcion_mensualidad = 0;
	$('#carga_mensualidades').on('click','#rd_mensualidad',function(){
		
		opcion_mensualidad = $(this).data('id');
		
	});
	
	$('#btn_aceptar_venta').click(function(){
		
		if(opcion_mensualidad != 0){
			
			var productos = Array();
			$('#carga_articulos tbody tr').each(function(i, v){
				productos[i] = Array();
				$(this).children('td').each(function(ii, vv){
					if(ii != 5){
						if(ii == 2){
							productos[i][ii] =  $(this).children('.tb_dt').val();
						}else{
							if(ii == 3 || ii == 4){
								productos[i][ii] =  ($(this).text()).substr(1);
							}else{
								productos[i][ii] =  $(this).text();
							}
						}
					}
				}); 
			});
			
			var datos = {
				"id_cliente": $('#txt_cliente').data('id'),
				"total": total_adeudo,
				"plazos": opcion_mensualidad,
				"articulos": productos
			}
			
			$.ajax({
				url: 'api/api.php/venta',
				type: 'POST',
				data: datos,
				success:function(data){
					
					swal({
						title: "¡Bien hecho!",
						text: "Tu venta ha sido registrada correctamente.",
						type: "success",
						timer: 3000
					});
					
					setTimeout(function(){
						cargarDiv('view/venta');
					},3100);
					
				},
				error: function(xhr, desc, err){
					console.log(xhr);
					console.log("Detalles: " + desc + "\nError: " + err);
				}
			});
			
			
		}else{
			
			swal({
				title: "Debe seleccionar un plazo para realizar el pago de su compra",
				type: "error",
				timer: 2500
			});
			
		}
		
	});
	
	var importe_total = 0;
	var enganche = 0;
	var bono_enganche = 0;
	var total_adeudo = 0;
		
	function calculo_enganche_importe(){
		
		importe_total = 0;
		enganche = 0;
		bono_enganche = 0;
		total_adeudo = 0;
		
		var dato = Array();
		$('#carga_articulos tbody tr').each(function(i, v){
			
			dato[i] = Array();
			$(this).children('td').each(function(ii, vv){
				
				if(ii != 5){
					
					if(ii == 2)
						dato[i][ii] =  $(this).children('.tb_dt').val();
					else
						dato[i][ii] =  $(this).text();
					
					if(ii == 4){
						var importe_unitario = ($(this).text()).substr(1);
						importe_total += parseFloat(importe_unitario);
					}
				
				}
				
			}); 
			
		});
		
		enganche = parseFloat(parseFloat(porcentaje_enganche/100) * importe_total).toFixed(2);
		$('#enganche').html('$'+enganche);
		
		bono_enganche = parseFloat(enganche * (parseFloat(tasa * plazo_maximo) / 100)).toFixed(2);
		$('#bono_enganche').html('$'+bono_enganche);
		
		total_adeudo = parseFloat(importe_total - enganche - bono_enganche).toFixed(2);
		$('#total').html('$'+total_adeudo);
		
		return importe_total;
		
	}
	
	function carga_mensualidades(){
		
		var mensualidad = 3;
		
		var precio_contado = 0;
		var total_pagar = 0;
		var importe_abono = 0;
		var importe_ahorro = 0;
		
		precio_contado = parseFloat(total_adeudo / parseFloat( 1 + (( tasa * plazo_maximo )) / 100)).toFixed(2);
		
		while(mensualidad <= 12){
			
			total_pagar = parseFloat(precio_contado * (1 + (tasa * mensualidad) / 100)).toFixed(2);
			
			importe_abono = parseFloat(total_pagar / mensualidad).toFixed(2);
			
			importe_ahorro = parseFloat(total_adeudo - total_pagar).toFixed(2);
			
			$('#carga_mensualidades').append('<tr>'
											  +'<td>'+mensualidad+' Abonos de</label>'
											  +'<td>$'+importe_abono+'</label>'
											  +'<td>Total a pagar $'+total_pagar+'</label>'
											  +'<td>Se ahorra $'+importe_ahorro+'</label>'
											  +'<td class="text-right">'
													+'<input type="radio" name="rd_mensualidad" id="rd_mensualidad" class="form_control" data-id="'+mensualidad+'">'
												+'</td>'
											+'</tr>');
			
			mensualidad += 3;
		}
		
	}
	
	
	//Autocomplete para clientes
	var clientes = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace("nombre_completo"),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch:{ 
			url:'modelo/GET/clientes_bloodhound.php',
			cache: false
		}
	});

	clientes.initialize();
	
	$('#txt_cliente').typeahead({
		hint: true,
		highlight: true,
		minLength: 3
	},
	{
		name: 'clientes',
		source: clientes,
		displayKey: "nombre_completo"
	}).bind("typeahead:selected", function(obj, datum, name) {
		$('#txt_cliente').data('id', datum.id_cliente);
		$('#rfc').html('RFC: '+datum.rfc);
	});
	
	//Autocomplete para articulos
	var articulos = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace("descripcion"),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch:{ 
			url:'modelo/GET/articulos_bloodhound.php',
			cache: false
		}
	});

	articulos.initialize();
	
	$('#txt_producto').typeahead({
		hint: true,
		highlight: true,
		minLength: 3
	},
	{
		name: 'articulos',
		source: articulos,
		displayKey: "descripcion"
	}).bind("typeahead:selected", function(obj, datum, name) {
		$('#txt_producto').data('id', datum.id_articulo);
		$('#txt_producto').data('description', datum.descripcion);
		$('#txt_producto').data('model', datum.modelo);
		$('#txt_producto').data('exist', datum.existencia);
		$('#txt_producto').data('price', datum.precio);
	});
	
});