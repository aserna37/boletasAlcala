$(document).ready( function () {
    // TABLA VENDEDORES
    var tablaVendedores = $('#tablaVendedores').DataTable({
      responsive: true,
      autoWidth: false,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Sin Registros",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },
       "ajax" : {
        url:"ajax/tablaVendedores.ajax.php",
        type:"POST",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        }
  });

// *****************************************************************************
// TABLA COMPRADORES
var tablaCompradores = $('#tablaCompradores').DataTable({
  responsive: true,
  autoWidth: false,
  "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Sin Registros",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
   "ajax" : {
    url:"ajax/tablaCompradores.ajax.php",
    type:"POST",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    }
});

// *****************************************************************************


// TABLA BOLETAS

var tablaBoletas = $('#tablaBoletas').DataTable({
  responsive: true,
  autoWidth: false,
  "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Sin Registros",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
   "ajax" : {
    url:"ajax/tablaBoletas.ajax.php",
    type:"POST",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    }
});

// *****************************************************************************
// TABLA PAGOS
var tablaPagos = $('#tablaPagos').DataTable({
  responsive: true,
  autoWidth: false,
  "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Sin Registros",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
   "ajax" : {
    url:"ajax/tablaPagos.ajax.php",
    type:"POST",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    }
});
// *****************************************************************************
// MOSTRAR MUNICIPIOS

$('#departamento').change(function(){
  recargarLista();
});

function recargarLista(){
  $.ajax({
    type:"POST",
    url:"ajax/listadoMunicipios.ajax.php",
    data:"departamento=" + $('#departamento').val(),
    success:function(r){
      $('#listaMunicipios').html(r);
    }
  });
}

// ***************************************************
// AGREGAR COMPRADOR
$('#ModalnuevaPersonaC #agregarPersonaC').submit(function(e){
  e.preventDefault();
   var addform = $(this).serialize();
   
   $.ajax({
    url: "ajax/personas.ajax.php",
    method: "POST",
    data: addform,
    // cache: false,
    // contentType: false,
    // processData: false,
    success: function(respuesta) {
      console.log(respuesta);
      if(respuesta == 'ok'){
        toastr.success("La persona ha sido creada satisfactoriamente", "Guardado",{positionClass:'toast-bottom-right'});
        $('#ModalnuevaPersonaC').modal('hide');
        return tablaCompradores.ajax.reload();
      }else{
        return toastr.error("La persona ya se encuentra registrado en el sistema", "Error",{positionClass:'toast-bottom-right'});
      }
    }
   });

});


// ***************************************************
// AGREGAR VENDEDOR
$('#ModalnuevaPersonaV #agregarPersonaV').submit(function(e){
  e.preventDefault();
   var addform = $(this).serialize();
   
   $.ajax({
    url: "ajax/personas.ajax.php",
    method: "POST",
    data: addform,
    // cache: false,
    // contentType: false,
    // processData: false,
    success: function(respuesta) {
      console.log(respuesta);
      if(respuesta == 'ok'){
        toastr.success("La persona ha sido creada satisfactoriamente", "Guardado",{positionClass:'toast-bottom-right'});
        $('#ModalnuevaPersonaV').modal('hide');
        return window.location.reload();
      }else{
        return toastr.error("La persona ya se encuentra registrado en el sistema", "Error",{positionClass:'toast-bottom-right'});
      }
    }
   });

});
// ***************************************************
// LIMPIAR FORMULARIOS
$('#ModalnuevaPersonaC').on('hidden.bs.modal', function () {
  $('#ModalnuevaPersonaC form')[0].reset();
  });

  $('#ModalnuevaPersonaV').on('hidden.bs.modal', function () {
    $('#ModalnuevaPersonaV form')[0].reset();
    });

// ***************************************************

// ASIGNAR BOLETAS VENDEDOR

$('#tablaVendedores').on("click", ".btnAsignaBoleta", function(){
  var idVendedor = $(this).attr("documentoVendedor");
  $('#documentoVendedor').val(idVendedor);
  $('#numeroBoleta').val('');
  MostrarBoletasVendedor(idVendedor);
  $('#ModalAsignarBoleta').modal('show');
})

$('#ModalAsignarBoleta').on("click","#btnAgregarBoleta",function(){
  if($('#numeroBoleta').val().length < 4){
    return toastr.error("Numero no valido o vacio", "Error",{positionClass:'toast-bottom-right'});
  }else{
    var documentoV = $('#documentoVendedor').val();
    var boletaV = $('#numeroBoleta').val();
    var datos = new FormData();
    datos.append("documentoV", documentoV);
    datos.append("boletaV", boletaV);

    $.ajax({
      url: "ajax/boletas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta) {
        console.log(respuesta);
         if(respuesta == 'ok'){
          $('#numeroBoleta').val('');
          MostrarBoletasVendedor(documentoV); 
          return toastr.success("Boleta Asignada", "Aprobado",{positionClass:'toast-bottom-right'});
          }else{
            $('#numeroBoleta').val('');
            return toastr.error("Boleta ya fue entregada", "Error",{positionClass:'toast-bottom-right'});
            
          }
      }
  })
    

  }
});

function MostrarBoletasVendedor(documento){

    var datos = new FormData();
    datos.append("documento", documento);
  
  $.ajax({
    url: "ajax/vendedores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
       return $('#boletasEntregadas').html(respuesta);
    }
  });
}


