<div class="container">
<script type="text/javascript" src="././plan.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
        <div class="container">
            <div class="row border">
                <div class="col-md-4">
                    <label for="">plan</label>
                    <label for="">plan</label>
                </div>
                <div class="col-md-4">
                    <label for="">Cuit</label>
                    <label for="">Cuit</label>
                </div>
                <div class="col-md-4">
                <button class="btn btn-success  align-content-end"  data-bs-toggle="modal" data-bs-target="#registro_plan"><i class="glyphicon glyphicon-plus"></i>&nbsp;Nuevo Plan</button>
                  <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                    
                </div>        
            </div>
            <div class="row border">
                <div class="col-md-6">
                    <label for="">detalle</label>
                    <label for="">detalle</label>
                </div>
                <div class="col-md-3">
                    <label for="">total</label>
                    <label for="">total</label>
                </div>
                <div class="col-md-3">
                    <label for="">pagado</label>
                    <label for="">pagado</label>
                </div>        
            </div>
        </div>
    </div>
    <div class="container border">
        <div class="card card-primary" style="width:100%">
            <div class="card-header border" >
                <div class="row">
                    <div class="col-md-10">
                      <h4 class="card-title"style="text-align:center">Planes De Pago</h4>
                    </div>
                </div>            
            </div>
            </div>
            <br>
            <table id="tabla_planes" class="display" style="width:100%">
            <thead>
                <tr>
                            <th>#</th>
                            <th>Plan</th>
                            <th>Cuit</th>
                            <th>Cuota</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Estado</th>
                            <th>Acci&oacute;n</th>
                </tr>
            </thead>     
            <tfoot>
                <tr>
                            <th>#</th>
                            <th>Plan</th>
                            <th>Cuit</th>
                            <th>Cuota</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Estado</th>
                            <th>Acci&oacute;n</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal" tabindex="-1" id="registro_plan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-primary text-white p-1 d-inline-block">
        <h5 class="modal-title"  >Registro Plan de Pago</h5>        
      </div>
      <div class="modal-body">
          <div class="container-fluid">
        <form onsubmit="return false" class="needs-validation" novalidate method="post" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 ">
                    <label for="">Plan</label>
                    <input type="text"class="form-control form-control-sm" id="txt_plan">
                </div>
                <div class="col-md-3">
                    <label for="" >Cuit</label>
                    <input type="text"class="form-control form-control-sm" id="txt_cuit">
                </div>
                <div class="col-md-3">
                    <label for="" >Total</label>
                    <input type="text"class="form-control form-control-sm" id="txt_total">
                </div>
                <div class="col-md-3">
                    <label for="" >Fecha</label>
                    <input type="date"class="form-control form-control-sm" id="txt_fecha">
                </div>                                 
            </div>
            <div class="row ">
                <div class="col-md-12" >
                    <label for="" >Detalle</label>
                    <input type="text"class="form-control" id="txt_detalle">
                </div>
                       
            </div>
            <div class="col-lg-12" style="text-align:center">
                  <br>
                   <p class="bg-primary text-white" ><b>Detalle Cuota</b></p>                     
            </div> 
            <div class="row">
                     
                      <div class="col-md-2">
                        <label for="" >Cuota</label>
                        <input type="text" class="form-control form-control-sm" id="txt_cuota">
                      </div>
                      <div class="col-md-4">
                        <label for="" >Fecha</label>
                        <input type="date" class="form-control form-control-sm" id="txt_fecha">
                      </div>
                      <div class="col-md-4">
                        <label for="">Monto</label>
                        <input type="text" class="form-control form-control-sm" id="txt_monto">
                      </div>

                      <div class="col-md-2">
                        <label>&nbsp;</label>
                        <button type="button" class="btn btn-primary form-control"  onclick="agregarCuota()"><i class="fa fa-plus-square"></i>&nbsp;agregar</button>
                      </div>
                      <div class="col-md-12 table-responsive"><br>
                        <table id="tabla_cuota" style="width:100%" class="display">
                          <thead >
                           
                            <th>CUOTA</th>
                            <th>FECHA</th>
                            <th>MONTO</th>
                            <th>ACCION</th>
                          </thead> 
                          <tbody id="tbody_tabla_cuota">
                          </tbody>
                        </table>
                      </div>
                </div>
        
        </div>
      </div>
      <div class="modal-footer justify-content-center" >
        <button type="button" class="btn btn-primary" onclick="Registrar()">Registrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>


<script>
    $(document).ready(function() {
        listar_plan();


    });
</script>