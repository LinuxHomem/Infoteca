<?php
  // iniciar sessão
  session_start();
  // importar head
  require_once 'Modules/Head.php';
  // verificar se tempo de sessão expirou
  require_once '../Controller/Session.php';
?>
		<!-- personal css -->
		<link rel="stylesheet" href="Css/index.css">

	</head>
	<body>

	   <?php require_once 'Modules/Navbar.php'; ?>

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

		<?php require_once 'Modules/Footer.php' ?>
		<!-- header height -->
		<script type="text/javascript">$('.header').height($(window).height());</script>

	</body>
</html>