// ASIGNAR BOLETAS COMPRADOR

$('#tablaCompradores').on("click", ".btnAsignaBoletaC", function(){
  var idComprador = $(this).attr("documentoComprador");
  $('#documentoComprador').val(idComprador);
  $('#numeroBoleta').val('');
  MostrarBoletasComprador(idComprador);
  $('#ModalAsignarBoletaC').modal('show');
})

$('#ModalAsignarBoletaC').on("click","#btnAgregarBoleta",function(){
  if($('#numeroBoleta').val().length < 4){
    return toastr.error("Numero no valido o vacio", "Error",{positionClass:'toast-bottom-right'});
  }else{
    var documentoC = $('#documentoComprador').val();
    var boletaC = $('#numeroBoleta').val();
    var datos = new FormData();
    datos.append("documentoC", documentoC);
    datos.append("boletaC", boletaC);

    $.ajax({
      url: "ajax/boletas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta) {
        console.log(respuesta);
         if(respuesta == 'ok'){
          $('#numeroBoleta').val('');
          MostrarBoletasComprador(documentoC); 
          return toastr.success("Boleta Vendida", "Aprobado",{positionClass:'toast-bottom-right'});
          }else{
            $('#numeroBoleta').val('');
            return toastr.error("Boleta ya fue vendida", "Error",{positionClass:'toast-bottom-right'});
            
          }
      }
  })
    

  }
});

function MostrarBoletasComprador(documento){

  var datos = new FormData();
  datos.append("documento", documento);

$.ajax({
  url: "ajax/compradores.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
  success: function(respuesta) {
     return $('#boletasCompradas').html(respuesta);
  }
});
}



// VALIDAR VENDEDOR EN EL SISTEMA
// $('#ModalnuevaPersona #agregarPersona').on("change", "#documentoV", function(){
//   var documentoP = $(this).val();
//   var datos = new FormData();
//   datos.append("documentoP", documentoP);

