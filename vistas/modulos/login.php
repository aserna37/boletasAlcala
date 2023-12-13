<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="vistas/img/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="usuario" name="usuario" class="form-control input_user" placeholder="usuario" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="contraseña" name="contraseña" class="form-control input_pass" placeholder="contraseña" required>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Ingresar</button>
					 <?php
						$login = new ControladorUsuarios();
						$login->ctrIngresoUsuario();
					?>            
							</div>
					</form>
				</div>
		
				
			</div>
		
		</div>
		
	</div>
	