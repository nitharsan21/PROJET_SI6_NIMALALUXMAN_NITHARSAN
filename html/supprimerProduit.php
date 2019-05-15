<?php
	session_start();
	
?>


<!DOCTYPE html5>
<html>
	<head>
		<meta charset="utf8">
		<title>Login utilisateur</title>
		<link href="../css/supprimerProduit.css" rel="stylesheet" type="text/css" media="all">
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
			
			<form action="../php/supprimerProduitList.php" method="POST">
				<div id="box">
					<label>Catégorie :</label>
					<select name = "categorie" onchange="this.form.submit()">
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
				</div>
			
			</form>
		</div>
		<div id="tableCat">
			<?php
				if($_SESSION['cat'] != null){
					try{
						$req2 = "select * from Categorie where idCat =".$_SESSION['cat'];
						$pdoreq2 = $pdo->query($req2);
						$pdoreq2->setFetchMode(PDO::FETCH_ASSOC);
						
						foreach($pdoreq2 as $ligne){
							echo "<h4 class=".'"'."title".'"'."><center><u>".$ligne['libelle']."</u></center></h4>";
						}
						
						$req1 = "select * from Produits where prd_cat =".$_SESSION['cat'];
						$pdoreq1 = $pdo->query($req1);
						$pdoreq1->setFetchMode(PDO::FETCH_ASSOC);
						
						
						
						echo "<table border=1px id=".'"'."customers".'"'.">
							<tr>
								<th>ID Produit</th>
								<th>Nom Produit</th>
								<th>Quantité</th>
								<th>Prix unitaire(en €)</th>
								<th></th>
								
							</tr>";
						foreach($pdoreq1 as $ligne){
							$_SESSION['supprimer'] = $ligne['prd_id'];
							echo "<tr><td>".$ligne['prd_id']."</td><td>"
								.$ligne['prd_nom']."</td><td>"
								.$ligne['prd_qte']."</td><td>"
								.$ligne['prd_pu']."</td><td>
								<form action=".'"'."../php/supprimerProduit.php".'"'."method=".'"'."POST".'"'." >
									<input class=".'"'."supprimer".'"'."type=".'"'."submit".'"'." value=".'"'."Supprimer".'"'." id=".'"'."reserver".'"'.">
								</form></td></tr>";
								
								
						
						
						}
						echo "</table></br>";
					
						
					}
					catch(PDOException $e){
							echo "Error :".$e->getMessage();
							die();
							
						}
					
				}
				else{
					echo "<h4>Selectionner une Catégorie pour Supprimer une Produit.</h4>";
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


