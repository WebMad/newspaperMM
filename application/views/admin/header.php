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
			<main>
				<div class="row mt-3">
					<div class="col card box-shadow shadow-lg mb-5" style="height: 285px;">
						<div class="mt-3 sidebar-admin">
							<h2>Меню</h2>
							<ul class="nav nav-pills nav-stacked">
							  <li class="nav-item">
								<a class="nav-link<?= ($this->page == 'index') ? ' active' : ''?>" href=<?= site_url('panel')?>>Статистика</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link<?= ($this->page == 'news') ? ' active' : ''?>" href=<?= site_url('panel/news')?>>Новости</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link<?= ($this->page == 'newspapers') ? ' active' : ''?>" href=<?= site_url('panel/newspapers')?>>Газеты</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link<?= ($this->page == 'authors') ? ' active' : ''?>" href=<?= site_url('panel/authors')?>>Авторы</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link<?= ($this->page == 'information') ? ' active' : ''?>" href=<?= site_url('panel/information')?>>Информация</a>
							  </li>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 ml-4 card box-shadow shadow-lg mb-5">
				