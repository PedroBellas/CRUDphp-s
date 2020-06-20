$('#cadastrar').click(function () {
	$('#form_cadastro').submit();
});
$('#form_cadastro').submit(function (e) {
   e.preventDefault();

   $.ajax({

   	url:'crud/produto/insertPro.php',
   	type:'POST',
   	data: {

   		txtCodigo:$('#txtCodigo').val(),
   		txtDesc:$('#txtDesc').val(),
   		txtDescPequena:$('#txtDescPequena').val(),
      	txtNome:$('#txtNome').val(),
   		txtAmigavel:$('#txtAmigavel').val(),
   		txtValor:$('#txtValor').val(),
   		txtQuantidade:$('#txtQuantidade').val(),
   		txtValorEnvio:$('#txtValorEnvio').val(),
   		txtValorTaxa:$('#txtValorTaxa').val(),
   		txtExtra:$('#txtExtra').val(),
   		txtStatus:$('#txtStatus').val(),
   		cmbCat:$('#cmbCat').val(),

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