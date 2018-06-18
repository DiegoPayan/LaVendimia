<div class="row">
	<div class="col-md-10 col-10 mt-3">
		<h2><i class="fa fa-cogs"></i> Configuracion</h2>
		<h5 class="mod-info">Utilice este módulo para consultar y actualizar la Configuracion general</h5>
	</div></div>
</div>
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<div class="row ml-2">
					<div class="col-md-11 col-11 ml-5">
						<h5><i class="fa fa-cog"></i> Configuracion General</h5>
						<hr>
					</div>
				</div>
				<div class="row ml-2">
					<div class="col-md-11 col-11 ml-5">
						<div class="row">
							<div class="col-md-4 col-4">
								<div class="from-group">
									<label for="txt_taza"><strong>Tasa financiamiento</strong></label>
									<input type="number" class="form-control" id="txt_taza" placeholder="Tasa financiamiento">
								</div>
							</div>
							<div class="col-md-4 col-4">
								<div class="from-group">
									<label for="txt_enganche"><strong>% Enganche</strong></label>
									<input type="number" class="form-control" id="txt_enganche" placeholder="% Enganche">
								</div>
							</div>
							<div class="col-md-4 col-4">
								<div class="from-group">
									<label for="txt_plazo"><strong>Plazo máxico</strong></label>
									<input type="number" class="form-control" id="txt_plazo" placeholder="Plazo máxico">
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12 col-12 text-right">
								<button class="btn btn-default" id="btn_cancelar"><i class="fa fa-times"></i> Cancelar</button>
								<button class="btn btn-success" id="btn_aceptar_configuracion"><i class="fa fa-check"></i> Guardar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/configuracion.js">
