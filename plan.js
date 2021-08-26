var table; //// para poder llamar al reload en otra funcion.

function listar_plan(id){
	table = $("#tabla_planes").DataTable({
	  "ordering":true,   
	  "bLengthChange":false,
	  "searching": { "regex": false },
	  "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	  "pageLength": 20,
	  "destroy":true,
	  "async": false ,
	  "processing": true,
	  "ajax":{
		   url:"controlador/plan/control_listar_plan.php",
		  type:'POST',
		  data:{
			  id:id
		  }
	  },
	  "columns":[
		  {"data":"cuota"},
		  {"data":"plan"},
		  {"data":"cuit"},		 
		  {"data":"cuota"},		 	
		  {"data":"fechaDet",
			  render:function(data,type,row){
								
			
			return "<span class='label text-dark'>"+fecha(data)+"</span>";
		
			}},		 
          {"data":"total_cuota",
		  render:$.fn.dataTable.render.number( ',', '.', 0, '$' )
								
			
			//	return "<span class='label text-dark'>$ "+data+"</span>";
			
		},

		  {"data":"estado",
		  render:function(data,type,row){
								
			if(data=='Pago'){
				return "<span class='label bg-success text-white'>"+data+"</span>";
			}else{
				return "<span class='label bg-danger text-white'>"+data+"</span>";
			}
		}},	
		  {"data":"estado",
			render:function(data,type,row){
				if(data=='Pago'){
					return "<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success' disabled><i class='fa fa-check'></i></button>&nbsp;";
				}else{
					return "<button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>&nbsp;";
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

   function agregarCuota(){
	var cuota=$("#txt_cuota").val();
	var fecha=$("#txt_fecha").val();
	var monto=$("#txt_monto").val();
	

	

	var agregarDatos="<tr>";
	 agregarDatos+= "<td for='id'>"+cuota+"</td>";
	 agregarDatos+= "<td>"+fecha+"</td>";
	 agregarDatos+= "<td>"+monto+"</td>";
	 agregarDatos+= "<td><button class='btn btn-danger' onclick='removeCuota(this)'><i class='fa fa-trash'></i></button></td>";
	 agregarDatos+= "</tr>";

	 $("#tbody_tabla_cuota").append(agregarDatos);
	 limpiarTabla();

}

function removeCuota(t){
	var td= t.parentNode;
	var tr= td.parentNode;
	var table= tr.parentNode;
	table.removeChild(tr);
}

function limpiarTabla(){
	$("#txt_cuota").val("");
	$("#txt_fecha").val("");
	$("#txt_monto").val("");

}

function registrar(){

	var plan=$("#txt_plan").val();
	var cuit=$("#txt_cuit").val();
	var total=$("#txt_total").val();
	var detalle=$("#txt_detalle").val();
	var fecha=$("#txt_fechaPlan").val();

	if(plan.length==0 || cuit.length==0 || total.length==0 ){

	 return	Swal.fire("Hay Campos vacios ","warning");
	}

	$.ajax({
		url:"controlador/plan/control_registrar_plan.php",
		type:"post",
		data:{
			plan:plan,
			cuit:cuit,
			total:total,
			detalle:detalle,
			fecha:fecha
		}
	}).done(function(resp){
		//alert(resp);
		registrar_cuotas(resp);
	})


}

function registrar_cuotas(id){
	var count=0;
	var arreglo_cuotas=new Array();
	var arreglo_fecha=new Array();
	var arreglo_monto=new Array();

	$("#tabla_cuota tbody#tbody_tabla_cuota tr").each(function(){
		arreglo_cuotas.push($(this).find('td').eq(0).text());
		arreglo_fecha.push($(this).find('td').eq(1).text());
		arreglo_monto.push($(this).find('td').eq(2).text());
		count++;

	})
	var arregloCuotas=arreglo_cuotas.toString(); /// loc onvierte en string para enviar al controlador
	var arregloFecha=arreglo_fecha.toString(); /// loc onvierte en string para enviar al controlador
	var arregloMonto=arreglo_monto.toString(); /// loc onvierte en string para enviar al controlador

	if(count==0){
		return;
	}

	

	$.ajax({
		url: "controlador/plan/control_registrar_cuotas.php",
		type: "POST",
		data: {
			id:id,
			arregloCuotas:arregloCuotas,
			arregloFecha:arregloFecha,
			arregloMonto:arregloMonto
			
		}
	}).done(function(resp){
		
		if(resp>0){
			Swal.fire("Mensaje De Confirmacion","Plan de Pagos registrado","success");
			$("#registro_plan").modal("hide");
		}
		else{
			Swal.fire("Mensaje De Confirmacion","no se puede registrar Plan de pagos","warning");
		}
	})
}

function comboRolplan(){
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
				cadena+="<option value='"+data[i].idplanesPago+"'>"+data[i].planes+"</option>";
			}
			$("#cbm_select").html(cadena);
				var id=$("#cbm_ select").val();
			//alert(id);
			verPlan(id);
		}
	})
}

function verPlan(id){

	
	$.ajax({
		url: "controlador/plan/control_verPlan.php",
		type: "POST",
		data:{
			id:id
		}
	}).done(function(resp){
		//alert(resp);  // para ver que datos trae
		var data=JSON.parse(resp);
	//	alert(data[0].total);
		if(data.length>0){
		
		
		document.getElementById('label_plan').innerText = data[0].plan;
		document.getElementById('label_total').innerText ='$ '+ data[0].total;
		document.getElementById('label_cuit').innerText = data[0].cuit;
		document.getElementById('label_detalle').innerText = data[0].detalle;
		document.getElementById('label_estado').innerText = data[0].estado;

		


		$("#txt_planEditar").val(data[0].plan);
		$("#txt_cuitEditar").val(data[0].cuit);
		$("#txt_totalEditar").val(data[0].total);
		$("#txt_detalleEditar").val(data[0].detalle);
		$("#txt_fechaPlanEditar").val(data[0].fecha);
		$("#txt_idplan").val(data[0].idplanesPago);
		$("#cbm_estadoEditar").val(data[0].estado).trigger("change");
		
		listar_plan(data[0].idplanesPago);
		saldoPlan(data[0].idplanesPago);
		}
		
		

	})
}

function editar(){

	var id=$("#txt_idplan").val();
	var plan=$("#txt_planEditar").val();
	var cuit=$("#txt_cuitEditar").val();
	var total=$("#txt_totalEditar").val();
	var detalle=$("#txt_detalleEditar").val();
	var fecha=$("#txt_fechaPlanEditar").val();
	var estado=$("#cbm_estadoEditar").val();

	$.ajax({
		url:"controlador/plan/control_editarPlan.php",
		type:"post",
		data:{
			id:id,
			plan:plan,
			cuit:cuit,
			total:total,
			detalle:detalle,
			fecha:fecha,
			estado:estado
		}
	}).done(function(resp){
		//alert(resp);
		Swal.fire("Plan de Pagos Editado","success");
		$("#editar_plan").modal("hide");
	})


}


function saldoPlan(id){

	
	$.ajax({
		url: "controlador/plan/control_saldoPlan.php",
		type: "POST",
		data:{
			id:id
		}
	}).done(function(resp){
		//alert(resp);  // para ver que datos trae
		//var data=JSON.parse(resp);
	//	alert(data[0].total);
		if(resp.length>0){
		
		
		document.getElementById('label_pagado').innerText ='$ '+ resp;
		
		}
		
		

	})
}

$('#tabla_planes').on('click','.activar',function(){
	var data =table.row($(this).parents('tr')).data();

	
    modificarStatus(data.iddetallePlan,'Pago');
       

})

$('#tabla_planes').on('click','.desactivar',function(){
	var data =table.row($(this).parents('tr')).data();
	
	
	 modificarStatus(data.iddetallePlan,'Debe');
       

})

function modificarStatus(iddetalle,status){	
	
	$.ajax({
		url:"controlador/plan/control_estadoPlan.php",
		type: "POST",
		data:{
			iddetalle:iddetalle,
			status:status
			
		}
	}).done(function(resp){
		
	   table.ajax.reload();
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
				cadena+="<option value='"+data[i].idplanesPago+"'>"+data[i].planes+"</option>";
			}
			$("#cbm_select").html(cadena);
				var id=$("#cbm_ select").val();
			//alert(id);
			verPlan(id);
		}
	})
}