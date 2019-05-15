<?php
	session_start();
?>

<!DOCTYPE html5>
<html>
	<head>
		<meta charset="utf8">
		<title>Login utilisateur</title>
		
	</head>
	<body>
		<center><h4><u>réussi</u></h4>
		<?php
			echo "Bienvenue Monsieur ". $_SESSION['nom'];
		?>
		</center>
	</body>
</html>
