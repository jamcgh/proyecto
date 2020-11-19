$('#mdlEmpresa').on('show.bs.modal', function (event) {
	var id = $(event.relatedTarget).data("id");
	if (typeof id !=undefined && typeof id !="undefined") {
		showLoading();
		var usuario = $.ajax({
			type : "GET",
			url : "empresa.php",
			data : {id: id},
			success : function(obj) {
				var objData = JSON.parse(obj);
				$("#txt_id").val(objData.id);
				$("#txt_razon_social").val(objData.razon_social);
				$("#txt_ruc").val(objData.ruc);
				$("#txt_direccion").val(objData.direccion);
				$("#slct_estado").val(objData.estado);
				removeLoading();
			}
		});
	}

});
$('#mdlEmpresa').on('show.bs.modal', function (event) {
	$("input[type=text], select, #txt_id").val("");
});
$("#btn-guardar").click(function() {
	$("#form-empresa").submit();
});
$("#form-empresa").submit(function() {
	showLoading();
	$.ajax({
		type : "POST",
		url : "empresa.php",
		data : $("#form-empresa").serialize(),
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
					window.location.href="empresa.php";
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
$("#btn-delete").click(function(e) {
	var id = $(e.target).data("id");
	Swal.fire({
	  title: '¿Quiere eliminar este Registro?',
	  showCancelButton: true,
	  confirmButtonText: `Eliminar`,
	  cancelButtonText: `Cancelar`,
	}).then((result) => {
	  /* Read more about isConfirmed, isDenied below */
	  if (result.isConfirmed) {
	    	alert(id);
	  }
	});
})