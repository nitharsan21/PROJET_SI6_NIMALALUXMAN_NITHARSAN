<?php
	session_start();
	$user = "root";
	$mdp = "";
	
	if($_POST['cat'] != null){
	
		try{
			 $pdo = new PDO("mysql:host=localhost;dbname=inventaire",$user,$mdp);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			 $req = "insert into Categorie(libelle) values(?)";
			
			 $pdoreq = $pdo->prepare($req);
			 $pdoreq->execute([$_POST['cat']]);
			 
			 header('Location:../html/ajouterCat.php');
			
		}
			
		catch(PDOException $e){
			echo "Error :".$e->getMessage();
			die();
				
		}
	}
	else{
		$_SESSION['repite'] = true;
		header('Location:../html/ajouterCat.php');
	
	}




?>
