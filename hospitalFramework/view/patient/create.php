<h1>Create patient</h1>
<form action="<?= URL ?>Patient/createSave" method="POST">

<label>Patient name:</label>
<input type="text" name="name"> <br>
<label>Patient status:</label>
<input type="text" name="status">
<br>
	<label>Dier soort:</label>
	<select name="species">
		<option value="" selected disabled hidden>Dieren</option>
<?php 
		foreach ($species as $species) {
?>
		<option value="<?=$species["species_id"]?>"><?=$species["species_description"]?></option>
<?php }
?>
		</select>
		<br>
		<label>Client naam:</label>
		<select name="client">
			<option value="" selected disabled hidden>Client</option>
			<?php 
			foreach ($clients as $client) {
				?>
				<option value="<?=$client['client_id']?>"><?=$client['client_firstname'] . " " . $client['client_lastname']?></option>
		<?php
			}
		?>
		</select>
<br><br>
<input type="submit" name="submit">

</form>