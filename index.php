<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="plugins/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" >
    
    <link rel="stylesheet" href="plugins/datatable/datatables.min.css">
    <link rel="stylesheet" href="plugins/datatable/DataTables-1.10.25/css/jquery.dataTables.min.css">

    <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

    <title>FELISAN</title>
  </head>
  <body>
    
    <header class="container-fluid bg-primary d-flex justify-content-center sticky-top">
      <h3 class="text-light">Felisan</h3>
    </header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light border sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Secciones</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" onclick="cargar_contenido('contenido_principal','vista/empleados/vista_empleados.php')"  >Empleados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" onclick="cargar_contenido('contenido_principal','vista/sector/vista_sector.php')">Sector</a>
            </li>    
            <li class="nav-item">
              <a class="nav-link active" onclick="cargar_contenido('contenido_principal','vista/transporte/vista_transporte.php')">Transportes</a>
            </li>          
          </ul>          
        </div>
      </div>
    </nav>
    <br>
    <section id="contenido_principal">
     
    </section>
    <div class="modal fade" tabindex="-1" id="modal_transporte" data-backdrop="false" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-primary p-1 d-inline-block">
        <h5 class="modal-title">DATOS TRANPORTE</h5>       
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-md-4">
                <div class="card ">
                    <img src="./vista/imagenes/avatar.png" class="img-fluid" width="300" id="mostrarimagenCardV">
                </div>
           </div>
           <div class="col-md-8">
               <div class="row justify-content-start  " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold text-right" ><label for=" " class="form-control-plaintext ">Tipo </label></p>
                    </div>
                    <div class="col-auto  h-auto d-inline-block  text-left">
                        <p class="fs-6 "><label for="" id="label_tipo" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Marca</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block  text-left">
                        <p class="fs-6"><label for="" id="label_marca" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Patente</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block  text-left">
                        <p class="fs-6"><label for="" id="label_patente" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Estado</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block  text-left">
                        <p class="fs-6"><label for="" id="label_estado" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               
           </div>
       </div>
       
       <div class="row">
            <div class="modal-header text-center bg-primary p-1 d-inline-block">
                <h5 class="modal-title bg-primary"><b>DATOS DE BENEFICIARIO</b></h5>
            </div>
       </div>
       <div class="row">
           <div class="col-md-6">
                <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Verificacion</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_vtv" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Ruta</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_ruta" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
           <div class="col-md-6">
                <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Poliza</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_poliza" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Bramatologia</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_brama" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
       </div>
      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->
    
  <script>
    var idioma_espanol = {
			select: {
			rows: "%d fila seleccionada"
			},
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
			"sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
			"sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "<b>No se encontraron datos</b>",
			"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
			},
			"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
	 }
   function cargar_contenido(contenido,contenedor){
    $("#"+contenido).load(contenedor);
  }

  function soloNumeros(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8){
          return true;
      }
      // Patron de entrada, en este caso solo acepta numeros
      patron =/[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
  }
  function soloLetras(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = "8-37-39-46";
      tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }
      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  } 



  
  </script>
    

  
   
    <script src="plugins/bootstrap-5.0.2-dist/js/bootstrap.min.js" ></script>
    <!-- <script src="plugins/datatable/datatables.min.js"></script>   
    <script src="plugins/datatable/jquery.dataTables.min.js"></script>    
     <script src="plugins/datatable/jQuery-3.3.1/jquery-3.3.1.min.js"></script>  -->
      <script src="transporte.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
     <script src="plugins/sweetalert2/sweetalert2.js"></script>
      <script>
    
           
  </script>
     

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>