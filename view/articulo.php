<div class="row">
	<div class="col-md-10 col-10 mt-3">
		<h2><i class="fa fa-couch"></i> Articulos</h2>
		<h5 class="mod-info">Utilice este módulo para consultar, actualizar y crear nuevos Articulos</h5>
	</div>
	<div class="col-md-2 col-2 mt-4">
		<button class="btn btn-success ml-2" id="btn_nuevo_articulo"><strong><i class="fa fa-plus-circle"></i> Nuevo Articulo</strong></button>
		<strong id="clave_articulo"></strong>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<div class="articulos_registrados">
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<h5><i class="fa fa-list-alt"></i> Articulos Registrados</h5>
							<hr>
						</div>
					</div>
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<table class="table table-hover table-striped" id="carga_articulos">
								<thead class="bg-table-head">
									<tr>
										<th scope="col">Clave articulo</th>
										<th scope="col">Descripcion</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="nuevo_articulo">
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<h5><i class="fa fa-plus-circle"></i> Nuevo Articulo</h5>
							<hr>
						</div>
					</div>
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<div class="row">
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_descripcion"><strong>Descripción articulo</strong></label>
										<input type="text" class="form-control" id="txt_descripcion" placeholder="Descripción de articulo">
									</div>
								</div>
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_modelo"><strong>Modelo</strong></label>
										<input type="text" class="form-control" id="txt_modelo" placeholder="Modelo">
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_precio"><strong>Precio</strong></label>
										<input type="number" class="form-control" id="txt_precio" placeholder="Precio">
									</div>
								</div>
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_existencia"><strong>Existencia</strong></label>
										<input type="number" class="form-control" id="txt_existencia" placeholder="Existencia">
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-12 col-12 text-right">
									<button class="btn btn-default" id="btn_cancelar"><i class="fa fa-times"></i> Cancelar</button>
									<button class="btn btn-success" id="btn_aceptar_articulo"><i class="fa fa-check"></i> Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/articulo.js">
