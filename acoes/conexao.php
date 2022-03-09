<?php 

$server = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "tutorialloginphp";

try{
	$conn = new PDO("mysql:host=$server;dbname=$dbname",$user,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
	header("Location: ../errors/bd/");
	$conn = null;
}
?>

