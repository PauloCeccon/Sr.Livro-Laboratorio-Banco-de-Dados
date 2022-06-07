<?php

$index="index.html";
$arqSenhas="senhas.php";
$arqLogin="login.html";
$arqCadastro="cadastro.html";
$cadProd = "fazTudo.php";
$arqSenhasAdmin="senhas_admin.php";
$admin = 0;
$gerente = 1;
$cliente = 2;

require_once("$arqSenhasAdmin");

$usuarioDigitado = $_POST['usuario_login'];
$senhaDigitada = $_POST['senha_login'];
$novoLoginDigitado = $_POST['nome_cad'];
$novoEmailDigitado = $_POST['email_cad'];
$novaSenhaDigita = $_POST['senha_cad'];
$servidor = 'localhost';
$bd = 'fatec';

//TESTE DE CADASTRO
if($novoLoginDigitado != '' or $novoEmailDigitado != '' or $novaSenhaDigita != '' ){
	$conexão = new mysqli($servidor, $usuario, $senha, $bd);
	if ($conexão->connect_error) die($conexão->connect_error);
		$insert = "INSERT INTO usuarios values ('','$novoEmailDigitado','$novoLoginDigitado','$novaSenhaDigita',2)";
		$resultado = $conexão->query($insert);
	if (!$resultado) 
		die ("Erro de acesso à base de dados: " . $conexão->error);
	if (empty($resultado->data_seek(0)))
		header("Location: $arqLogin");
	}
//FIM

if ($usuarioDigitado == "" or $senhaDigitada == ""){
	header("Location: $arqLogin");
	}
else
	{
	$conexão = new mysqli($servidor, $usuario, $senha, $bd);
	if ($conexão->connect_error) die($conexão->connect_error);
		$consulta = "SELECT * FROM usuarios WHERE login='$usuarioDigitado'  AND senha = '$senhaDigitada' LIMIT 1";
		$resultado = $conexão->query($consulta);
	if (!$resultado) 
		die ("Erro de acesso à base de dados: " . $conexão->error);
	if (empty($resultado->data_seek(0)))
		header("Location: $arqLogin");
	else
		{
		$nivel = $resultado->fetch_assoc()['nivel'];
		
	if ($nivel == $admin)
			header("Location: $index");
	else if ($nivel == $gerente) header("Location: $cadProd");
		else if ($nivel == $cliente) header("Location: $index");
			else header("Location: $arqLogin");
		}
	}
	$resultado->close();
	$conexão->close();
	
// function mostraLivros($tabLivros, $arqFazTudo, $conexão){
// 		//  ************* Mostrar os livros existentes *************
// 		$query= "SELECT * FROM $tabLivros";
// 		$resultado = $conexão->query($query);
// 		if (!$resultado) die ("Erro de acesso à base de dados: " . $conexão->error);
		
// 		$linhas = $resultado->num_rows;
// 		echo "<br>";
// 		echo "Lista de livros:";
// 		echo "<br>";
// 		$_novoId=0;
// 		for ($j = 0 ; $j < $linhas ; ++$j)
// 		{
// 		$resultado->data_seek($j);
// 		$linha = $resultado->fetch_array(MYSQLI_NUM);
// 		echo <<<_TEXTO
// 		<pre>

// 		Autor	$linha[0]
// 		Título	$linha[1]
// 		Área	$linha[2]
// 		Ano	    $linha[3]
// 		Tombo	$linha[4]
// 		</pre>

// 		<form name = "emprestar" action="$arqFazTudo" method="post">
// 		<input type="hidden" name="Tombo" value="$linha[4]">
// 		<input type="submit" value="Emprestar"></form>
// _TEXTO;
// 		}
		
// header("Location: $arqFazTudo");

// }

?>