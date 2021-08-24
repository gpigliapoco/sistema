function indexEmple(){
	$.ajax({
		url: "controlador/control_index_emple.php",
		type: "POST",
	}).done(function(resp){
		//alert(resp);  // para ver que datos trae
		var data=JSON.parse(resp);
        

        document.getElementById('index_emple').innerText = data;
		//$("#index_emple").val(data);
	})
}

function indexTransporte(){
	$.ajax({
		url: "controlador/control_index_transporte.php",
		type: "POST",
	}).done(function(resp){
		//alert(resp);  // para ver que datos trae
		var data=JSON.parse(resp);
        

        document.getElementById('index_trans').innerText = data;
		//$("#index_emple").val(data);
	})
}

function cardIndex(){
	$.ajax({
		url: "controlador/plan/control_comboplan.php",
		type: "POST",
	}).done(function(resp){
		//alert(resp);  // para ver que datos trae
		var data=JSON.parse(resp);
		var cadena="";
	/* 	 alert(data);
		alert(data[0].rol);
		for(var i=0;i < data.length;i++){
			alert(data[i].rol);			// prueba de recorrido de datos.
		}  */
		if(data.length>0){
			for(var i=0;i < data.length;i++){
				//cadena+="<option value='"+data[i].idplanesPago+"'>"+data[i].planes+"</option>";
			


			
			}


			$("#fila_card").html(cadena);
			
		}
	})
}

function cardPlan(id){

	$.ajax({
		url:"",
		type:"post",
		data:{
			id:id
		}
	}).done(function(resp){

		var data=JSON.parse(resp);

		document.write("<div class='card text-white bg-primary mb-3 border' style='max-width: 18rem;'>");
		document.write("<div class='card-header text-center'>Plan</div>");
		document.write("<div class='card-body'>
		document.write("<div class="row border">
		document.write("<div class="col-md-3 border">
        document.write("<div class="col-md-3  justify-content-center align-items-center">
		document.write("    <h6><label for="" id="index_emple">plan</label></h6>
        document.write("   </div>
        document.write(" </div> 
        document.write(" <div class="col-md-9 border">
        document.write    <div class="col-md-3  justify-content-center align-items-center">
        document.write      <h6><label for="" id="index_emple">plan</label></h6>
        document.write    </div>
        document.write  </div>             
		document.write </div>
        document.write<div class="row border">
        document.write  <div class="col-md-3 border">
        document.write    <div class="col-md-3  justify-content-center align-items-center">
        document.write      <h6><label for="" id="index_emple">Total</label></h6>
        document.write    </div>
        document.write  </div> 
        document.write  <div class="col-md-9 border">
        document.write    <div class="col-md-3  justify-content-center align-items-center">
        document.write      <h6><label for="" id="index_emple">to</label></h6>
        document.write    </div>
        document.write  </div>             
        document.write</div>
        document.write<div class="row border">
        document.write  <div class="col-md-4 border">
        document.write    <div class="col-md-3  justify-content-center align-items-center">
		document.write     <h6><label for="" id="index_emple">Cuotas</label></h6>
		document.write   </div>
        document.write  </div> 
        document.write  <div class="col-md-8 border">
        document.write    <div class="col-md-3  justify-content-center align-items-center">
        document.write      <h6><label for="" id="index_emple">c</label></h6>
        document.write    </div>
        document.write  </div>             
        document.write</div>
        document.write<div class="row border">
        document.write  <div class="col-md-4 border">
        document.write    <div class="col-md-3  justify-content-center align-items-center">
        document.write      <h6><label for="" id="index_emple">Pagado</label></h6>
        document.write    </div>
        document.write  </div> 
        document.write  <div class="col-md-8 border">
        document.write    <div class="col-md-3  justify-content-center align-items-center">
        document.write      <h6><label for="" id="index_emple">p</label></h6>
        document.write    </div>
        document.write  </div>             
        document.write</div>
		document.write	</div>
        document.write</div>
        document.write<br></br>"

	})




}