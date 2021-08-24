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
  </div>
</div>
<div class="container">
  
  <div class="row" id="fila_card">
    <div class="card text-white bg-primary mb-3 border" style="max-width: 18rem;">
      <div class="card-header text-center">Plan</div>
      <div class="card-body">
        <div class="row border">
          <div class="col-md-3 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">plan</label></h6>
            </div>
          </div> 
          <div class="col-md-9 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">plan</label></h6>
            </div>
          </div>             
        </div>
        <div class="row border">
          <div class="col-md-3 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">Total</label></h6>
            </div>
          </div> 
          <div class="col-md-9 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">to</label></h6>
            </div>
          </div>             
        </div>
        <div class="row border">
          <div class="col-md-4 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">Cuotas</label></h6>
            </div>
          </div> 
          <div class="col-md-8 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">c</label></h6>
            </div>
          </div>             
        </div>
        <div class="row border">
          <div class="col-md-4 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">Pagado</label></h6>
            </div>
          </div> 
          <div class="col-md-8 border">
            <div class="col-md-3  justify-content-center align-items-center">
              <h6><label for="" id="index_emple">p</label></h6>
            </div>
          </div>             
        </div>
      </div>

    </div>
    <br>
  
  </div>
</div>

<script>
  $(document).ready(function() {
    indexEmple();
    indexTransporte()

  });
</script>