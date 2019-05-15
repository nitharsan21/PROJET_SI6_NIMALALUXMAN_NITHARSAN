<?php
	session_start();
	$user = "root";
	$mdp = "";
	
	if($_POST['nom'] != null &&  $_POST['categorie'] != null){
	
		try{
			 $pdo = new PDO("mysql:host=localhost;dbname=inventaire",$user,$mdp);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			 $req = "insert into Produits(prd_nom,prd_qte,prd_pu,prd_cat) values(?,?,?,?)";
			
			 $pdoreq = $pdo->prepare($req);
			 $pdoreq->execute([$_POST['nom'],$_POST['qte'],$_POST['pu'],$_POST['categorie']]);
			 
			 $_SESSION['cat'] = $_POST['categorie'];
			 header('Location:../html/listeProduit.php');
			
		}
			
		catch(PDOException $e){
			echo "Error :".$e->getMessage();
			die();
				
		}
	}
	else{
		$_SESSION['repite'] = true;
		header('Location:../html/ajouterProduit.php');
	
	}




?>
