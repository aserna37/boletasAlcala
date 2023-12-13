<h1 class="text-center"><span class="badge rounded-pill bg-warning text-dark">Pagos</span></h1>
<hr>
<div class="row text-center">
<br>
<div class="col-md-10 col-sm-12 mx-auto">
<div class="border p-5 animate__animated animate__fadeIn">
<table class="table table-sm" id="tablaPagos">
  <thead>
    <tr>
      <th scope="col" class="text-center">Número 1</th>
      <th scope="col" class="text-center">Número 2</th>
      <th scope="col" class="text-center">Saldo Abonado</th>
      <th scope="col" class="text-center">Saldo Pendiente</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
</div>
</div>
</div>



<!-- AGREGAR PAGO -->
<!-- Modal -->
<div class="modal fade" id="modalAgregarPago" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Agregar abono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="agregarPago">
      <div class="modal-body">
        <input type="text" id="boletaIdPago" name="boletaIdPago" hidden>
        <div class="form-group">
          <label for="Fecha">Fecha</label>
          <input type="date" 
                class="form-control" 
                id="fecha" 
                name="fecha"
                max = "<?php echo date("Y-m-d"); ?>"
                value = "<?php echo date("Y-m-d"); ?>"
                step = "1" 
                required>
        </div>
        <div class="form-group">
          <label for="Fecha">Valor</label>
          <input type="text"
                 class="form-control" 
                 id="valor" 
                 name="valor"
                 minlength="5" 
                 maxlength="5"
                 onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                 required>
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


<!-- AGREGAR PAGO -->
<!-- Modal -->
<div class="modal fade" id="modalVerPagos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Ver Pagos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h3 class="text-center" id="numeros"></h3>
      <hr>
      <table class=" text-center table table-sm table-bordered shadow-sm p-3 mb-5 bg-white rounded" id="tablaDetallePago">
      <thead>
      <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Abono</th>
      </tr>
    </thead>
    <tbody>
    
    </tbody>
</table>
        
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>