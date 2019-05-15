<?php 
	session_start();
?>
<!DOCTYPE html5>
<html>
	<head>
		<meta charset="utf8">
		<title>Login utilisateur</title>
		<link href="../css/listeProduit.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		
		
		<div class="header">
			<h2><u>Produit</u></h2>
		</div>

		<div id="navbar">
		  <a class="active" href="../html/accueil.html">Home</a>
		  <a href="../html/listeProduit.html">Liste Produit</a>
		  <a href="#">Ajout d'un Produit</a>
		  <a href="#">Ajout d'une Catégorie</a>
		  <a href="#">Suppression d'un produit</a>
		  <div class="topnav-right">
			<a href="../html/Connexion.html">déconnect</a>
		  </div>
		</div>
		
		<div id="contain">
			<br>
			<?php
	$user = "root";
	$mdp = "";
	
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=inventaire",$user,$mdp);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$req = "select * from Produit";
		$pdoreq = $pdo->query($req);
		$pdoreq->setFetchMode(PDO::FETCH_ASSOC);
		
		
		echo "<h4><u>TEST</u></h4><table border=1px >
			<tr>
				<th>id</th>
				<th>nom</th>
				<th>qte</th>
				<th>PU</th>
				<th>cat</th>
			</tr>";
		foreach($pdoreq as $ligne){
			echo "<tr><td>".$ligne['prd_id']."</td><td>"
				.$ligne['prd_nom']."</td><td>"
				.$ligne['prd_qte']."</td><td>"
				.$ligne['prd_pu']."</td><td>"
				.$ligne['prd_cat']."</td></tr>";
		}
		echo "</table></br>";
			
	}
	catch(PDOException $e){
		echo "Error :".$e->getMessage();
		die();
		
	}
	?>
			
		
		</div>

		
		
		
		
		<script>
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("navbar");
		var sticky = navbar.offsetTop;

		function myFunction() {
		  if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
		  } else {
			navbar.classList.remove("sticky");
		  }
		}
		</script>
	</body>
</html>

