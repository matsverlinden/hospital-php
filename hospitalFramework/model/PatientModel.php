<?php
function getPatient($id) 
{
	$db = openDatabaseConnection();
	$sql = "SELECT `patients`.*,`species`.`species_description`,`clients`.`client_firstname`,`clients`.`client_lastname`
			FROM `patients`
			INNER JOIN `species` ON `patients`.`species_id` = `species`.`species_id`
			INNER JOIN `clients` ON `patients`.`client_id` = `clients`.`client_id` 
			WHERE patient_id = :id 
			LIMIT 1";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));
	$db = null;
	return $query->fetch();
}
function getAllPatients() 
{
	$db = openDatabaseConnection();
	$sql = "SELECT `patients`.*,`species`.`species_description`,`clients`.`client_firstname`,`clients`.`client_lastname`
		FROM `patients`
		INNER JOIN `species` ON `patients`.`species_id` = `species`.`species_id`
		INNER JOIN `clients` ON `patients`.`client_id` = `clients`.`client_id`";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
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
function getAllSpecies() 
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}
function createPatient() {
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$name = ucwords(strtolower($name));
	$status = isset($_POST["status"]) ? $_POST["status"] : null;
	$status = ucfirst(strtolower($status));
	$species = isset($_POST["species"]) ? $_POST["species"] : null;
	$client = isset($_POST["client"]) ? $_POST["client"] : null;

	if ($name === null || $status === null || $species === null || $client === null) {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "INSERT INTO patients (patient_name, patient_status, species_id, client_id)
			VALUES (:name, :status, :species_id, :client_id)";
	$query = $db->prepare($sql);
	$query->execute(array(
			":name" => $name,
			":status" => $status,
			":species_id" => $species,
			":client_id" => $client
		));

	$db = null;

	return true;
} 

function editPatient($id=null) 
{
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$status = isset($_POST['status']) ? $_POST['status'] : null;
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$client = isset($_POST['client']) ? $_POST['client'] : null;
	
	if ($name === null || $status === null || $species === null || $client === null){
		return false;
	}
	
	$db = openDatabaseConnection();
	$sql = "UPDATE patients SET patient_name = :name, patient_status = :status, species_id = :species, client_id = :client WHERE patient_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":name" => $name,
		":status" => $status,
		":species" => $species,
		":client" => $client,
		":id" => $id));
	$db = null;
	
	return true;
}
function deletePatient($id) 
{
	if ($id === '') {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "DELETE FROM patients WHERE patient_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));
	
	$db = null;
	return true;
}