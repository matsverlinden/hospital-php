	<h1>Hospital</h1>
		<h2>Clients</h2>
<table>
			<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Phone</th>
				<th>Email</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		</tbody>
			<tr>
	<?php 
				foreach ((array)$clients as $client) {
?>
		<tbody>
				<td><?= $client['client_firstname']?></td>
				<td><?= $client['client_lastname']?></td>
				<td><?= $client['client_phone']?></td>
				<td><?= $client['client_email']?></td>
				<td class="center"><a href="<?= URL ?>client/edit/<?=$client['client_id']?>">edit</a></td>
				<td class="center"><a href="<?= URL ?>client/delete/<?=$client["client_id"]?>">delete</a></td>
			</tr>
		</tbody>
 	
	<?php
		}	
	?>
			</tr>
		</table>

		<p><a href="<?= URL ?>client/create">Create</a></p>