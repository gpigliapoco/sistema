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
		  render:$.fn.dataTable.render.number( ',', '.', 0, '$' )
								
			
			//return "<span class='label text-dark'>$ "+data+"</span>";
		
			},		 
		  {"data":"cuotas"},
		  {"data":"pagada",
		  render:$.fn.dataTable.render.number( ',', '.', 0, '$' )
		  },
		  {"data":"cuotaPaga"},		 	
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

   var table1;
   function listar_plan_vencimiento(){
	table1 = $("#tabla_vencimientos").DataTable({
	  "ordering":true,   
	  "bLengthChange":false,
	  "searching": false,
	  "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	  "pageLength": 10,
	  "destroy":true,
	  "async": false ,
	  "processing": true,
	  "ajax":{
		   url:"controlador/control_listar_vencimiento.php",
		  type:'POST'
		  
	  },
	  "columns":[
		  {"data":"plan"},
		  {"data":"cuit"},
		  {"data":"cuota"},
		  {"data":"total_cuota",
		  render:$.fn.dataTable.render.number( ',', '.', 0, '$' )
								
			
			//return "<span class='label text-dark'>$ "+data+"</span>";
		
			},		 
			{"data":"fechaDet",
			render:function(data,type,row){
							  
		  
		  return "<span class='label text-dark'>"+fecha(data)+"</span>";
	  
		  }},		 	
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

   function fecha(dat){
	var fecha=new Date(dat);
	var fechaNueva="";
	//alert(dat);
	var day="";
	var mes="";


	if(dat=="0000-00-00"){
	  	fechaNueva="00-00-0000"
	}else{
		if((fecha.getDate()+1)<10){
			day="0"+(fecha.getDate()+1);
		}else{
			day=(fecha.getDate()+1);
		}
		if((fecha.getMonth()+1)<10){
			mes="0"+(fecha.getMonth()+1);
		}else{
			mes=(fecha.getMonth()+1);
		}
		
	 fechaNueva=day+"-"+mes+"-"+fecha.getFullYear();
	}

	return fechaNueva;

   }

  /*  DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarIndexVenc`()
SELECT planespago.plan,planespago.cuit,detalleplan.cuota,detalleplan.total_cuota,detalleplan.fechaDet,detalleplan.estado FROM detalleplan INNER JOIN planespago ON planespago.idplanesPago=detalleplan.idplan_detalle 
WHERE detalleplan.estado="debe" AND planespago.estado="activo" GROUP BY detalleplan.idplan_detalle$$
DELIMITER ; */