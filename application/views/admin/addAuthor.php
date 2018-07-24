<div class="mb-5 mt-3">
	<a href=<?= site_url('panel/authors');?>>Назад</a>
	<h2 class="mb">Добавление автора</h2>
	<script src=<?= base_url("assets/ckeditor/ckeditor.js");?>></script>
	<?= form_open_multipart('panel/addAuthor')?>
        <div class="form-label-group">
            <label for="name-input">Имя</label>
            <input type="text" id="name-input" name="name" class="form-control" placeholder="Имя" required="">
        </div>
        <div class="form-label-group">
            <label for="surname-input">Фамилия</label>
            <input type="text" id="surname-input" name="surname" class="form-control" placeholder="Фамилия" required="">
        </div>
        <div class="form-label-group">
            <label for="email-input">Email</label>
            <input type="email" id="email-input" name="email" class="form-control" placeholder="Email" required="">
        </div>
        <div class="form-label-group">
            <label for="password-input">Пароль</label>
            <input type="password" id="password-input" name="password" class="form-control" placeholder="Пароль" required="">
        </div>
        <div class="form-label-group">
            <label for="repassword-input">Повтор пароля</label>
            <input type="password" id="repassword-input" name="repassword" class="form-control" placeholder="Повтор пароля" required="">
        </div>
		<!--<div class="form-label-group">
			<label for="annotation-input">Краткое содержание</label>
			<textarea class="form-control" id="annotation-input" name="text" placeholder="Краткое содержание" rows="3"></textarea>

        </div>-->
        <div class="form-label-group row">
            <label class="btn btn-outline-secondary mt-3 col ml-1">
                Загрузка картинки | <input type="file" accept=".jpg, .gif, .jpeg, .png" name="userfile" size="10" onchange="$('#upload-img-info').html(this.files[0].name)" hidden>
                <span class='label label-info' id="upload-img-info">Выберите файл</span>
            </label>
        </div>
		<button type="submit" class="btn btn-primary mt-3">Добавить</button>
		<a href=<?= site_url('panel/newspapers')?> class="btn btn-secondary mt-3">Отмена</a>
	</form>
</div>