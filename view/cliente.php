<div class="row">
	<div class="col-md-10 col-10 mt-3">
		<h2><i class="fa fa-user"></i> Clientes</h2>
		<h5 class="mod-info">Utilice este módulo para consultar, actualizar y crear nuevos clientes</h5>
	</div>
	<div class="col-md-2 col-2 mt-4">
		<button class="btn btn-success ml-2" id="btn_nuevo_cliente"><strong><i class="fa fa-user-plus"></i> Nuevo Cliente</strong></button>
		<strong id="clave_cliente"></strong>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<div class="clientes_registrados">
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<h5><i class="fa fa-list-alt"></i> Clientes Registrados</h5>
							<hr>
						</div>
					</div>
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<table class="table table-hover table-striped" id="carga_clientes">
								<thead class="bg-table-head">
									<tr>
										<th scope="col">Clave cliente</th>
										<th scope="col">Nombre</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="nuevo_cliente">
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<h5><i class="fa fa-user-plus"></i> Nuevo Cliente</h5>
							<hr>
						</div>
					</div>
					<div class="row ml-2">
						<div class="col-md-11 col-11 ml-5">
							<div class="row">
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_nombre"><strong>Nombre Cliente</strong></label>
										<input type="text" class="form-control" id="txt_nombre" placeholder="Nombre Cliente">
									</div>
								</div>
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_apellido_paterno"><strong>Apellido Paterno</strong></label>
										<input type="text" class="form-control" id="txt_apellido_paterno" placeholder="Apellido Paterno">
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_apellido_materno"><strong>Apellido Materno</strong></label>
										<input type="text" class="form-control" id="txt_apellido_materno" placeholder="Apellido Materno">
									</div>
								</div>
								<div class="col-md-6 col-6">
									<div class="from-group">
										<label for="txt_rfc"><strong>RFC</strong></label>
										<input type="text" class="form-control" id="txt_rfc" placeholder="RFC">
									</div>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-12 col-12 text-right">
									<button class="btn btn-default" id="btn_cancelar"><i class="fa fa-times"></i> Cancelar</button>
									<button class="btn btn-success" id="btn_aceptar_cliente"><i class="fa fa-check"></i> Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/cliente.js">
