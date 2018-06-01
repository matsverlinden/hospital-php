<?php
require(ROOT . "model/ClientModel.php");

function index()
{
	$clients = getAllClients();
	render("client/index", array(
		'clients' => $clients
	));	
}

function create()
{
	render("client/create", array(
	));
}
function createSave()
{
	if(createClient()){
		header("location:" . URL . "client/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}
function edit($id)
{
	render("client/edit", array(
		'client' => getClient($id)
	));
}
function editSave($id)
{
	if(editClient($id)){
		header("location:" . URL . "client/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
} 
function delete($id)
{
	if(deleteClient($id)){
		header("location:" . URL . "client/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}
