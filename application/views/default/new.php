<main>
	<div class="row mt-3">
		<div class="col-lg-7 card box-shadow shadow-lg mb-5">
			<?
			
			if($is_valid){
			
			?>
				<div class="mb-5 mt-3">
					<h2 class="mb-0"><?= $new['title']?></h2>
					<small class="text-muted"><?= $new['date']?></small>
					<img src=<?= base_url( IMG_PATH . 'slider.jpg');?> class="rounded mt-3" style="width:100%">
					<p class="mt-3 text-justify"><?= $new['text']?></p>
				</div>
			<?
			
			}else{
				echo "<p class='text-muted text-center mt-3'>На данный момент такой новости не существует.</p>";
			}
			?>
		</div>
		<div class="col ml-4 card box-shadow shadow-lg mb-5" style="height: 380px;">
			<div class="mt-3">
				<h2>Актуально</h2>
				<ul class="list-group mt-3">
					<li class="list-group-item p-3">Пример новости 1 <span class="float-right glyphicon glyphicon-chevron-right"></span></li>
					<li class="list-group-item p-3">Пример новости 2</li>
					<li class="list-group-item p-3">Пример новости 3</li>
					<li class="list-group-item p-3">Пример новости 4</li>
					<li class="list-group-item p-3">Пример новости 5</li>
				</ul>
			</div>
		</div>
	</div>
</main>