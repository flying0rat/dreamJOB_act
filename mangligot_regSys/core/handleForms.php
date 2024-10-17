<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['submitRecords'])) {
	$fname = trim($_POST['firstName']);
	$lname = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$sqlskill = $_POST['sqlSkill'];
	$pythonskill = $_POST['pythonSkill'];
	$excelskill = $_POST['excelSkill'];
	
	if (!empty($fname) && !empty($lname) && !empty($gender) && !empty($sqlskill) && !empty($pythonskill)
	&& !empty($excelskill)) {
		$query = insertIntoDARecords($pdo, $fname, $lname, $gender, $sqlskill, $pythonskill, $excelskill);
		
		if ($query) {
			header("Location: ../index.php");
		} else {
			echo "Query failed";
		}
	} else {
		echo "No fields should be empty";
	}
}

if (isset($_POST['editRecords'])) {
	$da_id = $_GET['da_id'];
	$fname = trim($_POST['firstName']);
	$lname = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$sqlskill = $_POST['sqlSkill'];
	$pythonskill = $_POST['pythonSkill'];
	$excelskill = $_POST['excelSkill'];
	
	if (!empty($da_id) && !empty($fname) && !empty($lname) && !empty($gender) && !empty($sqlskill) && 
	!empty($pythonskill) && !empty($excelskill)) {
		$query = updateAnalyst($pdo, $da_id, $fname, $lname, $gender, $sqlskill, $pythonskill, $excelskill);
			
		if ($query) {
			header("Location: ../index.php");
		} else {
			echo "Update failed";
		}
	} else {
		echo "No fields should be empty";
	}
}

if (isset($_POST['deleteRecord'])) {
	$query = deleteAnalyst($pdo, $_GET['da_id']);
	
	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}
?>