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
<div class="modal" tabindex="-1"  id="modal_persona" role="dialog" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center bg-primary p-1 d-inline-block">
                <h5 class="modal-title "><b>DATOS DE EMPLEADO</b></h5>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <img src="./vista/imagenes/avatar.png" class="img-fluid" width="300" id="mostrarimagenCard">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="modal-body">
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold"> Nombre</p>
                            </label>
                            <div class="col-sm-8 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_nombre" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold"> Apellido</p>
                            </label>
                            <div class="col-sm-8">
                                <p class="fs-5 fw-bold"><label for="" id="label_apellido" class="form-control-plaintext"></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold"> Direccion</p>
                            </label>
                            <div class="col-sm-8">
                                <p class="fs-5 fw-bold"><label for="" id="label_direccion" class="form-control-plaintext"></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold">Ciudad</p>
                            </label>
                            <div class="col-sm-8">
                                <p class="fs-5 fw-bold"><label for="" id="label_ciudad" class="form-control-plaintext"></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold">D.N.I</p>
                            </label>
                            <div class="col-sm-8">
                                <p class="fs-5 fw-bold"><label for="" id="label_dni" class="form-control-plaintext"></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold">Movil</p>
                            </label>
                            <div class="col-sm-8">
                                <p class="fs-5 fw-bold"><label for="" id="label_movil" class="form-control-plaintext"></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold">Fecha nacimiento</p>
                            </label>
                            <div class="col-sm-8">
                                <p class="fs-5 fw-bold"><label for="" id="label_nacimiento" class="form-control-plaintext"></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label">
                                <p class="fs-5 fw-bold">Fecha Ingreso</p>
                            </label>
                            <div class="col-sm-8">
                                <p class="fs-5 fw-bold"><label for="" id="label_ingreso" class="form-control-plaintext"></label></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="modal-body">
                        <div class="row ">
                            <label for="" class="col-sm-4 col-form-label ">
                                <p class="fs-5 fw-bold">Estado</p>
                            </label>
                            <div class="col-sm-8 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_estado" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label ">
                                <p class="fs-5 fw-bold">Esposa</p>
                            </label>
                            <div class="col-sm-8 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_nombreE" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label ">
                                <p class="fs-5 fw-bold">D.N.I</p>
                            </label>
                            <div class="col-sm-8 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_dniE" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label ">
                                <p class="fs-5 fw-bold">Movil</p>
                            </label>
                            <div class="col-sm-8 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_movilE" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-4 col-form-label ">
                                <p class="fs-5 fw-bold">Hijod</p>
                            </label>
                            <div class="col-sm-8 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_hijos" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-header text-center bg-primary p-1 d-inline-block">
                <h5 class="modal-title bg-primary"><b>DATOS DE BENEFICIARIO</b></h5>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="modal-body">
                        <div class="row">
                            <label for="" class="col-sm-3 col-form-label">
                                <p class="fs-5 fw-bold"> Nombre</p>
                            </label>
                            <div class="col-sm-6 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_nombreB" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-3 col-form-label">
                                <p class="fs-5 fw-bold"> D.N.I</p>
                            </label>
                            <div class="col-sm-6 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_dniB" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="modal-body">
                        <div class="row">
                            <label for="" class="col-sm-3 col-form-label">
                                <p class="fs-5 fw-bold"> Direccion</p>
                            </label>
                            <div class="col-sm-6 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_direccionB" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-sm-3 col-form-label">
                                <p class="fs-5 fw-bold"> Movil</p>
                            </label>
                            <div class="col-sm-6 text-left">
                                <p class="fs-5 fw-bold"><label for="" id="label_movilB" class="form-control-plaintext "></label></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
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