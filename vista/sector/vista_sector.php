<div class="container">
<script type="text/javascript" src="././sector.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border" style="text-align:center">
              <h3 class="card-title">BIENVENIDO A SECTOR </h3>
             
           
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <form autocomplete="false" onsubmit="return false">
                            <div class="card card-primary">
                                <div class="card-header" style="text-align:center">
                                
                                <h4 class="card-title"><b>Registrar sector </b></h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <label for="">Sector</label>
                                        <input type="text" class="form-control" id="txt_nombre" placeholder="Ingrese sector"><br>
                                    </div>               
                                </div>            
                                <div class="card-footer" style="text-align:center" >
                                    <button class="btn btn-primary" onclick="registrarSector()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                                
                                </div>
                            </div>
            
                            </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header" style="text-align:center">                                
                                <h4 class="card-title"><b>Sectores </b></h4>
                            </div>
                            <table id="tabla_sector" class="display responsive nowrap" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sector</th>                                       
                                    
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Sector</th>                                              
                                        
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>                       
                                               
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
</div>


<script>
$(document).ready(function() {
    listar_sector();
    
} );



</script>