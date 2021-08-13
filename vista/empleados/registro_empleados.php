<div class="container">
<script type="text/javascript" src="././empleados.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
          <div class="card card-primary" >
            <div class="card-header" style="text-align:center" >
              <h3 class="card-title" ><b> REGISTRO DE EMPLEADO</b></h3>

            
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form onsubmit="return false" class="needs-validation" novalidate method="POST" action="#" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                     <label for="">Nombre</label>
                     <input type="text" name="nombre" id="txt_nombre" placeholder="Nombre" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Direccion</label>
                     <input type="text" name="nombre" id="txt_direccion" placeholder="Direccion" class="form-control form-control-sm"required >
                    </div>
                    <div class="form-group">
                     <label for="">Documento</label>
                     <input type="text" name="nombre" id="txt_dni" placeholder="Documento" class="form-control form-control-sm" onkeypress="return soloNumeros(event)" required>
                    </div>
                    <br>
                    <div class="form-group">
                    <div class="col-md-3"></div>
                    
                        <div class="card"  >
                          <img src="./vista/imagenes/avatar.png" class="img-fluid" width="300" id="mostrarimagen">                         
                        </div>
                        <div class="col-mb-3">
                          <label for="">Foto perfil</label><br>
                          <input type="file" class="form-control form-control-sm" id="seleccionararchivo">
                        </div>
                     
                     
                     </div>   
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                     <label for="">Apellido</label>
                     <input type="text" name="nombre" id="txt_apellido" placeholder="Apellido" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Ciudad</label>
                     <input type="text" name="nombre" id="txt_ciudad" placeholder="Ciudad" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                     <label for="">Movil</label>
                     <input type="text" name="nombre" id="txt_movil" placeholder="Movil" class="form-control form-control-sm" onkeypress="return soloNumeros(event)" required>
                    </div>
                    <div class="form-group">
                     <label for="">Sexo</label>
                     <select class="form-select form-select-sm" name="state" id="cbm_sexo" style="width:100%;">
                                <option value="m">MASCULINO</option>
                                <option value="f">FEMENINO</option>
                            </select>
                    </div>
                    <div class="form-group">
                     <label for="">Fecha de nacimiento</label>
                     <input type="date" name="nombre" id="txt_fechaN" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Estado Civil</label>
                     <select class="form-select form-select-sm" name="state" id="cbm_estadoCivil" style="width:100%;">
                                <option value="s">SOLTERO</option>
                                <option value="c">CASADO</option>
                            </select>
                    </div>
                    <div class="form-group">
                     <label for="">Fecha Ingreso</label>
                     <input type="date" name="nombre" id="txt_ingreso" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                     <label for="">Cargo</label>
                     <select class="form-select form-select-sm" name="state" id="cbm_cargo" style="width:100%;">
                                 </select>
                    </div>

                  </div>
                  <div class="col-lg-12"></div>
                  <div class="col-lg-12" style="text-align:center">
                  <br>
                   <p class="bg-primary text-white"><b>Datos Del Beneficiario</b></p>                     
                  </div> 
                    <div class="col-lg-6">
                     <label for="">Nombre</label>
                     <input type="text" name="nombre" id="txt_nombreBenef" placeholder="Nombre" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-lg-6">
                     <label for="">Documento</label>
                     <input type="text" name="nombre" id="txt_dniBenef" placeholder="Documento" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-6">
                     <label for="">Direccion</label>
                     <input type="text" name="nombre" id="txt_direccionBenef" placeholder="Direccion" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-lg-6">
                     <label for="">Movil</label>
                     <input type="text" name="nombre" id="txt_movilBenef" placeholder="Movil" class="form-control form-control-sm" onkeypress="return soloNumeros(event)"required>
                    </div>
                    
                    <div class="col-md-12">
                      <br>
          <!-- Custom Tabs -->
          <div class="">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos Conyuge</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Registro</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Obsevaciones</button>
              </li>
            </ul>
            <br>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-lg-6">
                     <label for="">Nombre Esposa</label>
                     <input type="text" name="nombre" id="txt_nombreEsposa" placeholder="Nombre" class="form-control form-control-sm">
                  </div>
                  <div class="col-lg-6">
                     <label for="">documento</label>
                     <input type="text" name="nombre" id="txt_dniEsposa" placeholder="Documento" class="form-control form-control-sm" onkeypress="return soloNumeros(event)">
                  </div>
                  <div class="col-lg-8">
                     <label for="">Movil</label>
                     <input type="text" name="nombre" id="txt_movilEsposa" placeholder="Movil" class="form-control form-control-sm" onkeypress="return soloNumeros(event)">
                  </div>
                  <div class="col-lg-4">
                     <label for="">Hijos Cantidad</label>
                     <input type="text" name="nombre" id="txt_hijos" placeholder="Cantidad" class="form-control form-control-sm" maxlenght="2" onkeypress="return soloNumeros(event)" >
                  </div>
                </div>
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-lg-2">
                     <label for="">Reg.Moyano</label>
                      <select class="form-select form-select-sm" name="state" id="cbm_registro" style="width:100%;">
                                <option value="s">SI</option>
                                <option value="n">NO</option>
                            </select>
                  </div>
                  <div class="col-lg-6">
                     <label for="">Registro Conducir</label>
                     <input type="text" name="nombre" id="txt_registro" placeholder="Numero de Registro" class="form-control form-control-sm">
                  </div> <div class="col-lg-4">
                     <label for="">fecha Vencimiento</label>
                     <input type="date" name="nombre" id="txt_vencimiento" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                  <div class="col-lg-12">
                    <label for="">Observaciones</label>
                    <textarea name="" id="txt_observacion" cols="50" rows="3" class="form-control"></textarea>
                  </div>
                </div>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          <br>
        </div>
        
        <div class="card-footer">
          <div class="col-lg-12" style="text-align:center">
            <button class="btn btn-primary btn-lg" style="width:100%"  onclick="Registrar()">Registrar</button>
          </div>
        </div>
            </div>
            <!-- /.box-body -->
                </div>          
              </div>            
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
        <script>
//         function archivo(evt) {
//             var files = evt.target.files; // FileList object
//             // Obtenemos la imagen del campo "file".
//             for (var i = 0, f; f = files[i]; i++) {
//                 //Solo admitimos imágenes.
//                 if (!f.type.match('image.*')) {
//                     continue;
//                 }
//                 var reader = new FileReader();
//                 reader.onload = (function (theFile) {
//                     return function (e) {
//                         // Insertamos la imagen
//                         document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
//                     };
//                 })(f);
//                 reader.readAsDataURL(f);
//             }
//         }
//         document.getElementById('file').addEventListener('change', archivo, false);

//         function ver(){
	    

//       	alert(file);
// }

// Example starter JavaScript for disabling form submissions if there are invalid fields
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

comboRol();

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
    </script>

      