<div class="container">
<script type="text/javascript" src="././transporte.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
    <div class="container border">
        <div class="card card-primary" style="width:100%">
            <div class="card-header border" >
                <div class="row">
                    <div class="col-md-10">
                <h4 class="card-title"style="text-align:center">Listado Transportes</h4>
                </div>
                <button class="btn btn-success  align-content-end" style="width:15%" data-bs-toggle="modal" data-bs-target="#registro_transporte"><i class="glyphicon glyphicon-plus"></i>&nbsp;Nuevo Registro</button>
                </div> 
            
            
            </div>
            </div>
            <br>
            <table id="tabla_transporte" class="display" style="width:100%">
            <thead>
                <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>transporte</th>
                            <th>patente</th>
                            <th>V.T.V</th>
                            <th>Ruta</th>
                            <th>Poliza</th>
                            <th>Estado</th>
                            <th>Acci&oacute;n</th>
                </tr>
            </thead>     
            <tfoot>
                <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>transporte</th>
                            <th>patente</th>
                            <th>V.T.V</th>
                            <th>Ruta</th>
                            <th>Poliza</th>
                            <th>Estado</th>
                            <th>Acci&oacute;n</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal" tabindex="-1" id="registro_transporte">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-primary text-white p-1 d-inline-block">
        <h5 class="modal-title"  >Registro Vehiculo</h5>        
      </div>
      <div class="modal-body">
          <div class="container-fluid">
        <form onsubmit="return false" class="needs-validation" novalidate method="post" action="#" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <div class="card "  >
                          <img src="./vista/imagenes/camion.png" class="img-fluid" width="200" id="mostrarimagen">                         
                        </div>
                        <div class="col-mb-6">
                          <label for="">Foto</label><br>
                          <input type="file" class="form-control form-control-sm" id="seleccionararchivo">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                     <label for="">Tipo</label>
                     <input type="text" name="nombre" id="txt_tipo" placeholder="Nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                     <label for="">Marca</label>
                     <input type="text" name="nombre" id="txt_marca" placeholder="Nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                     <label for="">Patente</label>
                     <input type="text" name="nombre" id="txt_patente" placeholder="Nombre" class="form-control" required>
                    
                </div>
                
             
            </div>
            <div class="col-lg-12" style="text-align:center">
                  <br>
                   <p class="bg-primary text-white" ><b>Detalle vehiculo</b></p>                     
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                     <label for="">Fecha V.T.V</label>
                     <input type="date" name="nombre" id="txt_vtv" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Fecha R.U.T.A</label>
                     <input type="date" name="nombre" id="txt_ruta" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                     <label for="">Fecha Poliza Seguro</label>
                     <input type="date" name="nombre" id="txt_poliza" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Fecha Bramatologia</label>
                     <input type="date" name="nombre" id="txt_bramatologia" class="form-control form-control-sm" required>
                    </div>
                </div>
            </div>
            <div class="row">
                  <div class="col-lg-12">
                    <label for="">Observaciones</label>
                    <textarea name="" id="txt_observacion" cols="50" rows="3" class="form-control"></textarea>
                  </div>
                </div>
        </form>
        </div>
      </div>
      <div class="modal-footer justify-content-center" >
        <button type="button" class="btn btn-primary" onclick="Registrar()">Registrar</button>
      </div>
    </div>
  </div>
</div>


</div>
<div class="modal" tabindex="-1" id="editar_transporte" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-primary text-white p-1 d-inline-block">
        <h5 class="modal-title"  >Editar Vehiculo</h5>        
      </div>
      <div class="modal-body">
          <div class="container-fluid">
        <form onsubmit="return false" class="needs-validation" novalidate method="post" action="#" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <div class="card "  >
                          <img src="./vista/imagenes/camion.png" class="img-fluid" width="200" id="mostrarimagenEditar">                         
                        </div>
                        <div class="col-mb-6">
                          <label for="">Foto</label><br>
                          <input type="file" class="form-control form-control-sm" id="seleccionararchivoEditar">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                     <label for="">Tipo</label>
                     <input type="text" name="nombre" id="txt_idTransporte" class="form-control" disabled hidden>
                     <input type="text" name="nombre" id="txt_tipoEditar" placeholder="Nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                     <label for="">Marca</label>
                     <input type="text" name="nombre" id="txt_marcaEditar" placeholder="Nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                     <label for="">Patente</label>
                     <input type="text" name="nombre" id="txt_patenteEditar" placeholder="Nombre" class="form-control" required>
                    
                </div>
                
             
            </div>
            <div class="col-lg-12" style="text-align:center">
                  <br>
                   <p class="bg-primary text-white" ><b>Detalle vehiculo</b></p>                     
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                     <label for="">Fecha V.T.V</label>
                     <input type="date" name="nombre" id="txt_vtvEditar" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Fecha R.U.T.A</label>
                     <input type="date" name="nombre" id="txt_rutaEditar" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                     <label for="">Fecha Poliza Seguro</label>
                     <input type="date" name="nombre" id="txt_polizaEditar" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Fecha Bramatologia</label>
                     <input type="date" name="nombre" id="txt_bramatologiaEditar" class="form-control form-control-sm" required>
                    </div>
                </div>
            </div>
            <div class="row">
                  <div class="col-lg-12">
                    <label for="">Observaciones</label>
                    <textarea name="" id="txt_observacionEditar" cols="50" rows="3" class="form-control"></textarea>
                  </div>
                </div>
        </form>
        </div>
      </div>
      <div class="modal-footer justify-content-center" >
        <button type="button" class="btn btn-primary" onclick="Editar()">Editar</button>
      </div>
    </div>
  </div>
</div>


<script>
 (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()



    $(document).ready(function() {
        listar_transporte();


    });

   
document.getElementById("seleccionararchivo").addEventListener("change", () => {
            var archivoseleccionado = document.querySelector("#seleccionararchivo");
            var archivos = archivoseleccionado.files;
            var imagenPrevisualizacion = document.querySelector("#mostrarimagen");
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
            imagenPrevisualizacion.src = "";
            return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            var primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            var objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            imagenPrevisualizacion.src = objectURL;
        });

        document.getElementById("seleccionararchivoEditar").addEventListener("change", () => {
            var archivoseleccionado = document.querySelector("#seleccionararchivoEditar");
            var archivos = archivoseleccionado.files;
            var imagenPrevisualizacion = document.querySelector("#mostrarimagenEditar");
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
            imagenPrevisualizacion.src = "";
            return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            var primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            var objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            imagenPrevisualizacion.src = objectURL;
        });        
</script>