//   $.ajax({
//     url: "ajax/personas.ajax.php",
//     method: "POST",
//     data: datos,
//     cache: false,
//     contentType: false,
//     processData: false,
//     success: function(respuesta) {
//       if(respuesta == 'error1'){
//         $('#documentoV').val('');
//         $('#documentoV').focus();
//             return toastr.error("Persona ya registrada como vendedor", "Error",{positionClass:'toast-bottom-right'});
//       }else if(respuesta == 'error2'){
//         var datos = new FormData();
//         datos.append("documentoPA", documentoP);
//         $.ajax({
//           url: "ajax/personas.ajax.php",
//           method: "POST",
//           data: datos,
//           cache: false,
//           contentType: false,
//           processData: false,
//           success: function(respuesta) {
//             $('#ModalnuevaPersona').modal('hide');
//             toastr.success("Persona Creada", "Aprobado",{positionClass:'toast-bottom-right'});
//             return tablaVendedores.ajax.reload();
//           }
//         });
//      }
//     }
// });
// });
// // *********************************************************************
// // VALIDAR COMPRADOR EN EL SISTEMA
// $('#ModalnuevaPersona #agregarPersona').on("change", "#documentoC", function(){
//   var documentoV = $(this).val();
//   var datos = new FormData();
//   datos.append("documentoV", documentoV);

//   $.ajax({
//     url: "ajax/personas.ajax.php",
//     method: "POST",
//     data: datos,
//     cache: false,
//     contentType: false,
//     processData: false,
//     success: function(respuesta) {
//       if(respuesta == 'error1'){
//         $('#documentoC').val('');
//         $('#documentoC').focus();
//             return toastr.error("Persona ya registrada como comprador", "Error",{positionClass:'toast-bottom-right'});
//       }else if(respuesta == 'error2'){
//         var datos = new FormData();
//         datos.append("documentoPV", documentoV);
//         $.ajax({
//           url: "ajax/personas.ajax.php",
//           method: "POST",
//           data: datos,
//           cache: false,
//           contentType: false,
//           processData: false,
//           success: function(respuesta) {
//             $('#ModalnuevaPersona').modal('hide');
//             toastr.success("Persona Creada", "Aprobado",{positionClass:'toast-bottom-right'});
//             return tablaCompradores.ajax.reload();
//           }
//         });
//      }
//     }
// });
// });
// ***************************************************************************************************

// VER INFORMACION DE VENDEDOR
$('#tablaVendedores').on("click", ".btnInfoPersona", function(){
  var Persona = $(this).attr("documentoVendedor");
  var datos = new FormData();
  datos.append("Persona", Persona);

  $.ajax({
    url: "ajax/personas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      console.log(respuesta);
      $('#verPersona').html(respuesta);
      $('#ModalVerPersona').modal('show');
    }
    
  });


});

// ***************************************************
// VER INFORMACION DE COMPRADOR
$('#tablaCompradores').on("click", ".btnInfoPersona", function(){
  var Persona = $(this).attr("documentoVendedor");
  var datos = new FormData();
  datos.append("Persona", Persona);

  $.ajax({
    url: "ajax/personas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      // console.log(respuesta);
      $('#verPersona').html(respuesta);
      $('#ModalVerPersona').modal('show');
    }
    
  });


});

// ***************************************************
// VER VENDEDOR EN BOLETAS
$('#tablaBoletas').on("click", ".btnVerVendedor", function(){
  var idBoletaVendedor = $(this).attr("idBoleta");
  var datos = new FormData();
  datos.append("idBoletaVendedor", idBoletaVendedor);
 
  $.ajax({
    url: "ajax/vendedores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      // console.log(respuesta);
      $('#datosVendedor').html(respuesta);
      $('#ModalInfoVendedor').modal('show');
    }
  });
});

$("#btnLiberarBoletaVendedor").click(function(){
  var idBoleta = $('#boletaId').text();
  var datos = new FormData();
  datos.append("idVendedorBoleta", idBoleta);

  $.ajax({
    url: "ajax/vendedores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      // console.log(respuesta);
      if(respuesta == 'ok'){
        $('#ModalInfoVendedor').modal('hide');
            toastr.success("Boleta Liberada", "Aprobado",{positionClass:'toast-bottom-right'});
            return window.location.reload();
      }
      
    }
  });
    
});
// ***************************************************
// ***************************************************
// VER COMPRADOR EN BOLETAS
$('#tablaBoletas').on("click", ".btnVerComprador", function(){
  var idBoletaComprador = $(this).attr("idBoleta");
  var datos = new FormData();
  datos.append("idBoletaComprador", idBoletaComprador);
 
  $.ajax({
    url: "ajax/compradores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      // console.log(respuesta);
      $('#datosComprador').html(respuesta);
      $('#ModalInfoComprador').modal('show');
    }
  });
});

