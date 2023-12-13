<div class="row">
    <div class="col-md-4 mx-auto">
    
<form id="buscarPagos">
<div class="form-group">
    <label for="exampleInputEmail1">Fecha</label>
    <input type="date" 
    class="form-control" 
    id="fechaPago" 
    name="fechaPago"
    max = "<?php echo date("Y-m-d"); ?>"
    value = "<?php echo date("Y-m-d"); ?>"
    step = "1" 
    aria-describedby="fecha a buscar" required>
    <small id="fecha" class="form-text text-muted">Seleccione la fecha a buscar</small>
  </div>
  <button class="btn btn-danger btn-block btnBuscarPagos">Buscar</button>  
</form>
</div>
</div>

<div class="card mt-5 shadow container" id="InfoPagos">
  <div class="card-body">
    <h2 id="fechaTitulo"></h2>
    <div class="row">
        <div class="col-md-9">
         <br>   
        <p>Numero de boletas abonadas o pagas:</p>
        <p>Valor Ingresado en fecha:</p>
        </div>
        <div class="col-md-3">
            <br>
        <p><b id="cantidadPag"></b></p>
        <p><b id="valorPag"></b></p>
        </div>
    </div>
  </div>
</div>

<div class="alert alert-danger mt-5" id="NoPagos" role="alert">
  No existen pagos o abonos en esa fecha
</div>


