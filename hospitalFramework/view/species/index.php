	<h1>Hospital</h1>
	<h2>Species</h2>

	<table>
		<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Description</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
	</tbody>
		<tbody>
			<tr>
				<?php foreach ($species as $species) {
				?>
				<td><?= $species['species_id']?></td>
				<td><?= $species['species_description']?></td>
				<td class="center"><a href="<?= URL ?>species/edit/<?=$species['species_id']?>">edit</a></td>
				<td class="center"><a href="<?= URL ?>species/delete/<?=$species['species_id']?>">delete</a></td>
			</tr>
		</tbody>
		<?php }
	?>
	</table>
	<p><a href="<?= URL ?>species/create">Create</a></p>