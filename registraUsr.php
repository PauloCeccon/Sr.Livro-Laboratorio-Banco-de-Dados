<?php
$index="index.html";
$arqLogin="login.html";
$arqCadastro="cadastro.html";
$arqSenhas="senhas.php";
$arqSenhasAdmin="senhas_admin.php";
$admin = 0;
$gerente = 1;
$cliente = 2;

require_once("$arqSenhasAdmin");

$novoLoginDigitado = $_POST['nome_cad'];
$novoEmailDigitado = $_POST['email_cad'];
$novaSenhaDigita = $_POST['senha_cad'];
$servidor = 'localhost';
$bd = 'fatec';

//TESTE DE CADASTRO
if($novoLoginDigitado == '' or $novoEmailDigitado == '' or $novaSenhaDigita == '' ){
		header("Location: $arqCadastro");
	}
else
	{
	$conexão = new mysqli($servidor, $usuario, $senha, $bd);
	if ($conexão->connect_error) die($conexão->connect_error);
		$insert = "INSERT INTO usuarios values ('','$novoEmailDigitado','$novoLoginDigitado','$novaSenhaDigita',2)";
		$resultado = $conexão->query($insert);
		header("Location: $arqLogin");
	}

	$resultado->close();
	$conexão->close();

?>