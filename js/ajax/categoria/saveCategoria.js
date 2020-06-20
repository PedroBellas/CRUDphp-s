$('#cadastrar').click(function () {
	$('#form_cadastro').submit();
});
$('#form_cadastro').submit(function (e) {
	e.preventDefault();

	$.ajax({

		url:'crud/categoria/insertCat.php',
		type:'POST',
		data: {

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