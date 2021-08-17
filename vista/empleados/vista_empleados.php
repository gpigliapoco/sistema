<div class="container">
<script type="text/javascript" src="././empleados.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
    <div class="container border">
        <div class="card card-primary" style="width:100%">
            <div class="card-header border" >
                <div class="row">
                    <div class="col-md-10">
                <h4 class="card-title"style="text-align:center">Listado empleados</h4>
                </div>
                <button class="btn btn-success  align-content-end" style="width:15%" onclick="cargar_contenido('contenido_principal','vista/empleados/registro_empleados.php')"><i class="glyphicon glyphicon-plus"></i>&nbsp;Nuevo Registro</button>
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
</div>

<div class="modal" tabindex="-1" id="modal_persona">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-primary p-1 d-inline-block">
        <h5 class="modal-title">DATOS EMPLEADO</h5>       
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-md-4">
                <div class="card ">
                    <img src="./vista/imagenes/avatar.png" class="img-fluid" width="300" id="mostrarimagenCard">
                </div>
           </div>
           <div class="col-md-8">
               <div class="row justify-content-start  " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold text-right" ><label for=" " class="form-control-plaintext "> Nombre </label></p>
                    </div>
                    <div class="col-auto  h-auto d-inline-block  text-left">
                        <p class="fs-6 "><label for="" id="label_nombre" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Apellido</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block  text-left">
                        <p class="fs-6"><label for="" id="label_apellido" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Direccion</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block  text-left">
                        <p class="fs-6"><label for="" id="label_direccion" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Ciudad</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block  text-left">
                        <p class="fs-6"><label for="" id="label_ciudad" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> D.N.I</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_dni" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Movil</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_movil" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Estado Civil</label></p>
                    </div>
                    <div class="col-auto h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_estado" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6">
                <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-6 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Fecha Nacimiento</label></p>
                    </div>
                    <div class="col-sm-6 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_nacimiento" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-6 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Fecha Ingreso</label></p>
                    </div>
                    <div class="col-6 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_ingreso" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
           <div class="col-md-6">
           <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Sector</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_sector" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start" style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Estado</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_status" class="form-control-plaintext "></label></p>
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
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Nombre</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_nombreB" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> D.N.I</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_dniB" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
           <div class="col-md-6">
                <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Direccion</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_direccionB" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Movil</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_movilB" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
       </div>
       <div class="row">
            <div class="modal-header text-center bg-primary p-1 d-inline-block">
                <h5 class="modal-title bg-primary"><b>DATOS DE CONYUGE</b></h5>
            </div>
       </div>
       <div class="row">
           <div class="col-md-6">
                <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> Nombre</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_nombreE" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext "> D.N.I</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_dniE" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
           <div class="col-md-6">
                <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Movil</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_movilE" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Hijos</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_hijos" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
       </div>
       <div class="row">
            <div class="modal-header text-center bg-primary p-1 d-inline-block">
                <h5 class="modal-title bg-primary"><b>DATOS DE EXTRA</b></h5>
            </div>
       </div>
       <div class="row">
           <div class="col-md-6">
                <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Reg.Moyano</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_moyano" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Registro N°</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_registro" class="form-control-plaintext "></label></p>
                    </div>
               </div>
           </div>
           <div class="col-md-6">
                <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">Vencimiento</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_vencimiento" class="form-control-plaintext "></label></p>
                    </div>
               </div>
               <div class="row justify-content-start " style="height: 40px;">
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                        <p class="fs-6 fw-bold"><label for=" " class="form-control-plaintext ">observacion</label></p>
                    </div>
                    <div class="col-sm-9 h-auto d-inline-block   text-left">
                        <p class="fs-6"><label for="" id="label_observacion" class="form-control-plaintext "></label></p>
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
</div>


<script>
    $(document).ready(function() {
        listar_empleados();


    });
</script>