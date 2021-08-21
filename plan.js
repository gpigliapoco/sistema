var table; //// para poder llamar al reload en otra funcion.

function listar_empleados(){
	table = $("#tabla_plan").DataTable({
	  "ordering":true,   
	  "bLengthChange":false,
	  "searching": { "regex": true },
	  "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	  "pageLength": 10,
	  "destroy":true,
	  "async": false ,
	  "processing": true,
	  "ajax":{
		   url:"controlador/control_listar_empleados.php",
		  type:'POST'
	  },
	  "columns":[
		  {"data":"idempleado"},
		  {"data":"emp_foto",
		  render:function(data,type,row){
			 return "<img class='img-circle' src='./"+data+"' width='90px' height='90px'> ";
		  }},
		  {"data":"nombre"},		 
		  {"data":"emp_dni"},		 	
		  {"data":"emp_movil"},		 
          {"data":"sector"},	
		  {"data":"emp_status",
			render:function(data,type,row){
				if(data=='activo'){
					return "<span class='label text-success'>"+data+"</span>";
				}else{
					return "<span class='label text-danger'>"+data+"</span>";
				}
			}},	
			{"data":"emp_status",
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