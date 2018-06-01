<?php
require(ROOT . "model/SpeciesModel.php");

function index()
{
	$species = getAllSpecies();
	render("species/index", array(
		'species' => $species
	));	
}

function create()
{
	render("species/create");
}
function createSave()
{
	if(createSpecies()){
		header("location:" . URL . "species/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}
function edit($id)
{
	render("species/edit", array(
		'species' => getSpecies($id)
	));
}
function editSave($id)
{
	if(editSpecies($id)){
		header("location:" . URL . "species/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
} 
function delete($id)
{
	if(deleteSpecies($id)){
		header("location:" . URL . "species/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}
