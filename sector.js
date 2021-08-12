var table; //// para poder llamar al reload en otra funcion.

function listar_sector(){
	 table = $("#tabla_sector").DataTable({
	  "ordering":false,   
	  "bLengthChange":false,
	  "searching": { "regex": true },
	  "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	  "pageLength": 10,
	  "destroy":true,
	  "async": false ,
	  "processing": true,
	  "ajax":{
		   url:"controlador/sector/control_sector_listar.php",
		  type:'POST'
	  },
	  "columns":[
		  {"data":"idsector"},
		  {"data":"sector"},        		  
		  
	  ],

	  "language":idioma_espanol,
	  select: true
  });
  

 

}

function AbrirModalRegistro(){
	$("#modal_registro_sector").modal({backdrop:'static',keyboard:false});
	$("#modal_registro_sector").modal("show");
}

 

function registrarSector(){
	var nombre= $("#txt_nombre").val();
	

	if(nombre.lenght==0){
		return Swal.fire("Hay campos vacios","warning");
	}
		$.ajax({
			url: "controlador/sector/control_sector_registrar.php",
			type: "POST",
			data: {
				nombre:nombre,
				
			}
		}).done(function(resp){
			
			if(respuesta ==1){
				Swal.fire('Sector registrado','success');
				$("#modal_registro_sector").modal("hide");
				
			}
		})

}


