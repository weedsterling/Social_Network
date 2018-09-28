<?php 
session_start();

		require('filters/guest_filter.php');
require('config/database.php');
require('include/fonctions.php');
require('include/constante.php');
//Si le formulaire a ete soumis
	 if(isset($_POST['Login']))
	  {
			 //si tous les champs ont été remplis
if(not_empty(['Identifiant', 'Password'])) {
	extract($_POST);
	$q=$db->prepare("SELECT id, pseudo from users WHERE (pseudo = :Identifiant or email = :Identifiant) and password = :password and  active = '1' ");
		$q->execute([
		'Identifiant' => $Identifiant,
		'password' => sha1($Password)
		  ]);
	$userhasbeenfound = $q->rowCount();
	if($userhasbeenfound)
	{
		$user = $q->fetch(PDO::FETCH_OBJ);
			
		$_SESSION['user_id'] =$user->id;
		$_SESSION['pseudo'] =$user->pseudo;

		redirect('profil.php?id='.$user->id);
	} else
	{
		set_flash('Combinaison Identifiant/Password incorrecte !','danger');
		save_input_data();
	}
	
 }
	else {
		clear_input_data(); //S'il vient d'arriver fraichement sur la page, il n'y a aucune raison que les champs soit pre-remplis
	}

}



include("views/login.views.php"); 

   ?>