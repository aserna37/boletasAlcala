<h1 class="text-center"><span class="badge rounded-pill bg-warning text-dark">Boletas</span></h1>
<hr>
<div class="row text-center">
<br>
<div class="col-md-10 col-sm-12 mx-auto">
<div class="border p-5 animate__animated animate__fadeIn">
<table class="table table-sm" id="tablaBoletas">
  <thead>
    <tr>
      <th scope="col" class="text-center">Número 1</th>
      <th scope="col" class="text-center">Número 2</th>
      <th scope="col" class="text-center">Estado</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
</div>
</div>
</div>



<!-- MODAL VENDEDOR -->
<div class="modal fade" id="ModalInfoVendedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Datos Vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="datosVendedor"></div>
        <button class="btn btn-block btn-success btn-lg" id="btnLiberarBoletaVendedor">LIBERAR ASIGNACIÓN</button>
        
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL COMPRADOR -->
<div class="modal fade" id="ModalInfoComprador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Datos Comprador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="datosComprador"></div>
        <button class="btn btn-block btn-danger btn-lg" id="btnLiberarBoletaComprador">LIBERAR ASIGNACIÓN</button>
        
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>