<div class="mb-5 mt-3">
	<h2 class="mb-0">Газеты</h2>
	<small class="ml-1 text-muted"><a href=<?= site_url('panel/addNewspaper')?>>Добавить газету</a></small>
	<?if(count($newspapers)>0){?>
		<table class="table mt-3">
			<thead>
				<tr>
					<th>#</th>
					<th>Описание</th>
					<th>Дата</th>
					<th>Действие</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($newspapers as $newspaper){?>
					<tr>
						<th scope="row"><?= $newspaper['id']?></th>
						<td><?= $newspaper['text']?></td>
						<td><?= $newspaper['date']?></td>
                        <td><a href=<?= site_url('panel/newspapers/delete/' . $newspaper['id'])?>>Удалить</a></td>
					</tr>
				<?}?>
			</tbody>
		</table>
	<?}
	else{
		echo "<p class='text-muted text-center'>На данный момент нет ни одной газеты, но вы можете их добавить <a href='". site_url('panel/addNewspaper') ."'>здесь</a>.</p>";
	}?>
</div>