<?php



 ?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<meta charset="utf-8">
		<title>Infoteca - Início</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
		// iniciar sessao
		session_start();
		// verificar se sessão expirou
		require_once 'controller/session.php';
		?>

		<!-- import css -->
		<!-- bootstrap css -->
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css">
		<!-- personal css -->
		<link rel="stylesheet" href="index.css">
		<!-- global css -->
		<link rel="stylesheet" href="view/css/global.css">

	</head>
	<body>

		<?php
		// importar navbar
		require_once 'view/modules/navbar.php';
		?>

		<header class="page-header header container-fluid">
			<div class="overlay">
				<div class="container-fluid">
					<div class="row">

						<div class="col-sm">
							<!-- first -->
			   		</div>

						<!-- barra de pesquisa -->
				 		<div id="search" class="col-sm-6">
							<center>
								<a id="title" style="color: #ffffff;">Pesquisar um Livro</a>
								<form method="get" action="controller/search.php">
									<div class="form-group">
										<input type="text" class="form-control" name="search" placeholder="Ex.: O Conde de Monte Cristo" required>
										<small id='small' style="color:#ffffff;">Pesquise pelo nome do livro.</small>
									</div>
									<button id="btn_search" type="submit" class="btn btn-danger">Pesquisar</button>
								</form>
							</center>
						</div>
						<!-- /barra de pesquisa -->

						<!-- novos livros -->
				 		<div id="new_books" class="col-sm">
		          <div class="sidebar-module sidebar-module-inset">
								<!-- last -->
		          </div>
		        </div>

					</div>
				</div>
      </div>
    </header>

		<!-- import js -->
		<!-- jquery js -->
		<script src="../vendor/jquery/3.4.1.min.js"></script>
		<!-- bootstrap js -->
		<script src="../vendor/bootstrap/js/bootstrap.js"></script>
		<!-- header height -->
		<script type="text/javascript">$('.header').height($(window).height());</script>

	</body>
</html>
