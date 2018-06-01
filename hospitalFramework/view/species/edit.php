<h1>Edit species:</h1>
	<form action="<?= URL ?>species/editSave/<?=$species["species_id"]?>" method="POST">

	<input type="hidden" name="id" value="<?=$species["species_id"]?>">
	<h3>Descriprion:</h3>
	<input class="text" type="text" name="description" value="<?=$species["species_description"]?>">

	<input class="add" type="submit">
	</form>