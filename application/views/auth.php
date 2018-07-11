<html>
	<head>
		<title>GetStarted</title>
		<meta charset="UTF-8">
		<link href=<?= base_url( STYLE_PATH . 'bootstrap.min.css');?> rel="stylesheet" type="text/css">
		<link href=<?= base_url( STYLE_PATH . 'style.css');?> rel="stylesheet" type="text/css">
		<link href=<?= base_url( STYLE_PATH . 'sidebar.css');?> rel="stylesheet" type="text/css">
	</head>
	<body class="auth_user">
		<div class="form-signin">
			<?= validation_errors(); ?>
			<?= form_open('User/auth');?>
				<div class="text-center mb-4">
					<img class="mb-4" src=<?= base_url( IMG_PATH . 'logo_rst.svg')?> alt="" width="250">
					<h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
					<?if($this->session->has_userdata('error')){
						$error = $this->session->userdata('error');
					?>
						<div class="alert alert-<?= $error['type']?> alert-dismissible fade show" role="alert">
							<strong><?= $error['title']?></strong> <?= $error['msg']?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?
						$this->session->unset_userdata('error');
					}
					?>
				</div>

				<div class="form-label-group">
					<input type="email" id="email" name="email" class="form-control" placeholder="Электронная почта" required="" autofocus="">
				</div>

				<div class="form-label-group">
					<input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required="">
				</div>

				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" value="remember-me"> Запомнить меня
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
				<p class="mt-5 mb-3 text-muted text-center">© WebMad 2018</p>
			</form>
		</div>
		<script src=<?= base_url( JS_PATH . 'jquery.min.js');?>></script>
		<script src=<?= base_url( JS_PATH . 'bootstrap.min.js');?>></script>
	</body>
</html>