$('#cadastrar').click(function () {
	$('#form').submit();
});
$('#form').submit(function (e) {
	e.preventDefault();

	$.ajax({

		url:'crud/categoria/updateCat.php',
		type:'POST',
		data: {

			cod:$('#cod').val(),
			txtNome:$('#txtNome').val(),
			cmbPai:$('#cmbPai').val(),
			txtStatus:$('#txtStatus').val()

		},
		beforeSend: function(){

			$('#menssage').html("Cadastrando...");

		},
		success: function(data){

			$('#menssage').html(data);

		},
		error: function(data){

			$('#menssage').html("Erro 404...");

		}

	});
			   
});