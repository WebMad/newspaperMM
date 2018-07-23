<main>
	<div class="row mt-3">
		<div class="col-lg-7 card box-shadow shadow-lg mb-5">
			<?if(count($news)>0){?>
				<?foreach($news as $new){?>
					<div class="mb-5 mt-3">
						<h2 class="mb-0"><?= $new['title']?></h2>
						<small class="text-muted"><?= strftime("%d %b %H:%M",strtotime($new['date']));?></small>
						<div class="NewImages">
                            <? foreach(json_decode($new['images']) as $image){ ?>
                                <a data-toggle="lightbox" data-gallery="gallery1" href=<?= base_url( IMG_NEW_PATH . $image);?>?image=<?=$image?>>
                                    <img src=<?= base_url( IMG_NEW_PATH . $image);?>?image=<?=$image?> class="rounded mt-3" style="width:<?= 100/(count(json_decode($new['images']))-1) - 1?>%">
                                </a>
                            <?}?>
                        </div>
						<p class="mt-3 text-justify"><?= $new['annotation']?></p>
                        <a href=<?= site_url('pages/news/'.$new['id']);?>>Читать дальше</a><div class="text-muted float-right"><img class="float-left mt-1 mr-1" src=<?= base_url( IMG_PATH . 'eyes.svg')?>><small><?=$new['views']?></small></div>

					</div>
				<?}?>
			<?}
			else{
				echo "<p class='text-muted text-center mt-3'>На данный момент нет ни одной новости, но вы можете их добавить <a href='". site_url('panel/addNew') ."'>здесь</a>.</p>";
			}?>
		</div>
		<div class="col ml-4 card box-shadow shadow-lg mb-5" style="height: 380px;">
			<div class="mt-3">
				<h2>Популярно</h2>
				<ul class="list-group mt-3">
                    <?foreach($popular_news as $new){?>
                        <a href=<?= site_url('pages/news/'.$new['id']);?> class="text-muted list-group-item p-3"><?= $new['title']?> <div class="text-muted float-right"><img class="float-left mt-1 mr-1" src=<?= base_url( IMG_PATH . 'eyes.svg')?>><small><?=$new['views']?></small></div></a>
                    <?}?>
				</ul>
			</div>
		</div>
	</div>
</main>