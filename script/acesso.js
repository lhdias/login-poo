$(function(){
	$("button#btnEntrar").on("click", function(e){
		e.preventDefault();

		var campoEmail = $("form#formularioLogin #email").val();
		var campoSenha = $("form#formularioLogin #senha").val();

		if(campoEmail.trim() == "" || campoSenha.trim() == ""){
			$("div#mensagem").html("<script>Swal.fire('Opa','Você preencheu todos os campos?','question')</script>");
		}else {
			$.ajax({
			url: "acoes/login.php",
			type: "POST",
			data: {
				email: campoEmail,
				senha: campoSenha
			},
			success: function(retorno){
				retorno = JSON.parse(retorno);

				if(retorno["erro"]){
					$("div#mensagem").html(retorno["mensagem"]);
				}else{
					window.location = "dashboard.php";
				}
			},

			error: function(){
				$("div#mensagem").html("Ocorreu um erro durante a solicitação");
			}
		});

		}
	});
});