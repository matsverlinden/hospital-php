	<h1>Hospital</h1>

	<h2>Patiënts</h2>

	<table>
		<tbody>
		<thead>
			<tr>
				<th>Name</th>
				<th>Species</th>
				<th>Status</th>
				<th>Client</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		</tbody>
		<tbody>
		<tr>
			<?php foreach ($patients as $patient) {
			?>
			<td><?= $patient['patient_name']?></td>
			<td><?= $patient['species_description']?></td>
			<td><?= $patient['patient_status']?></td>
			<td><?= $patient['client_firstname'] . " " . $patient['client_lastname']?></td>
			<td class="center"><a href="<?= URL ?>patient/edit/<?=$patient['patient_id']?>">edit</a></td>
			<td class="center"><a href="<?= URL ?>patient/delete/<?=$patient['patient_id']?>">delete</a></td>
		</tr>

	<?php } ?>

	</tbody>		
	</table>
		<p><a href="<?= URL ?>patient/create">Create</a></p>