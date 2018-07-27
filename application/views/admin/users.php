<div class="mb-5 mt-3">
	<h2 class="mb-0">Пользователи</h2>
	<small class="ml-1 text-muted"><a href=<?= site_url('panel/addUser')?>>Добавить пользователя</a></small>
	<?if(count($users)>0){?>
		<table class="table mt-3">
			<thead>
				<tr>
					<th>#</th>
					<th>Имя</th>
					<th>Фамилия</th>
					<th>Email</th>
					<th>Тип</th>
					<th>Действие</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($users as $user){?>
					<tr>
						<th scope="row"><?= $user['id']?></th>
						<td><?= $user['name']?></td>
						<td><?= $user['surname']?></td>
						<td><?= $user['email']?></td>
                        <td><?
                            switch($user['type']){
                                case 0: echo 'гость'; break;
                                case 1: echo 'администратор'; break;
                                case 2: echo 'автор'; break;
                            }


                            ?>
                        </td>
                        <td><a href=<?= site_url('panel/users/delete/' . $user['id'])?>>Удалить</a></td>
					</tr>
				<?}?>
			</tbody>
		</table>
	<?}
	else{
		echo "<p class='text-muted text-center'>На данный момент нет ни одного пользователя, но вы можете его добавить <a href='". site_url('panel/addUser') ."'>здесь</a>.</p>";
	}?>
</div>