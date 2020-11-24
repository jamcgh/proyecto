$('#mdlUsuario').on('show.bs.modal', function (event) {
	var id = $(event.relatedTarget).data("id");
	if (typeof id !=undefined && typeof id !="undefined") {
		showLoading();
		var usuario = $.ajax({
			type : "GET",
			url : "usuario.php",
			data : {id: id},
			success : function(obj) {
				var objData = JSON.parse(obj);
				$("#txt_id").val(objData.id);
				$("#txt_nombres").val(objData.nombres);
				$("#txt_ape_paterno").val(objData.ape_paterno);
				$("#txt_ape_materno").val(objData.ape_materno);
				$("#slct_sexo").val(objData.sexo);
				$("#txt_carrera").val(objData.carrera);
				$("#txt_grado").val(objData.grado);
				$("#txt_universidad").val(objData.universidad);
				$("#slct_anio_egreso").val(objData.anio_egreso);
				removeLoading();
			}
		});
	}

});
$('#mdlUsuario').on('show.bs.modal', function (event) {
	$("input[type=text], select, #txt_id").val("");
});
$("#btn-guardar").click(function() {
	$("#form-usuario").submit();
});
$("#form-usuario").submit(function() {
	showLoading();
	$.ajax({
		type : "POST",
		url : "usuario.php",
		data : $("#form-usuario").serialize(),
		success : function(obj) {
			var objData = JSON.parse(obj);
			if (parseInt(objData.rst) == 1) {
				Swal.fire(
					'Muy Bien!',
					objData.msj,
					'success'
				);
				removeLoading();
				setTimeout(function() {
					showLoading();
					window.location.href="usuario.php";
				}, 2000);
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: objData.msj
				});
				removeLoading();
			}
		}
	})
	return false;
});
$(document).delegate(".btn-delete", "click", function(e) {
	var id = $(e.target).data("id");
	Swal.fire({
	  title: '¿Quiere eliminar este Registro?',
	  showCancelButton: true,
	  confirmButtonText: `Eliminar`,
	  cancelButtonText: `Cancelar`,
	}).then((result) => {
		showLoading();
		  /* Read more about isConfirmed, isDenied below */
		  if (result.isConfirmed) {
		    	$.ajax({
		    		type : "GET",
		    		url : "usuario.php?action=delete&id="+id,
		    		success : function(obj) {
		    			var objData = JSON.parse(obj);
		    			Swal.fire(
							'Muy Bien!',
							objData.msj,
							'success'
						);
		    			removeLoading();
		    		}
		    	})
		  }
	});
});

var Usuario = {
	list : function(obj) {
		showLoading();
		$.ajax({
			type : "GET",
			url : "usuario_ajax.php?action=list",
			success : function(obj) {
				console.log(obj);
				var objData = JSON.parse(obj);
				table.clear().draw();
	            for(var i in objData) {
	            	let index = parseInt(i);
	            	let fila = [];
	            	index++;
	                fila.push(index);
	                fila.push(objData[i].nombres);
	                fila.push(objData[i].ape_paterno);
	                fila.push(objData[i].ape_materno);
	                fila.push(objData[i].sexo);
	                fila.push(objData[i].updated_at);
	                var btn = "";
	                btn+= "<a href='#'";
						btn+="data-toggle='modal' ";
						btn+="data-target='#mdlUsuario' ";
						btn+="class='btn btn-primary' ";
						btn+="data-id='"+objData[i].id+"'>";
						btn+="<i class='fas fa-pencil-alt'></i>";
						btn+="</a>";
	                fila.push(btn);
	                console.log(fila);
	                table.row.add(fila).draw();
	            }
	            removeLoading();
			}
		});
	}
};
Usuario.list();