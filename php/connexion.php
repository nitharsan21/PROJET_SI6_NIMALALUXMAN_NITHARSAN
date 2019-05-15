<?php
	session_start();
	$user = "root";
	$mdp = "";
	$connextion = False;
	
	if(isset($_POST['login'])){
		 try{
			 $pdo = new PDO("mysql:host=localhost;dbname=inventaire",$user,$mdp);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
			 $req = "Select * from USER";
			 $pdoreq = $pdo->query($req);
			 $pdoreq->setFetchMode(PDO::FETCH_ASSOC);
			
			foreach($pdoreq as $ligne){
				if($ligne['login'] == $_POST['login'] && $ligne['password'] == $_POST['mdp']){
					
					$_SESSION['id'] = $ligne['id_user'];
					$_SESSION['nom'] = $ligne['login'];
					$_SESSION['password'] = $ligne['password'];
					$connextion = True;
					
					header('Location:../html/accueil.php');
				}
				
			}
			if($connextion == False){
				header('Location:../html/Connexion.html');
			}
				
			
		}
				
		catch(PDOException $e){
			echo "Error :".$e->getMessage();
			die();
				
		}
			
		
	}
	else{
		header('Location:../html/Connexion.html');
		
	}



?>
