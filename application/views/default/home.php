<main>
	<div class="jumbotron p-3 p-md-5 h-50 text-white rounded bg-dark mt-3" style="background: url(<?= base_url( IMG_PATH . 'slider.jpg')?>) no-repeat; background-size: 100% auto; background-position: center">
		<div class="col-lg-7">
			<h1 class="display-4 font-italic">Привет, я вернулся!</h1>
			<p class="lead my-3">Знаете, мне показалось, что первая версия сайта была крайне не удобна для вас, поэтому вы видите эту страницу!</p>
			<a href="#" class="text-white font-weight-bold">Читать больше!</a>
		</div>
	</div>
	<div class="row mb-2">
		<div class="col-md-6 pl-0">
		  <div class="card flex-md-row mb-4 box-shadow h-md-250 py-md-3 shadow-lg">
			<div class="card-body d-flex flex-column align-items-start">
			  <h3>
				<a class="text-dark" href="#"><?= $news[0]['title']?></a>
			  </h3>
			  <div class="mb-3 text-muted"><?= strftime("%d %b %H:%M",strtotime($news[0]['date']));?></div>
			  <p class="card-text mb-auto"><?= $news[0]['annotation']?></p>
			  <a href=<?= site_url('pages/news/' . $news[0]['id'])?> class="mt-3">Читать дальше</a>
			</div>
		  </div>
		</div>
		<div class="col-md-6 pr-0">
		  <div class="card flex-md-row mb-4 box-shadow h-md-250 py-md-3 shadow-lg">
			<div class="card-body d-flex flex-column align-items-start">
			  <h3>
				<a class="text-dark" href="#"><?= $news[1]['title']?></a>
			  </h3>
			  <div class="mb-3 text-muted"><?= strftime("%d %b %H:%M",strtotime($news[1]['date']));?></div>
			  <p class="card-text mb-auto"><?= $news[1]['annotation']?></p>
			  <a href=<?= site_url('pages/news/' . $news[1]['id'])?> class="mt-3">Читать дальше</a>
			</div>
		  </div>
		</div>
	</div>
</main>