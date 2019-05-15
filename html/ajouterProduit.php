<?php
	session_start();
	$_SESSION['cat'] = null;
?>


<!DOCTYPE html5>
<html>
	<head>
		<meta charset="utf8">
		<title>Login utilisateur</title>
		<link href="../css/ajouterProduit.css" rel="stylesheet" type="text/css" media="all">
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
			<br>
			<form action="../php/ajouterProduit.php" method="POST">			
				<fieldset>
					<Legend>SAISIE DES PRODUITS</Legend>
					<p>
					<label>Nom Produit :</label>
					<input type="text" name="nom" size="25" placeholder="ex:Mike" required >
					</p>
					<p>
					<label>Quantité :</label>
					<input type="number" name="qte" max = 998 size="25" required >
					</p>
					<p>
					<label>Prix unitaire :</label>
					<input type="number" step="0.01" name="pu" size="25" required >
					</p>
					<p>
					<label>Categorie :</label>
					<select name = "categorie">
						<option value ="null"> Selectionner</option>
					<?php
						$user = "root";
						$mdp = "";
						
						try{
							$pdo = new PDO("mysql:host=localhost;dbname=inventaire",$user,$mdp);
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$req = "select * from Categorie";
							$pdoreq = $pdo->query($req);
							$pdoreq->setFetchMode(PDO::FETCH_ASSOC);

							foreach($pdoreq as $ligne){
								echo "<option value =".$ligne['idCat'].">".$ligne['libelle']."</option>";
							}
						}
						catch(PDOException $e){
							echo "Error :".$e->getMessage();
							die();
							
						}
							
					
					?>
					</select>
					</p>
					<input type="submit" value="Ajouter Produit" id="reserver">
					<input type="reset" value="Effacer" id="effacer">
				</fieldset>
			</form>
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

