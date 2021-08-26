<div class="container">
<script type="text/javascript" src="././plan.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
<div class="col-md-12 bg-primary text-white p-1 d-inline-block border">
        <h4 class="card-title"style="text-align:center">PLANES DE PAGO</h4>
       </div>
        <div class="container border">
            <div class="row">
                <div class="col-md-4 ">
                   <div class="col-sm-3 h-auto d-inline-block text-end ">
                    <p class="fs-6 fw-bold text-right" ><label for="">Plan :</label></p>
                  </div>
                  <div class="col-sm-8 h-auto d-inline-block  ">
                    <label for="" id="label_plan"></label>
                    </div> 
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                    <p class="fs-6 fw-bold text-right" ><label for="">Total :</label></p>
                  </div>
                  <div class="col-sm-8 h-auto d-inline-block ">
                    <label for="" id="label_total"></label>
                    </div> 
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                    <p class="fs-6 fw-bold text-right" ><label for="">Estado :</label></p>
                  </div>
                  <div class="col-sm-8 h-auto d-inline-block ">
                    <label for="" id="label_estado"></label>
                    </div> 
                </div>
                <div class="col-md-4  ">
                   <div class="col-sm-3 h-auto d-inline-block text-end ">
                    <p class="fs-6 fw-bold text-right" ><label for="">C.U.I.T :</label></p>
                  </div>
                  <div class="col-sm-8 h-auto d-inline-block ">
                    <label for="" id="label_cuit"></label>
                    </div> 
                    <div class="col-sm-3 h-auto d-inline-block text-end ">
                    <p class="fs-6 fw-bold text-right" ><label for="">Pagado :</label></p>
                  </div>
                  <div class="col-sm-8 h-auto d-inline-block  ">
                    <label for="" id="label_pagado"></label>
                    </div> 
                </div>
                <div class="col-md-4">
                  <div>
                <button class="btn btn-success  align-content-end"  data-bs-toggle="modal" data-bs-target="#registro_plan"><i class="glyphicon glyphicon-plus"></i>&nbsp;Nuevo Plan</button>
                <button class="btn btn-success  align-content-end"  data-bs-toggle="modal" data-bs-target="#editar_plan"><i class="glyphicon glyphicon-plus"></i>&nbsp;Editar Plan</button>
                </div>
                <br>
                <div>
                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="cbm_select">
                    
                  </select>
                  </div>
                </div>
                     
            </div>
            
            <div class="row ">
                <div class="col-md-12">
                  <div class="col-sm-1 h-auto d-inline-block text-end ">
                    <p class="fs-6 fw-bold text-right" ><label for="">Detalle :</label></p>
                  </div>
                  <div class="col-sm-9 h-auto d-inline-block ">
                    <label for="" id="label_detalle"></label>
                  </div>                
            </div>
        </div>
    </div>
    <div class="container border">
        <div class="card card-primary" style="width:100%">
            <div class="card-header border bg-primary text-white p-1 d-inline-block " >
                <div class="row">
                    <div class="col-md-12 ">
                      <h6 class="card-title"style="text-align:center">Detalle De Cuotas</h6>
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
                    <div class="input-group">
                    <span class="input-group-text form-control-sm">$</span> <input type="text"class="form-control form-control-sm" aria-label="Amount (to the nearest dollar) "id="txt_total">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="" >Fecha</label>
                    <input type="date"class="form-control form-control-sm" id="txt_fechaPlan">
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
        <button type="button" class="btn btn-primary" onclick="registrar()">Registrar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
<div class="modal" tabindex="-1" id="editar_plan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-primary text-white p-1 d-inline-block">
        <h5 class="modal-title"  >Editar Plan de Pago</h5>        
      </div>
      <div class="modal-body">
          <div class="container-fluid">
        <form onsubmit="return false" class="needs-validation" novalidate method="post" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 ">
                    <label for="">Plan</label>
                    <input type="text" name="nombre" id="txt_idplan" class="form-control" disabled hidden>
                    <input type="text"class="form-control form-control-sm" id="txt_planEditar">
                </div>
                <div class="col-md-3">
                    <label for="" >Cuit</label>
                    <input type="text"class="form-control form-control-sm" id="txt_cuitEditar">
                </div>
                <div class="col-md-3">
                    <label for="" >Total</label>
                    <div class="input-group">
                    <span class="input-group-text form-control-sm">$</span> <input type="text"class="form-control form-control-sm" aria-label="Amount (to the nearest dollar) "id="txt_totalEditar">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="" >Fecha</label>
                    <input type="date"class="form-control form-control-sm" id="txt_fechaPlanEditar">
                </div>                                 
            </div>
            <div class="row ">
                <div class="col-md-12" >
                    <label for="" >Detalle</label>
                    <input type="text"class="form-control" id="txt_detalleEditar">
                </div>                       
            </div>
            <div class="row ">
               <div class="col-md-3">
                    <label for="" >Estado</label>
                    <select class="form-select" aria-label="Default select example" id="cbm_estadoEditar">
                      <option value="activo">activo</option>
                      <option value="inactivo">inactivo</option>
                      
                    </select>
                   
                </div>           
                            
            </div>
           
      </div>
      <div class="modal-footer justify-content-center" >
        <button type="button" class="btn btn-primary" onclick="editar()">Editar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
      comboRolplan();
       // listar_plan();

               $("#cbm_select").change(function(){ ////funcion para que cambie el combobox de medico
                var id=$("#cbm_select").val();
                
                verPlan(id);
                listar_plan(id);
            }) 
    });
</script>