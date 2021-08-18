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