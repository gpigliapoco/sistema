<div class="container">
  <script type="text/javascript" src="./index.js?rev=<?php echo time(); ?>"></script>
  <div class="row">
    <div class="card text-white bg-primary mb-3 border" style="max-width: 18rem;">
      <div class="card-header text-center">EMPLEADOS</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <h2><label for="" id="index_emple"></label></h2>
          </div>
          <div class="col-md-6">
            <h1><i class="fa fa-users fa-2x "></i></h1>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center">TRANSPORTES</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <h2><label for="" id="index_trans"></label></h2>
          </div>
          <div class="col-md-6">
            <h1><i class=" fa fa-truck fa-2x"></i></h1>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
      <div class="card-header text-center">PLANES DE PAGO</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <h2><label for="" id="index_plan"></label></h2>
          </div>
          <div class="col-md-6">
            <h1><i class=" fa fa-institution fa-2x"></i></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="col-md-8">
<table id="tabla_index" class="display" style="width:100%">
            <thead>
                <tr>
                            <th>Plan</th>
                            <th>Cuit</th>
                            <th>Total</th>
                            <th>Cuotas</th>
                            <th>Estado</th>
                           
                </tr>
            </thead>     
            <tfoot>
                <tr>
                            <th>Plan</th>
                            <th>Cuit</th>
                            <th>Total</th>
                            <th>Cuotas</th>
                            <th>Estado</th>
                </tr>
            </tfoot>
        </table>
        </div>
  
</div>

<script>
  $(document).ready(function() {
    indexEmple();
    indexTransporte();
    indexPlan();
    listar_plan();
  });
</script>