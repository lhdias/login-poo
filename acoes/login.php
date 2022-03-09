<?php 
	
	require_once("conexao.php");

	if(isset($_POST['email']) && isset($_POST['senha']) && $conn != null){
		$query = $conn->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
		$query->execute(array($_POST['email'], $_POST['senha']));
		if($query->rowCount()){
			$user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

			session_start();
			$_SESSION['usuario'] = array($user['nome'], $user['adm']);

			echo "<script>window.location = '../dashboard.php'</script>";
		}else{
			echo "<script>window.location = '../index.html'</script>";
		}
	}else{
		echo "<script>window.location = '../index.html'</script>";
	}

?>