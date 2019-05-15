<?php
	session_start();
	$user = "root";
	$mdp = "";
	
	if($_SESSION['supprimer'] != null){ 
		
		try{
			$pdo = new PDO("mysql:host=localhost;dbname=inventaire",$user,$mdp);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req = "delete from Produits where prd_id =".$_SESSION['supprimer'];
			$pdoreq = $pdo->query($req);
			$pdoreq->setFetchMode(PDO::FETCH_ASSOC);

			header('Location:../html/supprimerProduit.php');
		}
		catch(PDOException $e){
			echo "Error :".$e->getMessage();
			die();
			
		}
	}
	else{
		 header('Location:../html/supprimerProduit.php');
	 }
	



?>
