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

function indexPlan(){
	$.ajax({
		url: "controlador/control_index_plan.php",
		type: "POST",
	}).done(function(resp){
		//alert(resp);  // para ver que datos trae
		var data=JSON.parse(resp);
        

        document.getElementById('index_plan').innerText = data;
		//$("#index_emple").val(data);
	})
}

var table; //// para poder llamar al reload en otra funcion.

function listar_plan(){
	table = $("#tabla_index").DataTable({
	  "ordering":true,   
	  "bLengthChange":false,
	  "searching": false,
	  "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	  "pageLength": 10,
	  "destroy":true,
	  "async": false ,
	  "processing": true,
	  "ajax":{
		   url:"controlador/control_index_listar.php",
		  type:'POST'
		  
	  },
	  "columns":[
		  {"data":"plan"},
		  {"data":"cuit"},
		  {"data":"total",
		  render:function(data,type,row){
								
			
			return "<span class='label text-dark'>$ "+data+"</span>";
		
			}},		 
		  {"data":"cuotas"},		 	
		  {"data":"estado",
		  render:function(data,type,row){
								
			if(data=='activo'){
				return "<span class='label text-dark'>"+data+"</span>";
			}else{
				return "<span class='label bg-danger text-white'>"+data+"</span>";
			}
		}},	
		
                 
		  
		  
	  ],

	  "language":idioma_espanol,
	  select: true
  });
   }