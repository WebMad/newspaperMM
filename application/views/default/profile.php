<main>
	<div class="row mt-3 mb-5">
		<div class="col-lg-3 card box-shadow shadow-lg" style="height: 380px;">
			<div class="mb-5 mt-3">
				<h2 class="mb-0">Фотография</h2>

			</div>
		</div>
		<div class="col ml-9 ml-4 card box-shadow shadow-lg">
			<div class="row mt-3 mb-3">
				<div class="col-lg-12 mb-3">
					<h3>Закладки</h3>
					<small class="text-muted mt-3">У вас нет закладок.</small>
				</div>
				<div class="col-lg-6">
					<h3>Информация</h3>
					<?= form_open('User/updateInformation')?>
						<div class="form-label-group">
							<label for="name">Имя: <br></label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Имя" value="<?=$_SESSION['name']?>" required="" autofocus="">
						</div>
						<div class="form-label-group">
							<label for="surname">Фамилия: <br></label>
							<input type="text" id="surname" name="surname" class="form-control" placeholder="Фамилия" value="<?=$_SESSION['surname']?>" required="" autofocus="">
						</div>
						<div class="form-label-group">
							<label for="email">Электронная почта: <br></label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Электронная почта" value="<?=$_SESSION['email']?>" required="" autofocus="">
						</div>
						<button class="btn btn-primary mt-3" type="submit">Сохранить</button>
					</form>
				</div>
				<div class="col-lg-6">
					<h3>Безопасность</h3>
					<?= form_open('User/updatePassword')?>
						<div class="form-label-group">
							<label for="last_password">Старый пароль: <br></label>
							<input type="password" id="last_password" name="last_password" class="form-control" placeholder="Старый пароль" required="" autofocus="">
						</div>
						<div class="form-label-group">
							<label for="password">Новый пароль: <br></label>
							<input type="password" id="password" name="password" class="form-control" placeholder="Новый пароль" required="" autofocus="">
						</div>
						<div class="form-label-group">
							<label for="repeat_password">Повторите пароль: <br></label>
							<input type="password" id="repeat_password" name="repeat_password" class="form-control" placeholder="Повторите пароль" required="" autofocus="">
						</div>
						<button class="btn btn-primary mt-3" type="submit">Изменить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row mb-5">
	
	</div>
</main>