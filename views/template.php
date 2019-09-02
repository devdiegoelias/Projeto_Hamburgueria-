<!DOCTYPE html>
<html lang="pt-BR">
<head>

	<title>Hamburgueria Online</title>
	
	<meta charset="UTF-8">
	<meta name="description" content="Estrutura"/>
	<meta name="author" content="Diego Elias"/>
	<meta name="keywords" content="Palavra, chave"/>

	<!--orienta os buscadores a indexar o conteÃºdo da pÃ¡gina e seguir todos os links para descobrir novas pÃ¡ginas-->
	<meta name="robots" content="index, follow">
	<!--orienta os buscadores a nÃ£o indexar o conteÃºdo da pÃ¡gina e impede-a de seguir os links para descobrir novas pÃ¡ginas-->
	<!--<meta name="robots" content="noindex, nofollow">-->

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>assets/css/style.css" rel="stylesheet">
	
</head>
<body>

	<?php $this->loadViewInTemplate($viewName, $viewData); ?>


	<script src="<?php echo BASE_URL;?>assets/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/js/jquery.mask.js"></script>
	<script src="<?php echo BASE_URL;?>assets/js/script.js"></script>

</body>
</html>