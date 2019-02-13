<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>
<script type="text/javascript" src="js/vendor.min.js"></script>
	<script type="text/javascript" src="js/parse-markdown-pure.js"></script>
	<script type="text/javascript" src="js/jQuery.SimpleMask.min.js"></script>
<script>
$(document).ready
(
	function()
	{
        //Comando para ativar a mascara nos inputs de cpf e cep
		$('#cpf' ).simpleMask( { 'mask': 'cpf'     , 'nextInput': true } );
        $('#cep' ).simpleMask( { 'mask': 'cep'     , 'nextInput': true } );
        
        $("#cep").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					// $("#endereco").val(resposta.logradouro);
					// $("#complemento").val(resposta.complemento);
					// $("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#estado").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#endereco").focus();
				}
			});
		});
    }
);
</script>
</body>
</html>
