var table; //// para poder llamar al reload en otra funcion.

function listar_transporte(){
	table = $("#tabla_transporte").DataTable({
	  "ordering":false,   
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
		  {"data":"camion"},		 
		  {"data":"patente"},		 	
		  {"data":"verificacion"},		 
          {"data":"ruta"},
          {"data":"poliza"},	
		  {"data":"estado",
			render:function(data,type,row){
				if(data=='activo'){
					return "<span class='label label-success'>"+data+"</span>";
				}else{
					return "<span class='label label-danger'>"+data+"</span>";
				}
			}},	
			{"data":"estado",
			render:function(data,type,row){
				if(data=='activo'){
					return "<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success' disabled><i class='fa fa-check'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='ver btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal_persona'><i class='fa fa-eye'></i></button>";
				}else{
					return "<button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='ver btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal_persona'><i class='fa fa-eye'></i></button>";
				}
			}},	
		  
        
           
		  
		  
	  ],

	  "language":idioma_espanol,
	  select: true
  });
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
			return;
		//	return Swal.fire("llenar campos vacios","warning");
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
		url:'controlador/control_registrar_empleado.php',
		type:'post',
		data:formData,		
		contentType:false,
		processData:false,
		success: function(respuesta){
			alert(respuesta);
		
			if(respuesta ==1){
				Swal.fire('Vehiculo registrado','success');
				cargar_contenido('contenido_principal','./vista/empleados/vista_empleados.php');
			}
		}
	});
	return false;
}