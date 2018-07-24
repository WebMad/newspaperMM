<div class="mb-5 mt-3">
    <script src=<?= base_url("assets/ckeditor/ckeditor.js");?>></script>
	<a href=<?= site_url('panel/information');?>>Назад</a>
    <?
    switch($data['type']){
        case 'about_us': echo "<h2 class=\"mb\">О нас</h2>"; break;
        case 'contacts': echo "<h2 class=\"mb\">Информация</h2>";
    }

    ?>
	<script src=<?= base_url("assets/ckeditor/ckeditor.js");?>></script>
	<?= form_open('panel/editInformation')?>
        <input hidden type="text" name="type" value="<?=$data['type']?>">
		<div class="form-label-group">
			<textarea class="form-control" id="content-input" name="text" placeholder="Краткое содержание" rows="3"><?=$data['text']?></textarea>
		</div>
		<button type="submit" class="btn btn-primary mt-3">Добавить</button>
		<a href=<?= site_url('panel/information')?> class="btn btn-secondary mt-3">Отмена</a>
	</form>
    <script>
        CKEDITOR.replace( document.querySelector( '#content-input' ), {customConfig: '/assets/ckeditor/build-config.js'} );
    </script>
</div>