$("#btnLiberarBoletaComprador").click(function(){
  var idBoleta = $('#boletaId').text();
  var datos = new FormData();
  datos.append("idCompradorBoleta", idBoleta);

  $.ajax({
    url: "ajax/compradores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      console.log(respuesta);
      if(respuesta == 'ok'){
        $('#ModalInfoComprador').modal('hide');
            toastr.success("Boleta Liberada", "Aprobado",{positionClass:'toast-bottom-right'});
            return window.location.reload();
      }
      
    }
  });
    
});
// *********************************************************************************
//TABLA ABONO
$('#tablaPagos').on("click", ".btnAgregarPago", function(){
  var idBoleta = $(this).attr("idBoleta");
  $('#boletaIdPago').val(idBoleta);
  $('#modalAgregarPago').modal('show');
});


// LIMPIAR FORMULARIOS
$('#modalAgregarPago').on('hidden.bs.modal', function () {
  $('#modalAgregarPago form')[0].reset();
  });

// *********************************************************************************
// AGREGAR ABONO

$('#modalAgregarPago #agregarPago').submit(function(e){
    e.preventDefault();
    var addform = $(this).serialize();
   
   $.ajax({
    url: "ajax/pagos.ajax.php",
    method: "POST",
    data: addform,
    // cache: false,
    // contentType: false,
    // processData: false,
    success: function(respuesta) {
      console.log(respuesta);
      if(respuesta == 'ok'){
        $('#modalAgregarPago').modal('hide');
        toastr.success("Abono agregado satisfactoriamente", "Abono realizado",{positionClass:'toast-bottom-right'});
        return window.location.reload();
      }else{
        return toastr.error("El abono supera el valor total de la boleta", "Abono superior",{positionClass:'toast-bottom-right'});
      }
    }
   });
  });

// *********************************************************************************
// VER PAGOS
$('#tablaPagos').on("click", ".btnVerPagos", function(){
  var idBoletaA = $(this).attr("idBoleta");
  var datos = new FormData();
  datos.append("idBoletaA", idBoletaA);

  $.ajax({
    url: "ajax/pagos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      // console.log(respuesta);
      var reporte = JSON.parse(respuesta)
      var datosHtml = '';
      var total = reporte.length;
      $("#tablaDetallePago tbody").empty();
      var numero1 = reporte[0]['Numero1'];
      var numero2 = reporte[0]['Numero2'];
      $('#numeros').text(numero1 + - + numero2);
      for (var i = 0; i < total; i++) {
        datosHtml +="<tr><td>"+reporte[i]['fecha']+"</td><td>"+reporte[i]['pago']+"</td></tr>";
      };
      $('#tablaDetallePago tbody').append(datosHtml);
    }
});
  $('#modalVerPagos').modal('show');
});
// *********************************************************************************
// BUSCAR PAGOS POR FECHA
$('#buscarPagos').on("click", ".btnBuscarPagos", function(e){
e.preventDefault();
var fechaPago = $('#fechaPago').val();
var datos = new FormData();
datos.append("fechaPago", fechaPago);


$.ajax({
  url: "ajax/pagos.ajax.php",
  method: "POST",
  data: datos,
  cache: false,
  contentType: false,
  processData: false,
  success: function(respuesta) {
    // console.log(respuesta);
    var reporte = JSON.parse(respuesta);
    var total = reporte['cantidad'];
    if(total == 0){
      $('#InfoPagos').css("display","none");
      $('#NoPagos').css("display","block");
    }else{
      $("#fechaTitulo").text("Información de pagos de fecha: "+fechaPago);
      $('#cantidadPag').text(reporte['cantidad']);
      $('#valorPag').text(reporte['suma']);
      $('#InfoPagos').css("display","block");
      $('#NoPagos').css("display","none");

    }
  }
});
})


});









