<?php
function getClient($id) 
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM clients WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));
	$db = null;
	return $query->fetch();
}
function getAllClients()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM clients";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function createClient() {
	$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : null;
	$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : null;
	$phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
	$email = isset($_POST["email"]) ? $_POST["email"] : null;

	if ($firstname === null || $lastname === null || $phone === null || $email === null) {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "INSERT INTO clients (client_firstname, client_lastname , client_phone, client_email)
			VALUES (:firstname, :lastname, :phone, :email)";
	$query = $db->prepare($sql);
	$query->execute(array(
			":firstname" => $firstname,
			":lastname" => $lastname,
			":phone" => $phone,
			":email" => $email
		));

	$db = null;
	return true;
}

function deleteClient($id) 
{
	if ($id === '') {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "DELETE FROM clients WHERE client_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));
	
	$db = null;
	return true;
}
function editClient($id = null) 
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	
	if ($firstname === null || $lastname === null || $phone === null || $email === null || $id === null){
		return false;
	}
	
	$db = openDatabaseConnection();
	$sql = "UPDATE clients SET client_firstname = :firstname, client_lastname = :lastname, client_phone = :phone, client_email = :email WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":firstname" => $firstname,
		":lastname" => $lastname,
		":phone" => $phone,
		":email" => $email,
		":id" => $id));
	$db = null;
	
	return true;
}
