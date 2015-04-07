<?php
	include_once('header.php');
?>
	<div class="container">	
		<div class="row">
			<form class="form-horizontal check-in" role="form">
				<fieldset>
					<!-- Form Name -->
					<legend>Registro</legend>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="nombre"></label>  
					  <div class="col-md-4">
					  <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control input-md" required="">
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="primer_apellido"></label>  
					  <div class="col-md-4">
					  <input id="primer_apellido" name="primer_apellido" type="text" placeholder="Primer Apellido" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="segundo_apellido"></label>  
					  <div class="col-md-4">
					  <input id="segundo_apellido" name="segundo_apellido" type="text" placeholder="Segundo Apellido" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="ciudad"></label>  
					  <div class="col-md-4">
					  <input id="ciudad" name="ciudad" type="text" placeholder="Ciudad" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="centro"></label>  
					  <div class="col-md-4">
					  <input id="centro" name="centro" type="text" placeholder="Centro" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="cargo"></label>  
					  <div class="col-md-4">
					  <input id="cargo" name="cargo" type="text" placeholder="Cargo" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="email"></label>  
					  <div class="col-md-4">
					  <input id="email" name="email" type="text" placeholder="Correo Electrónico" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="telefono"></label>  
					  <div class="col-md-4">
					  <input id="telefono" name="telefono" type="text" placeholder="Teléfono " class="form-control input-md" required="">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="telefono_secundario"></label>  
					  <div class="col-md-4">
					  <input id="telefono_secundario" name="telefono_secundario" type="text" placeholder="Teléfono Secundario" class="form-control input-md">
					    
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-4 control-label" for="submit"></label>
					  <div class="col-md-4">
					    <button id="submit" name="submit" class="btn btn-default">Registrarse</button>
					  </div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
<?php
	include_once('footer.php');
?>