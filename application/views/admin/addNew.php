<div class="mb-5 mt-3">
	<a href=<?= site_url('panel/news');?>>Назад</a>
	<h2 class="mb">Добавление новости</h2>
	<script src=<?= base_url("assets/ckeditor/ckeditor.js");?>></script>
	<?= form_open_multipart('panel/addNew')?>
		<div class="form-label-group">
			<label for="title-input">Заголовок</label>
			<input type="text" id="title-input" name="title" class="form-control" placeholder="Заголовок" required="">
		</div>
		<div class="form-label-group">
			<label for="annotation-input">Краткое содержание</label>
			<textarea class="form-control" id="annotation-input" name="annotation" placeholder="Краткое содержание" rows="3"></textarea>
		</div>
		<div class="form-label-group">
			<label for="content-input">Содержание</label>
			<textarea class="form-control" id="content-input" name="text" placeholder="Содержание" rows="3"></textarea>
		</div>
        <div class="form-label-group">
            <label class="btn btn-outline-secondary mt-3 w-100">
                Загрузка доп. изображений | <input type="file" accept=".jpg .gif .jpeg .png" name="newImages[]" multiple size="10" onchange="$('#upload-file-info').html(this.files[0].name)" hidden>
                <span class='label label-info' id="upload-file-info">Выберите файлы</span>
            </label>
        </div>
		<button type="submit" class="btn btn-primary mt-3">Добавить</button>
		<a href=<?= site_url('panel/news')?> class="btn btn-secondary mt-3">Отмена</a>
	</form>
	<script>
		CKEDITOR.replace( document.querySelector( '#content-input' ), {customConfig: '/assets/ckeditor/build-config.js'} );
	
	</script>
</div>