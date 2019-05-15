<?php
	session_start();
	$_SESSION['cat'] = null;
?>


<!DOCTYPE html5>
<html>
	<head>
		<meta charset="utf8">
		<title>Login utilisateur</title>
		<link href="../css/ajouterCat.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		
		
		<div class="header">
			<h2><u>Produit</u></h2>
		</div>

		<div id="navbar">
		  <a class="active" href="../html/accueil.php">Home</a>
		  <a href="../html/listeProduit.php">Liste Produit</a>
		  <a href="../html/ajouterProduit.php">Ajout d'un Produit</a>
		  <a href="../html/ajouterCat.php">Ajout d'une Catégorie</a>
		  <a href="../html/supprimerProduit.php">Suppression d'un produit</a>
		  <div class="topnav-right">
			<a href="../html/Connexion.html">déconnect</a>
		  </div>
		</div>
		
		<div id="contain">
			
			<h4 id="title"><u>Catégories</u></h4>
			<?php
						$user = "root";
						$mdp = "";
						
						try{
							$pdo = new PDO("mysql:host=localhost;dbname=inventaire",$user,$mdp);
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$req = "select * from Categorie";
							$pdoreq = $pdo->query($req);
							$pdoreq->setFetchMode(PDO::FETCH_ASSOC);

							echo "<table border=1px id=".'"'."customers".'"'.">
							<tr>
								<th>ID Catégorie</th>
								<th>Libelle</th>
							</tr>";
						
						foreach($pdoreq as $ligne){
							echo "<tr><td>".$ligne['idCat']."</td><td>"
								.$ligne['libelle']."</td></tr>";
						}
						}
						catch(PDOException $e){
							echo "Error :".$e->getMessage();
							die();
							
						}
							
					
					?>
					<tr>
			
						<form action="../php/ajouterCat.php" method="POST">			
							<td colspan=2>
								<label>Catégorie</label>
								<input type="text" name="cat" size="30" placeholder="ex : Alimentation,Technologie" required >
							</td>
							
					</tr>
					<tr>
							<td><input type="submit" value="Ajouter Catégorie" id="reserver"></td>
							<td><input type="reset" value="Effacer" id="effacer"></td>
						</form>
					</tr>
					</table>
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
