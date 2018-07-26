<div class="mb-5 mt-3">
	<h2>Конструктор главной страницы</h2>
	<?= form_open('');?>
		<table class="table">
			<tr>
				<td>Главная новость</td>
				<td>
					<select name="data[main_new][]" multiple class="form-control">
						<?=$news?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Блок новостей</td>
				<td>
                    <label><small class="text-muted">Для выбора нескольких пунктов нажмите и удерживайте ctrl на клавиатуре</small></label>
					<select name="data[news][]" multiple class="form-control">
						<?=$news?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Блок газет</td>
				<td>
                    <label><small class="text-muted">Для выбора нескольких пунктов нажмите и удерживайте ctrl на клавиатуре</small></label>
					<select name="data[newspapers][]" multiple class="form-control">
						<?=$newspapers?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Блок авторов</td>
				<td>
                    <label><small class="text-muted">Для выбора нескольких пунктов нажмите и удерживайте ctrl на клавиатуре</small></label>
					<select name="data[authors][]" multiple class="form-control">
						<?= $authors?>
					</select>
				</td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary">Сохранить</button>
	</form>
	<p></p>
</div>