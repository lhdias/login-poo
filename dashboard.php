<?php 
session_start();

if(isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])){
	require_once("acoes/conexao.php");
	$adm = $_SESSION['usuario'][1];
	$nome = $_SESSION['usuario'][0];
}else{
	echo "<script>window.location = 'index.html'</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard - <?php echo $nome ?></title>
</head>
<body>
	<?php if($adm): ?>
		<table style="width: 40%">
			<thead>
				<tr style="font-weight: bold;">
					<td>Email</td>
					<td>Senha</td>
					<td>Nome</td>
					<td>ADM</td>
					<td>ID</td>
				</tr>
			</thead>

			<tbody>
				<?php
				$query = $conn->prepare("SELECT * FROM usuario");
				$query->execute();

				$users = $query->fetchAll(PDO::FETCH_ASSOC);
				for($i = 0; $i < sizeof($users); $i++):
					$usuarioAtual = $users[$i];
				?>
				<tr>
					<td><?php echo $usuarioAtual["email"] ?></td>
					<td><?php echo $usuarioAtual["senha"] ?></td>
					<td><?php echo $usuarioAtual["nome"] ?></td>
					<td><?php echo $usuarioAtual["adm"] ?></td>
					<td><?php echo $usuarioAtual["id"] ?></td>
				</tr>
			<?php endfor; ?>
			</tbody>
		</table>
	<?php endif; ?>

	<a href="acoes/logout.php">Logout</a>

</body>
</html>