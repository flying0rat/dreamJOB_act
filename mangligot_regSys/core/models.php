<!-- Database interaction -->

<?php 

require_once 'dbConfig.php';

function insertIntoDARecords($pdo, $fname, $lname, $gender, $sql_skill, $python_skill, 
	$excel_skill) {
	
	$sql = "insert into danalyst_records (first_name, last_name, gender, sql_skill, python_skill, 
	excel_skill) values (?,?,?,?,?,?)";
	
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute( 
		[$fname, $lname, $gender, $sql_skill, $python_skill, $excel_skill] 
	);
	
	if ($executeQuery) {
		return true;
	}
}

function seeAnalystRecords($pdo) {
	$sql = "select * from danalyst_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getDAID($pdo, $da_id) {
	$sql = "select * from danalyst_records where da_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$da_id])) {
		return $stmt->fetch();
	}
}

function updateAnalyst($pdo, $da_id, $fname, $lname, $gender, $sql_skill, $python_skill, 
	$excel_skill) {
		$sql = "update danalyst_records 
					set first_name = ?, 
					last_name = ?, 
					gender = ?, 
					sql_skill = ?, 
					python_skill = ?, 
					excel_skill = ? 
				where da_id = ?";
		$stmt = $pdo->prepare($sql);
		
		$executeQuery = $stmt->execute([$fname, $lname, $gender, $sql_skill, $python_skill,
		$excel_skill, $da_id]);
		
		if ($executeQuery) {
			return true;
		}
	}
	
function deleteAnalyst($pdo, $da_id) {
	$sql = "delete from danalyst_records where da_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$da_id]);
	
	if ($executeQuery) {
		return true;
	}
}
?>