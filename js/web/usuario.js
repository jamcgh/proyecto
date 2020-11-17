$('#mdlUsuario').on('show.bs.modal', function (event) {
	var id = $(event.relatedTarget).data("id");
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
			removeLoading();
		}
	});
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
				/*setTimeout(function() {
					showLoading();
					window.location.href="usuario.php";
				}, 1000);*/
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: objData.msj,
					footer: '<a href>Why do I have this issue?</a>'
				});
				removeLoading();
			}
		}
	})
	return false;
});