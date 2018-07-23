<div class="mb-5 mt-3">
	<a href=<?= site_url('panel/news');?>>Назад</a>
	<h2 class="mb">Добавление газеты</h2>
	<script src=<?= base_url("assets/ckeditor/ckeditor.js");?>></script>
	<?= form_open_multipart('panel/addNewspaper')?>
		<div class="form-label-group">
			<label for="annotation-input">Краткое содержание</label>
			<textarea class="form-control" id="annotation-input" name="text" placeholder="Краткое содержание" rows="3"></textarea>
		</div>
        <div class="form-label-group row">
            <label class="btn btn-outline-secondary mt-3 col mr-1">
                Загрузка газеты | <input type="file" accept=".pdf" name="newspaperPDF" size="10" onchange="$('#upload-file-info').html(this.files[0].name)" hidden>
                <span class='label label-info' id="upload-file-info">Выберите файл</span>
            </label>
            <label class="btn btn-outline-secondary mt-3 col ml-1">
                Загрузка обложки | <input type="file" accept=".jpg, .gif, .jpeg, .png" name="newspaperImage" size="10" onchange="$('#upload-img-info').html(this.files[0].name)" hidden>
                <span class='label label-info' id="upload-img-info">Выберите файл</span>
            </label>
        </div>
		<button type="submit" class="btn btn-primary mt-3">Добавить</button>
		<a href=<?= site_url('panel/newspapers')?> class="btn btn-secondary mt-3">Отмена</a>
	</form>
</div>