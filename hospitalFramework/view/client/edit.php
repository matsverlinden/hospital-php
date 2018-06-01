<h1>Edit Client:</h1>
	<form action="<?= URL ?>client/editSave/<?=$client["client_id"]?>" method="POST">

	<input type="hidden" name="id" value="<?=$client["client_id"]?>">
	<h3>Firstname:</h3>
	<input class="text" type="text" name="firstname" value="<?=$client["client_firstname"]?>">

	<h3>Lastname:</h3>
	<input class="text" type="text" name="lastname" value="<?=$client["client_lastname"]?>">

	<h3>Mobile number:</h3>
	<input class="text" type="tel" name="phone" value="<?=$client["client_phone"]?>" maxlength="10">

	<h3>Email adress:</h3>
	<input class="text" type="email" name="email" value="<?=$client["client_email"]?>">

	<input class="add" type="submit">
	</form>