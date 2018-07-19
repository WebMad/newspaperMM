<div class="mb-5 mt-3">
	<h2>Конструктор главной страницы</h2>
	<?= form_open('');?>
		<table class="table">
			<tr>
				<td>Главная новость</td>
				<td>
					<select name="data[main_new]" class="form-control">
						<?=$news?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Блок новостей</td>
				<td>
					<label>Новость 1: </label>
					<select name="data[news][]" class="form-control">
						<?=$news?>
					</select>
					<label class="mt-3">Новость 2: </label>
					<select name="data[news][]" class="form-control">
						<?=$news?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Блок газет</td>
				<td>
					<label>Газета 1: </label>
					<select name="data[newspaper][]" class="form-control">
						<option>dsdsdsd dsdsd dsdsdsd</option>
						<option>dsdsdsd dsdsd dsdsdsd</option>
						<option>dsdsdsd dsdsd dsdsdsd</option>
					</select>
					<label class="mt-3">Газета 2: </label>
					<select name="data[newspaper][]" class="form-control">
						<option>dsdsdsd dsdsd dsdsdsd</option>
						<option>dsdsdsd dsdsd dsdsdsd</option>
						<option>dsdsdsd dsdsd dsdsdsd</option>
					</select>
					<label class="mt-3">Газета 3: </label>
					<select name="data[newspaper][]" class="form-control">
						<option>dsdsdsd dsdsd dsdsdsd</option>
						<option>dsdsdsd dsdsd dsdsdsd</option>
						<option>dsdsdsd dsdsd dsdsdsd</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Блок авторов</td>
				<td>
					<label>Автор 1: </label>
					<select name="data[authors][]" class="form-control">
						<?= $authors?>
					</select>
					<label class="mt-3">Автор 2: </label>
					<select name="data[authors][]" class="form-control">
						<?= $authors?>
					</select>
				</td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary">Сохранить</button>
	</form>
	<p></p>
</div>