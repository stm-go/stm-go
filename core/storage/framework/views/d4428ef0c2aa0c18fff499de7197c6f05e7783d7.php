<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>404 Página não encontrada!</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="https://stmgo.com.br/assets/front/css/404.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<br><br><br><br><br><br><br><br><br><br>
			<h2>Ops, Você se perdeu?</h2>
			
			
			
			<p>A página que você está procurando pode ter sido removida, teve seu nome alterado ou está temporariamente indisponível.</p>
			
			<a href="<?php echo e(route('front.index')); ?>"><img src="<?php echo e(asset('assets/front/img/'.$setting->header_logo )); ?>" alt="STMGO"></a><br><br>
			
			<h3><?php  echo $_SERVER['REMOTE_ADDR']; ?></h3>
		</div>
	</div>

</body><!-- Meu Programador (https://meuprogramador.com.br) -->

</html>
<?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/errors/404.blade.php ENDPATH**/ ?>