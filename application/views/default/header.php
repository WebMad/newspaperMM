<html>
	<head>
		<title>GetStarted</title>
		<meta charset="UTF-8">
		<link href=<?= base_url( STYLE_PATH . 'bootstrap.min.css');?> rel="stylesheet" type="text/css">
		<link href=<?= base_url( STYLE_PATH . 'style.css');?> rel="stylesheet" type="text/css">
		<link href=<?= base_url( STYLE_PATH . 'sidebar.css');?> rel="stylesheet" type="text/css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet" type="text/css">
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
						<?
						if(!empty($this->userdata)){
						?>
							<button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle btn_login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $_SESSION['name']?>
							</button>
							<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
								<a class="dropdown-item" href="<?= site_url('Pages/profile');?>">Профиль</a>
								<?if($this->userdata['type'] == 1){?><a class="dropdown-item" href=<?= site_url('Panel');?>>Админ-панель</a><?}?>
								<a class="dropdown-item" href=<?= site_url('User/exit');?>>Выйти</a>
							</div>
						<?}
						else{
						?>
							<a class="btn btn-sm btn-outline-secondary btn_login" href=<?= site_url('Pages/auth');?>>Войти</a>
						<?}?>
					</div>
				</div>
			</header>
			<?if($this->session->has_userdata('error')){
				$error = $this->session->userdata('error');
			?>
				<div class="row">
					<div class="mt-3 w-100 alert alert-<?= $error['type']?> alert-dismissible fade show" role="alert">
						<strong><?= $error['title']?></strong> <?= $error['msg']?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			<?
				$this->session->unset_userdata('error');
			}
			?>