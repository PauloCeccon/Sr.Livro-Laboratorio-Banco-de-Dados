<?php
$index="index.html";
$arqLogin="login.html";
$arqCadProd="cadProduto.html";
$arqSenhas="senhas.php";
$arqSenhasAdmin="senhas_admin.php";
$admin = 0;
$gerente = 1;
$cliente = 2;

require_once("$arqSenhasAdmin");

$imagem = $_POST['img_prod'];
$desc = $_POST['desc_prod'];
$valor = $_POST['valor_prod'];
$servidor = 'localhost';
$bd = 'fatec';

//TESTE DE CADASTRO
if($imagem == '' or $desc == '' or $valor == '' ){
		header("Location: $arqCadProd");
	}
else
	{
	$conexão = new mysqli($servidor, $usuario, $senha, $bd);
	if ($conexão->connect_error) die($conexão->connect_error);
		$insert = "INSERT INTO produtos values ('','$desc','$valor','$imagem')";
		$resultado = $conexão->query($insert);
		header("Location: $arqCadProd");
	}

	$resultado->close();
	$conexão->close();

?>