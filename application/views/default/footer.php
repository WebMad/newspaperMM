		</div>
		<footer class="blog-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						
						<h4>Страницы</h4>
						<ul class="list-unstyled text-small">
			              <li><a href=<?= site_url('Pages/news');?> class="text-muted">Новости</a></li>
			              <li><a href=<?= site_url('Pages/archive');?> class="text-muted">Газеты</a></li>
			              <li><a href=<?= site_url('Pages/authors');?> class="text-muted">Авторы</a></li>
			              <li><a href=<?= site_url('Pages/about');?> class="text-muted">О нас</a></li>
			            </ul>


					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-7">
								<h4>Информация</h4>
                                <?= $contacts['text']?>
								<!--<p>
									Адрес редакции:<br>
									г. Астрахань, ул. Анри Барбюса, 7<br>
									Региональный школьный технопарк<br>
									Эл.адрес:
									mar194@yandex.ru<br>
									Тел.:
									+7(8512) 52-68-92<br>
									+7(908) 623-28-33<br>
								</p>-->
							</div>
							<div class="col-lg-5">
								<img src=<?= base_url( IMG_PATH . 'rspr_barcode.png')?> class="w-100">
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<h4>Редколлегия:</h4>
						<ul class="list-unstyled text-small">
			              <li><a class="text-muted" href="#">Директор РШТ: В.Войков</a></li>
			              <li><a class="text-muted" href="#">Редактор: М.Бобровская</a></li>
			              <li><a class="text-muted" href="#">Дизайн названия: М. Агафонов</a></li>
			            </ul>
					</div>
				</div>
				<div class="text-center"><p>Создатель сайта - <a href="https://vk.com/id286005561" class="text-muted">Алексей Губин</a></p></div>
				<div class="text-center"><p><a href="#">Вверх!</a></p></div>
			</div>
		</footer>
		<script src=<?= base_url( JS_PATH . 'jquery.min.js');?>></script>
        <script src=<?= base_url( JS_PATH . 'popper.min.js');?>></script>
        <script src=<?= base_url( JS_PATH . 'bootstrap.min.js');?>></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
        <script>
            $(document).on("click", '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>
	</body>
</html>