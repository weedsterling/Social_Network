<?php 
session_start();

		require('filters/guest_filter.php');
require('config/database.php');
require('include/fonctions.php');
require('include/constante.php');
//Si le formulaire a ete soumis
	 if(isset($_POST['Inscription']))
	  {
			 //si tous les champs ont été remplis
if(not_empty(['name', 'pseudo', 'Email', 'Password', 'Password_Confirm'])) {
 
$errors = []; // Tableau contenant un ensemble d'erreurs
extract($_POST);
if(mb_strlen($pseudo)< 3) //mb_strlen permet de compter le nombre de caractere tandis que strlen compte le nombre d'octet .
	   {
		   
		$errors[] = "Pseudo trop court! (Minimum 3 caractères)";
		
		}
		
	if(!filter_var($Email,FILTER_VALIDATE_EMAIL)) // filter_var permet de verifier si c'est une adresse email valide 
	{
		
	$errors[] = "Adresse email invalide! ";
	
	}
	if(mb_strlen($Password) < 6)
	   {
		   
		$errors[] = "Mot de passe trop court! (Minimum 6 caractères)";
		
		} else {
			if($Password != $Password_Confirm){
			$errors[] = "Les deux mots de passe ne concordent pas ";	
			}
			
			}
		if(is_already_in_use('pseudo',$pseudo,'users'))
			 {
				$errors[] = " Pseudo déja utilisé"; 
			 }
			 
			 if(is_already_in_use('Email',$Email,'users'))
			 {
				$errors[] = " Adresse e-mail déja utilisée"; 
			 }	
			 
			 if(count($errors) == 0)
			 {
				 // envoi d'un mail d'activation
				 $to = $Email;
				 $subject = '- ACTIVATION DE COMPTE';
				 $Password = sha1($Password);
				 $token = sha1($pseudo.$Email.$Password);
				 ob_start();
			 require('templates/emails/activation.tmpl.php');
			 $content = ob_get_clean();
			 
			 
			     $header = "Content-type: text/html;  \r\n";
				 $header .= "MIME-Version: 1.0 \r\n";
	
              mail ($to, $subject, $content, $header);
			  
			  // Informer l'utilisateur pour qu'il verifie sa boite de reception
set_flash("Mail d'activation envoyé !",'success');

$q=$db->prepare('INSERT INTO users (name,pseudo,email,password) values(:name,:pseudo,:email,:password)');
		$q->execute([
		'name' => $name,
		 'pseudo'=>$pseudo,
		 'email'=>$Email,
		  'password'=>$Password
		  ]);
		  
		redirect('index.php');

			 }
			 else {
				 save_input_data();
			 }
} 
	 
else {
	$errors[] = " Veuillez  SVP remplir tous les champs ! ";
	save_input_data();
	}
	  }
	else {
		clear_input_data();
	}





include("views/inscription.views.php"); 

   ?>
