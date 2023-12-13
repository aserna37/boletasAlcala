<h1 class="text-center"><span class="badge rounded-pill bg-warning text-dark">Vendedores</span></h1>
<hr>
<div class="row text-center">
    <div class="col-md-3 col-sm-12">
        <a type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#ModalnuevaPersonaV"><i class="fas fa-user-friends"></i> Nuevo Vendedor</a>
    </div>
<br>
<br>
<div class="col-md-10 col-sm-12 mx-auto">
<div class="border p-3 animate__animated animate__fadeIn">
<table class="table table-sm" id="tablaVendedores">
  <thead>
    <tr>
      <th scope="col" class="text-center">Documento</th>
      <th scope="col" class="text-center">Nombres</th>
      <th scope="col" class="text-center">Apellidos</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
</div>
</div>

<!-- NUEVO VENDEDOR -->
<div class="modal fade" id="ModalnuevaPersonaV" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nueva Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="agregarPersonaV">
        <div class="modal-body bg-light">
        
        <div class="row">

        <div class="col-md-6 col-sm-12">
        <div class="form-group text-left">
        <label for="tipo" class="col-form-label col-form-label-sm">Tipo</label>
        <select class="custom-select custom-select-sm" name="tipo">
          <option value="CC" select>Cedula de ciudadania</option>
          <option value="TI">Tarjeta de identidad</option>
          <option value="CE">Cedula de extranjeria</option>
          <option value="CV">Cedula venezolana</option>
        </select>
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group text-left">
        <label for="documento" class="col-form-label col-form-label-sm">Documento</label>
        <input class="form-control form-control-sm" 
          type="text"
          name="documento"
          id="documentoV"
          maxlength="11"
          onkeypress="return event.charCode >= 48 && event.charCode <= 57"
          >
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group text-left">
        <label for="nombres" class="col-form-label col-form-label-sm">Nombres</label>
        <input class="form-control form-control-sm" 
          type="text"
          name="nombres"
          minlength="3" 
          maxlength="30"
          onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))"
          required>
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group text-left">
        <label for="apellidos" class="col-form-label col-form-label-sm">Apellidos</label>
        <input class="form-control form-control-sm" 
          type="text"
          name="apellidos"
          minlength="3" 
          maxlength="30"
          onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 209) || (event.charCode == 241))"
          required>
        </div>
        </div>

        <div class="col-md-5 col-sm-12">
        <div class="form-group text-left">
        <label for="direccion" class="col-form-label col-form-label-sm">Dirección</label>
        <input class="form-control form-control-sm" 
          type="text"
          name="direccion"
          minlength="3" 
          maxlength="50"
          >
        </div>
        </div>

        <div class="col-md-3 col-sm-12">
        <div class="form-group text-left">
        <label for="celular" class="col-form-label col-form-label-sm">Celular</label>
        <input class="form-control form-control-sm" 
          type="text"
          name="celular"
          minlength="10" 
          maxlength="10"
          onkeypress="return event.charCode >= 48 && event.charCode <= 57"
          required>
        </div>
        </div>
        
        <div class="col-md-4 col-sm-12">
        <div class="form-group text-left">
        <label for="email" class="col-form-label col-form-label-sm">Email</label>
        <input class="form-control form-control-sm" 
          type="email"
          name="email">
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group text-left">
        <label for="departamento" class="col-form-label col-form-label-sm">Departamento</label>
        <select class="custom-select custom-select-sm" name="departamento" id="departamento" required>
          <option selected value="">Seleccione Departamento</option>
          <?php
              $item = null;
              $valor = null;

              $departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item,$valor);

              foreach($departamentos as $key => $value){
                  echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
              }
          ?>
        </select>
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group text-left" id="listaMunicipios"></div>
        </div>

        <input class="form-control form-control-sm" type="text" name="vendedor" value="S" hidden>
        <input class="form-control form-control-sm" type="text" name="comprador" value="N" hidden>

      </div>
      
    </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- *********************************************************************** -->

<!-- ASIGNAR BOLETA -->
<div class="modal fade" id="ModalAsignarBoleta" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignación de Boletas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="documentoVendedor" hidden>
        <h5>Boletas Entregadas</h5>
        <hr>
        <div id="boletasEntregadas" class="border border-danger"></div>
        <div>
          <br>
         <h5>Asignar Boleta</h5>
         <hr>
        
          <div class="card-body">
            <input type="text" class="text-center" id="numeroBoleta"
                   maxlength="4"
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            <button class="btn btn-block btn-danger mt-4" id="btnAgregarBoleta">Agregar</button>
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<!-- ************************************************************************* -->


<div class="modal fade" id="ModalVerPersona" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="verPersona">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
