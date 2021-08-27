var table; //// para poder llamar al reload en otra funcion.

function listar_transporte(){
	table = $("#tabla_transporte").DataTable({
	  "ordering":true,   
	  "bLengthChange":false,
	  "searching": { "regex": true },
	  "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	  "pageLength": 10,
	  "destroy":true,
	  "async": false ,
	  "processing": true,
	  "ajax":{
		   url:"controlador/transporte/control_transporte_listar.php",
		  type:'POST'
	  },
	  "columns":[
		  {"data":"idtransporte"},
		  {"data":"foto",
		  render:function(data,type,row){
			 return "<img class='img-circle' src='./"+data+"' width='90px' height='90px'> ";
		  }},
		  {"data":"marca"},		 
		  {"data":"patente"},		 	
		  {"data":"verificacion",
			render:function(data,type,row){
				
				
				if(tiempo(data)<0){
					return "<span class='label text-dark'>"+fecha(data)+"</span>";
				}else{
					return "<span class='label bg-danger text-white'>"+fecha(data)+"</span>";
				}
			}},			 
          {"data":"rut"},
          {"data":"poliza",
			render:function(data,type,row){
				
				
				if(tiempo(data)<0){
					return "<span class='label text-dark'>"+fecha(data)+"</span>";
				}else{
					return "<span class='label bg-danger text-white'>"+fecha(data)+"</span>";
				}
			}},			 			
		  {"data":"estado",
			render:function(data,type,row){
				if(data=='activo'){
					return "<span class='label text-success'>"+data+"</span>";
				}else{
					return "<span class='label text-danger'>"+data+"</span>";
				}
			}},	
			{"data":"estado",
			render:function(data,type,row){
				if(data=='activo'){
					return "<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success' disabled><i class='fa fa-check'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-primary' data-bs-toggle='modal' data-bs-target='#editar_transporte'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='ver btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal_transporte'><i class='fa fa-eye'></i></button>";
				}else{
					return "<button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-primary' data-bs-toggle='modal' data-bs-target='#editar_transporte''><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='ver btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal_trasnporte'><i class='fa fa-eye'></i></button>";
				}
			}},	
		  
        
           
		  
		  
	  ],

	  "language":idioma_espanol,
	  select: true
  });
   }

   function tiempo(dat){
	   var fecha1=new Date();
	   var fecha2=new Date(dat);

	   var diaSegundos=24*60*60*1000; 
	   var resta=fecha1.getTime()-fecha2.getTime();
	   var dif=Math.round(resta/diaSegundos);
	//	alert("fecha1 "+fecha1);
	  // alert("fecha 2= "+fecha2);
	  // alert("diferencia "+dif);
	   return dif;
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


   function Registrar(){
	var tipo=$("#txt_tipo").val();
	var marca=$("#txt_marca").val();
	var patente=$("#txt_patente").val();
	var vtv=$("#txt_vtv").val();	
    var ruta=$("#txt_ruta").val();	
    var poliza=$("#txt_poliza").val();	
    var bramatologia=$("#txt_bramatologia").val();	
	var observacion=$("#txt_observacion").val();

	
	
	var foto = $("#seleccionararchivo").val();
	

	var f=new Date();
	var extension=foto.split('.').pop(); /// captura la extension

	
	 let nombreFoto="";
	
	if(foto.length>0){	
		 nombreFoto="IMG"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMilliseconds()+"."+extension;
	

	     } 

	if(tipo.length==0 || marca.length == 0 || patente.length ==0 ){
			
			return Swal.fire("Llenar campos vacios","Tipo , Patente , Marca");
	}
	
	
	
	

	var formData= new FormData();
	var fo = $("#seleccionararchivo")[0].files[0];
	formData.append('fo',fo);
	formData.append('nombreFoto',nombreFoto);
	formData.append('tipo',tipo);
	formData.append('marca',marca);
	formData.append('patente',patente);
	formData.append('vtv',vtv);
	formData.append('ruta',ruta);
	formData.append('poliza',poliza);
	formData.append('bramatologia',bramatologia);	
	formData.append('observacion',observacion);

	$.ajax({
		url:'controlador/transporte/control_registrar_vehiculo.php',
		type:'post',
		data:formData,		
		contentType:false,
		processData:false,
		success: function(respuesta){
			//alert(respuesta);
		
			if(respuesta ==1){
				Swal.fire("Transporte Registrado","","success");
				$("#registro_transporte").modal('hide');
				limpiar();
				table.ajax.reload();
			}else{
				Swal.fire('Patente ya existe','en base de datos','warning');
			}
			
		}
	});
	return false;
}

function limpiar(){
	$("#txt_tipo").val("");
	$("#txt_marca").val("");
	$("#txt_patente").val("");
	$("#txt_vtv").val("");	
    $("#txt_ruta").val("");	
    $("#txt_poliza").val("");	
    $("#txt_bramatologia").val("");	
	$("#txt_observacion").val("");
}

function modificarStatus(idtrans,status){	
	
	$.ajax({
		url:"controlador/transporte/control_estado_vehiculo.php",
		type: "POST",
		data:{
			idtrans:idtrans,
			status:status
			
		}
	}).done(function(resp){
		
	   table.ajax.reload();
	})

}

$('#tabla_transporte').on('click','.activar',function(){
	var data =table.row($(this).parents('tr')).data();
	
    modificarStatus(data.idtransporte,'ACTIVO');
       

})

$('#tabla_transporte').on('click','.desactivar',function(){
	var data =table.row($(this).parents('tr')).data();
	
	 modificarStatus(data.idtransporte,'INACTIVO');
       

})

$('#tabla_transporte').on('click','.editar',function(){
	var data =table.row($(this).parents('tr')).data();
	//alert(data.idtransporte);

	$("#txt_idTransporte").val(data.idtransporte);
	$("#txt_tipoEditar").val(data.tipo);
	$("#txt_marcaEditar").val(data.marca);
	$("#txt_patenteEditar").val(data.patente);
	$("#txt_vtvEditar").val(data.verificacion);
	$("#txt_rutaEditar").val(data.ruta);
	$("#txt_polizaEditar").val(data.poliza);
	$("#txt_bramatologiaEditar").val(data.bramatologia);
	$("#txt_observacionEditar").val(data.observacion);
	$("#mostrarimagenEditar").attr("src","./"+data.foto);
    
       

})
function modalEdit(){
	$("#registro_transporte").modal('show');
}

function Editar(){
	var id=$("#txt_idTransporte").val();
	var tipo=$("#txt_tipoEditar").val();
	var marca=$("#txt_marcaEditar").val();
	var patente=$("#txt_patenteEditar").val();
	var vtv=$("#txt_vtvEditar").val();	
    var ruta=$("#txt_rutaEditar").val();	
    var poliza=$("#txt_polizaEditar").val();	
    var bramatologia=$("#txt_bramatologiaEditar").val();	
	var observacion=$("#txt_observacionEditar").val();

	
	if(tipo.length==0 || marca.length == 0 || patente.length ==0 ){
			
		return Swal.fire("Llenar campos vacios","Tipo , Patente , Marca");
}
	
	
	$.ajax({
		url:"controlador/transporte/control_editar_vehiculo.php",
		type:"POST",
		data:{
			id:id,
			tipo:tipo,
			marca:marca,
			patente:patente,
			vtv:vtv,
			ruta:ruta,
			poliza:poliza,
			bramatologia:bramatologia,
			observacion:observacion

			
		}
	}).done(function(resp){
		
		if(resp>0){
			Swal.fire({
				icon: 'success',
				title: 'Datos de Transporte Editados',
				text: 'con exito'
				
			  });
			  $("#editar_transporte").modal('hide');
			  limpiarEditar();
			  table.ajax.reload();

		}

	})

}

$('#tabla_transporte').on('click','.ver',function(){
	var data =table.row($(this).parents('tr')).data();
	verTransp(data.idtransporte);
	
	//$("#modal_persona").modal("show"); 


})

function verTransp(id){
	$.ajax({
		url: "controlador/transporte/control_ver_vehiculo.php",
		type: "POST",
		data:{
			id
		}
	}).done(function(resp){
	//	alert(resp);  // para ver que datos trae
		var data=JSON.parse(resp);
		
		
		
		document.getElementById('label_tipo').innerText = data[0].tipo;
		document.getElementById('label_marca').innerText = data[0].marca;
		document.getElementById('label_patente').innerText = data[0].patente;
		document.getElementById('label_estado').innerText = data[0].estado;
		document.getElementById('label_vtv').innerText = data[0].vtv;
		document.getElementById('label_ruta').innerText = data[0].rut;
		document.getElementById('label_poliza').innerText = data[0].poli;
		document.getElementById('label_brama').innerText = data[0].brama;
		$("#mostrarimagenCard").attr("src","./"+data[0].foto);
		
		
		

	})
}

function actualizarfotoVehiculo(){

	var id=$("#txt_idTransporte").val();
	var foto = $("#seleccionararchivoEditar").val();
	

	var f=new Date();
	var extension=foto.split('.').pop(); /// captura la extension

	
	 let nombreFoto="";
	
	if(foto.length>0){	
		 nombreFoto="IMG"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMilliseconds()+"."+extension;
	

	     } 

	if(foto.length==0){
		return Swal.fire("EL campo esta vacio","warning");
	}
	
	
	
	

	var formData= new FormData();
	var fo = $("#seleccionararchivoEditar")[0].files[0];
	formData.append('fo',fo);
	formData.append('nombreFoto',nombreFoto);
	formData.append('id',id);

	$.ajax({
		url:'controlador/transporte/control_update_foto.php',
		type:'post',
		data:formData,		
		contentType:false,
		processData:false,
		success: function(respuesta){
			;
		
			if(respuesta ==1){
				Swal.fire('Actualizada','foto');
				$("#editar_transporte").modal('hide');
				limpiarEditar();
				table.ajax.reload();
				
			}
		}
	});
	return false;
}

function limpiarEditar(){

	("#txt_idTransporte").val("");
	$("#txt_tipoEditar").val("");
	$("#txt_marcaEditar").val("");
	$("#txt_patenteEditar").val("");
	$("#txt_vtvEditar").val("");	
    $("#txt_rutaEditar").val("");	
    $("#txt_polizaEditar").val("");	
    $("#txt_bramatologiaEditar").val("");	
	$("#txt_observacionEditar").val("");

}