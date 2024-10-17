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
	<h3>Welcome to the Data Analyst Management System. Input your details here to register.</h3>
	<form action="core/handleForms.php" method="POST">
		<p><label for="firstName">First Name</label> <input type="text" class="nonradio" name="firstName"></p>
		<p><label for="lastName">Last Name</label> <input type="text" class="nonradio" name="lastName"></p>
		<p><label for="gender">Gender</label> <input type="text" class="nonradio" name="gender"></p>
		<p>Please select your SQL skill level:</p>
		<fieldset id="sqlSkill">
			<p><input type="radio" name="sqlSkill" value=3>Expert</p>
			<p><input type="radio" name="sqlSkill" value=2>Competent</p>
			<p><input type="radio" name="sqlSkill" value=1>Beginner</p>
		</fieldset>
		<p>Please select your Python skill level:</p>
		<fieldset id="pythonSkill">
			<p><input type="radio" name="pythonSkill" value=3>Expert</p>
			<p><input type="radio" name="pythonSkill" value=2>Competent</p>
			<p><input type="radio" name="pythonSkill" value=1>Beginner</p>
		</fieldset>
		<p>Please select your Excel skill level:</p>
		<fieldset id="excelSkill">
			<p><input type="radio" name="excelSkill" value=3>Expert</p>
			<p><input type="radio" name="excelSkill" value=2>Competent</p>
			<p><input type="radio" name="excelSkill" value=1>Beginner</p>
		</fieldset>
			<br><input type="submit" class="nonradio" name="submitRecords">
		</p>
	</form>
	
	<table style="width:100%; margin-top: 50px;">
		<tr>
			<th>Data Analyst ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
			<th>SQL Skill</th>
			<th>Python Skill</th>
			<th>Excel skill</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>
		
		<?php $seeAllRecords = seeAnalystRecords($pdo); ?>
		<?php foreach ($seeAllRecords as $row) { ?>
		<tr>
			<td><?php echo $row['da_id']; ?></td>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['sql_skill']; ?></td>
			<td><?php echo $row['python_skill']; ?></td>
			<td><?php echo $row['excel_skill']; ?></td>
			<td><?php echo $row['date_added']; ?></td>
			<td>
				<a href="editAnalyst.php?da_id=<?php echo $row['da_id'];?>">Edit</a>
				<a href="deleteAnalyst.php?da_id=<?php echo $row['da_id'];?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>