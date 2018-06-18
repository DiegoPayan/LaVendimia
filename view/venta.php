<div class="row">
	<div class="col-md-10 col-10 mt-3">
		<h2><i class="fa fa-shopping-cart"></i> Ventas</h2>
		<h5 class="mod-info">Utilice este módulo para consultar y generar nuevas ventas</h5>
	</div>
	<div class="col-md-2 col-2 mt-4">
		<button class="btn btn-success ml-2" id="btn_nueva_venta"><strong><i class="fa fa-plus-circle"></i> Nueva Venta</strong></button>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<div class="ventas_registradas">
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<h5><i class="fa fa-list-alt"></i> Ventas Registradas</h5>
							<hr>
						</div>
					</div>
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<table class="table table-hover table-striped">
								<thead class="bg-table-head">
									<tr>
										<th scope="col">Folio Venta</th>
										<th scope="col">Clave cliente</th>
										<th scope="col">Nombre</th>
										<th scope="col">Total</th>
										<th scope="col">Fecha</th>
										<th scope="col">Estatus</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>1</td>
										<td>Diego</td>
										<td>$20.00</td>
										<td>16 Junio 2018</td>
										<td>Activo</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="nueva_venta">
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<h5><i class="fa fa-credit-card"></i> Registro de Ventas</h5>
							<hr>
						</div>
					</div>
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5 registro_producto">
							<div class="col-md-12 col-12">
								<div class="row">
									<div class="col-md-2 col-2">
										<strong class="align-middle">Cliente:</strong>
									</div>
									<div class="col-md-6 col-6">
										<input type="text" class="form-control" id="txt_cliente" data-id="0" placeholder="Nombre del cliente">
									</div>
									<div class="col-md-4 col-4">
										<strong class="align-middle">
											<div id="rfc" class="col-md-12 col-12">
												RFC: 
											</div>
										</strong>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-12 mt-2 registro_producto">
								<div class="row">
									<div class="col-md-2 col-2">
										<strong class="align-middle">Producto:</strong>
									</div>
									<div class="col-md-8 col-8">
										<input type="text" class="form-control" id="txt_producto" data-id="0" placeholder="Nombre del producto">
									</div>
									<div class="col-md-2 col-2">
										<div class="col-md-12 col-12 input-group">
											<input type="number" id="txt_cantidad" min="1" class="form-control" placeholder="cantidad">
											<div class="input-group-append">
												<button class="btn btn-success" id="btn_agregar_producto"><i class="fa fa-plus"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
						</div>
						<div class="col-md-11 col-11 ml-5 registro_producto">
							<table class="table table-hover table-striped" id="carga_articulos">
								<thead class="bg-table-head">
									<tr>
										<th scope="col">Descripcion Articulo</th>
										<th scope="col">Modelo</th>
										<th scope="col">Cantidad</th>
										<th scope="col">Precio</th>
										<th scope="col">Importe</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<hr>
						</div>
						<div class="col-md-11 col-11 ml-5 registro_producto">
							<div class="col-md-12 col-12 mt-1 row text-right">
								<div class="col-md-10 col-10">
									<strong>Enganche:</strong>
								</div>
								<div class="col-md-1 col-1" id="enganche">
									$0.00
								</div>
							</div>
							<div class="col-md-12 col-12 mt-1  row text-right">
								<div class="col-md-10 col-10">
									<strong>Bonificacion enganche:</strong>
								</div>
								<div class="col-md-1 col-1" id="bono_enganche">
									$0.00
								</div>
							</div>
							<div class="col-md-12 col-12 mt-1  row text-right">
								<div class="col-md-10 col-10">
									<strong>Total:</strong>
								</div>
								<div class="col-md-1 col-1" id="total">
									$0.00
								</div>
							</div>
						</div>
						<div class="col-md-11 col-11 ml-5 registro_producto">
							<div class="col-md-12 col-12 text-right mt-5">
								<button class="btn btn-default" id="btn_cancelar"><i class="fa fa-times"></i> Cancelar</button>
								<button class="btn btn-success" id="btn_siguiente"><i class="fa fa-arrow-circle-right"></i> Siguiente</button>
							</div>
						</div>
						
						<div class="col-md-11 col-11 ml-5" id="abonos_mensuales">
							<div class="col-md-12 col-12 bg-table-head text-center mt-3">
								<strong class="mt-4 mb-4">Abonos mensuales</strong>
							</div>
							<div class="col-md-12 col-12 text-center mt-3">
								<table class="table table-hover table-striped" id="carga_mensualidades">
									<tbody>
									</tbody>
								</table>
							<hr>
							</div>
							<div class="col-md-12 col-12 text-right mt-3">
								<button class="btn btn-default" id="btn_volver"><i class="fa fa-arrow-circle-left"></i> Volver</button>
								<button class="btn btn-success" id="btn_aceptar_venta"><i class="fa fa-check"></i> Aceptar</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/venta.js">
