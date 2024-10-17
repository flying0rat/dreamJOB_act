<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewpoort" content="width=device-width, initial-scale=1.0">
	<title>My Dream Job</title>
	<style>
		body {
			font-family: "Arial";
		}
		.nonradio {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
			width: 200px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<?php $getDAID = getDAID($pdo, $_GET['da_id']); ?>
	<form action="core/handleForms.php?da_id=<?php echo $_GET['da_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" class="nonradio" name="firstName" value="<?php echo $getDAID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" class="nonradio" name="lastName" value="<?php echo $getDAID['last_name']; ?>">
		</p>
		<p>
			<label for="gender">Gender</label> 
			<input type="text" class="nonradio" name="gender" value="<?php echo $getDAID['gender']; ?>">
		</p>
		<p>Edit the SQL skill level:</p>
		<fieldset id="sqlSkill">
			<p><input type="radio" name="sqlSkill" value=3 <?php if ($getDAID['sql_skill'] == 3) { echo "checked='checked'";} ?>>Expert</p>
			<p><input type="radio" name="sqlSkill" value=2 <?php if ($getDAID['sql_skill'] == 2) { echo "checked='checked'";} ?>>Competent</p>
			<p><input type="radio" name="sqlSkill" value=1 <?php if ($getDAID['sql_skill'] == 1) { echo "checked='checked'";} ?>>Beginner</p>
		</fieldset>
		<p>Edit the Python skill level:</p>
		<fieldset id="pythonSkill">
			<p><input type="radio" name="pythonSkill" value=3 <?php if ($getDAID['python_skill'] == 3) { echo "checked='checked'";} ?>>Expert</p>
			<p><input type="radio" name="pythonSkill" value=2 <?php if ($getDAID['python_skill'] == 2) { echo "checked='checked'";} ?>>Competent</p>
			<p><input type="radio" name="pythonSkill" value=1 <?php if ($getDAID['python_skill'] == 1) { echo "checked='checked'";} ?>>Beginner</p>
		</fieldset>
		<p>Edit the Excel skill level:</p>
		<fieldset id="excelSkill">
			<p><input type="radio" name="excelSkill" value=3 <?php if ($getDAID['excel_skill'] == 3) { echo "checked='checked'";} ?>>Expert</p>
			<p><input type="radio" name="excelSkill" value=2 <?php if ($getDAID['excel_skill'] == 2) { echo "checked='checked'";} ?>>Competent</p>
			<p><input type="radio" name="excelSkill" value=1 <?php if ($getDAID['excel_skill'] == 1) { echo "checked='checked'";} ?>>Beginner</p>
		</fieldset>
			<br><input type="submit" class="nonradio" name="editRecords">
	</form>
</body>
</html>