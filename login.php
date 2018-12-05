<?php 
session_start();

require("include/init.php");
require('filters/guest_filter.php');

//Si le formulaire a ete soumis
	 if(isset($_POST['Login']))
	  {
			 //si tous les champs ont été remplis
if(not_empty(['Identifiant', 'Password'])) {
	extract($_POST);
	$q=$db->prepare("SELECT id, pseudo, password as hashed_password, email, url from users WHERE (pseudo = :Identifiant or email = :Identifiant) and   active = '1' ");
		$q->execute([
		'Identifiant' => $Identifiant,
		  ]);
	$user = $q->fetch(PDO::FETCH_OBJ);
	if($user && password_verify($Password, $user->hashed_password))
	{
		$_SESSION['user_id'] = $user->id;
		$_SESSION['pseudo'] = $user->pseudo;
		$_SESSION['email'] = $user->email;
		$_SESSION['url'] = $user->url;
if(isset($_POST['remenber_me']) && $_POST['remenber_me'] =='on')
{
	remenber_me($user->id);
}
		redirect_intent_or('profil.php?id='.$user->id);
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