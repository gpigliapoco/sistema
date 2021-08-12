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

    <title>Hello, world!</title>
  </head>
  <body>
    <script type="text/javascript" src="empleados.js?rev=<?php echo time(); ?>"></script>
    <header class="container-fluid bg-primary d-flex justify-content-center">
      <h3 class="text-light">Felisan</h3>
    </header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Secciones</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Empleados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Sector</a>
            </li>           
          </ul>          
        </div>
      </div>
    </nav>
    <br>
    <section>
      <div class="container">
        <div class="card text-dark bg-light" style="width:100%">
          <div class="card-header">
            <h3 class="text-center">Listado empleados</h3>
            <div class="align-content-end">
              <button class="btn btn-success " style="width:15%" onclick="cargar_contenido('contenido_principal','empleados/registro_empleados.php')"><i class="glyphicon glyphicon-plus"></i>&nbsp;Nuevo Registro</button>
            </div>
        
           
        </div>
        </div>
        <br>
        <table id="tabla_empleados" class="display" style="width:100%">
          <thead>
              <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Movil</th>
                        <th>Sector</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
              </tr>
          </thead>     
          <tfoot>
              <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Movil</th>
                        <th>Sector</th>
                        <th>Estado</th>
                        <th>Acci&oacute;n</th>
              </tr>
          </tfoot>
      </table>
      </div>
    </section>


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
  </script>
    

  
   
    <script src="plugins/bootstrap-5.0.2-dist/js/bootstrap.min.js" ></script>
    <!-- <script src="plugins/datatable/datatables.min.js"></script>   
    <script src="plugins/datatable/jquery.dataTables.min.js"></script>    
     <script src="plugins/datatable/jQuery-3.3.1/jquery-3.3.1.min.js"></script>  -->

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
      <script>
      $(document).ready(function() {
        listar_empleados(); 
        } );  
           
  </script>
     

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>