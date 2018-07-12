<div class="mb-5 mt-3">
	<h2 class="mb-0">Новости</h2>
	<small class="ml-1 text-muted"><a href=<?= site_url('panel/addNew')?>>Добавить новость</a></small>
	<?if(count($news)>0){?>
		<table class="table mt-3">
			<thead>
				<tr>
					<th>#</th>
					<th>Заголовок</th>
					<th>Просмотры</th>
					<th>Дата</th>
					<th>Редактировано</th>
					<th>Действие</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($news as $new){?>
					<tr>
						<th scope="row"><?= $new['id']?></th>
						<td><?= $new['title']?></td>
						<td><?= $new['views']?></td>
						<td><?= $new['date']?></td>
						<td><?= $new['last_edit']?></td>
						<td>Удалить</td>
					</tr>
				<?}?>
			</tbody>
		</table>
	<?}
	else{
		echo "<p class='text-muted text-center'>На данный момент нет ни одной новости, но вы можете их добавить <a href='". site_url('panel/addNew') ."'>здесь</a>.</p>";
	}?>
</div>