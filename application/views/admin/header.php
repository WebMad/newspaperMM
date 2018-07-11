<html>
	<head>
		<title>GetStarted</title>
		<meta charset="UTF-8">
		<link href=<?= base_url( STYLE_PATH . 'bootstrap.min.css');?> rel="stylesheet" type="text/css">
		<link href=<?= base_url( STYLE_PATH . 'style.css');?> rel="stylesheet" type="text/css">
		<link href=<?= base_url( STYLE_PATH . 'sidebar.css');?> rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
			<header style="border-bottom: 1px solid #e5e5e5;">
				<div class="row">
					<div class="col-lg-3 text-center"><a href="/"><img src=<?= base_url( IMG_PATH . 'headLogo.png');?> class="w-75"></a></div>
					<div class="col-lg-5 d-flex justify-content-between align-items-center">
						<a href=<?= site_url('Pages/news');?> class="p-2 text-muted">Новости</a>
						<a href=<?= site_url('Pages/archive');?> class="p-2 text-muted">Газеты</a>
						<a href=<?= site_url('Pages/authors');?> class="p-2 text-muted">Авторы</a>
						<a href=<?= site_url('Pages/about');?> class="p-2 text-muted">О нас</a>
					</div>
					<div class="col-lg-4 justify-content-end align-items-center d-flex">
						<a class="btn btn-sm btn-outline-secondary btn_login" href="/">Обратно на сайт</a>
					</div>
				</div>
			</header>