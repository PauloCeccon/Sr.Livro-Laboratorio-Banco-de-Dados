 <?php 
$arqSenhasAdmin="senhas_admin.php";
require_once("$arqSenhasAdmin");
$conexão = new mysqli($servidor, $usuario, $senha, $bd);

$result_produtos = "SELECT * FROM produtos";
$resultado_produtos = mysqli_query($conexão, $result_produtos);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Produtos</title>
        <link href="css/produtos.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Produtos</h1>
			</div>
			<div class="sair-header">
				<a href="index.html">Sair</a>
			</div>
			<div class="row">
				<?php while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
                            <img src="imagens/<?php echo $rows_produtos['imagem']; ?>" alt="..." width="180px">
							<div class="caption text-center">
								<a href=""><h3><?php echo $rows_produtos['nome']; ?></h3></a>
                                <a href=""> <h4><?php echo $rows_produtos['valor']; ?></h4></a>
								<p><a href="#" class="btn btn-primary" role="button">Comprar</a> </p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>