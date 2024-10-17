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
		.analystContainer {
			font-size: 1.5em;
			padding: 12px;
		}
		input {
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
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getDAID = getDAID($pdo, $_GET['da_id']); ?>
	<form action="core/handleForms.php?da_id=<?php echo $_GET['da_id']; ?>" method="POST">
		<div class="analystContainer" style="border-style: solid; font-family: 'Arial';">
			<p>First Name: <?php echo $getDAID['first_name']; ?></p>
			<p>Last Name: <?php echo $getDAID['last_name']; ?></p>
			<p>Gender: <?php echo $getDAID['gender']; ?></p>
			<?php
				function skillLevel($skill) {
					$expert = 'Expert';
					$competent = 'Competent';
					$beginner = 'Beginner';
					if ($skill == 3) {
						return $expert;
					} elseif ($skill == 2) {
						return $competent;
					} elseif ($skill == 1) {
						return $beginner;
					}
				}
			?>
			<p>SQL Skill Level: <?php echo skillLevel($getDAID['sql_skill']); ?></p>
			<p>Python Skill Level: <?php echo skillLevel($getDAID['python_skill']); ?></p>
			<p>Excel Skill Level: <?php echo skillLevel($getDAID['excel_skill']); ?></p>
			<input type="submit" name="deleteRecord" value="Delete">
		</div>
	</form>
</body>
</html>