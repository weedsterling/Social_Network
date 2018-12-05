<?php 
 session_start();
		 
		 require("include/init.php");
		require('filters/auth_filter.php');
		

//Si le formulaire a ete soumis
	 if(isset($_POST['change_password']))
	  {

		  $errors = [];
			 //si tous les champs ont été remplis
if(not_empty(['current_password', 'new_password', 'new_password_confirmation'])) {
	extract($_POST);
	
	if(mb_strlen($new_password) < 6)
	   {
		$errors[] = "Mot de passe trop court! (Minimum 6 caractères)";
		
		} 
		else {
			if($new_password != $new_password_confirmation){
			$errors[] = "Les deux mots de passe ne concordent pas ";	
			}
			
			}
			if(count($errors) == 0)
			 {
		$q=$db->prepare("SELECT password as hashed_password from users WHERE (id = :id ) and   active = '1' ");
		$q->execute([
		'id' => get_session('user_id')
		  ]);
	$user = $q->fetch(PDO::FETCH_OBJ);
	if($user && password_verify($current_password, $user->hashed_password))
	{	 
		$q= $db->prepare("UPDATE users SET password = :password  WHERE id = :id ");
		$q->execute([
		 'password' => password_hash($new_password, PASSWORD_BCRYPT),
		 'id' => get_session('user_id'),
		  ]);
		  
	set_flash(" Felicitations votre mot de passe a été mis a jour ");
	redirect('profil.php?id='. get_session('user_id'));
	 } 
 
 else {
 	 save_input_data();
	 $errors[] = "Le mot de passe actuel indiqué est incorrect .";
	 }
  } 
}
else {
 	 save_input_data();
	 $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
	 }
	 }
       else {
		clear_input_data(); //S'il vient d'arriver fraichement sur la page, il n'y a aucune raison que les champs soit pre-remplis
	}
	 	require('views/change_password.views.php');
		