<main>
	<div class="row mt-3 mb-3">
        <?
        if(count($newspapers)>0) {

            foreach ($newspapers as $newspaper) {
                ?>
                <div class="col-lg-4">
                    <div class="card mb-4 box-shadow shadow-lg">
                        <img class="card-img-top"
                             src=<?= base_url(IMG_NEWSPAPER_PATH . $newspaper['img']); ?> data-holder-rendered="true"
                             style="width: 100%; display: block;">
                        <div class="card-body">
                            <p class="card-text"><?= $newspaper['text'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button"
                                            onclick="window.open('<?= base_url(PDF_NEWSPAPER_PATH . $newspaper['filename']) ?>')"
                                            class="btn btn-sm btn-outline-secondary">Читать
                                    </button>
                                    <button type="button"
                                            onclick="window.open('<?= site_url('pages/archive/download/' . $newspaper['id']) ?>')"
                                            class="btn btn-sm btn-outline-secondary">Скачать
                                    </button>
                                </div>
                                <span class="text-muted"><?= strftime("%b %Y", strtotime($newspaper['date'])); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?
            }
        }
        else {
        ?>
            <p class='text-muted text-center m-auto'>На данный момент нет ни одной газеты.</p>
        <?
        }
        ?>

<!--
		<div class="col-lg-4">
			<div class="card mb-4 box-shadow shadow-lg">
				<img class="card-img-top" src=<?= base_url( IMG_PATH . 'npaper1.png');?> data-holder-rendered="true" style="width: 100%; display: block;">
				<div class="card-body">
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
							<button type="button" class="btn btn-sm btn-outline-secondary">Скачать</button>
						</div>
						<span class="text-muted">Апрель 2018</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card mb-4 box-shadow shadow-lg">
				<img class="card-img-top" src=<?= base_url( IMG_PATH . 'npaper2.png');?> data-holder-rendered="true" style="width: 100%; display: block;">
				<div class="card-body">
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
							<button type="button" class="btn btn-sm btn-outline-secondary">Скачать</button>
						</div>
						<span class="text-muted">Март 2018</span>
					</div>
				</div>
			</div>
		</div>-->
	</div>
</main>