<?php
require(ROOT . "model/PatientModel.php");

function index()
{
	$patients = getAllPatients();
	render("patient/index", array(
		'patients' => $patients
	));	
}

function create()
{
	$species = getAllSpecies();
	$clients = getAllClients();
	render("patient/create", array(
		"species" => $species,
		"clients" => $clients
	));
}
function createSave()
{
	if(createPatient()){
		header("location:" . URL . "patient/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}
function edit($id)
{
	$species = getAllSpecies();
	$clients = getAllClients();
	$patient = getPatient($id);
	render("patient/edit", array(
		"species" => $species,
		"clients" => $clients,
		"patient" => $patient
	));
}
function editSave($id)
{
	if(editPatient($id)){
		header("location:" . URL . "patient/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
} 
function delete($id)
{
	if(deletePatient($id)){
		header("location:" . URL . "patient/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}
