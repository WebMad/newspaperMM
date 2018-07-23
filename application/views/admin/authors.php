<div class="mb-5 mt-3">
	<h2 class="mb-0">Авторы</h2>
	<small class="ml-1 text-muted"><a href=<?= site_url('panel/addAuthor')?>>Добавить автора</a></small>
	<?if(count($authors)>0){?>
		<table class="table mt-3">
			<thead>
				<tr>
					<th>#</th>
					<th>Имя</th>
					<th>Фамилия</th>
					<th>Email</th>
					<th>Действие</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($authors as $author){?>
					<tr>
						<th scope="row"><?= $author['id']?></th>
						<td><?= $author['name']?></td>
						<td><?= $author['surname']?></td>
						<td><?= $author['email']?></td>
                        <td><a href=<?= site_url('panel/authors/delete/' . $author['id'])?>>Удалить</a></td>
					</tr>
				<?}?>
			</tbody>
		</table>
	<?}
	else{
		echo "<p class='text-muted text-center'>На данный момент нет ни одного автора, но вы можете его добавить <a href='". site_url('panel/addAuthor') ."'>здесь</a>.</p>";
	}?>
</div>