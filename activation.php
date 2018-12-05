<?php
session_start();

require("include/init.php");
require('filters/guest_filter.php');


//On verifie que tous les parametres requis sont presents
//si ce n'est pas le cas, l'utilisateur est redirigé vers la page d'accueil
if(!empty($_GET['p']) && is_already_in_use('pseudo' ,$_GET['p'], 'users') && !empty($_GET['token']))
{
	$pseudo = $_GET['p'];
	 $token  = $_GET['token'];
	 //Le pseudonyme et le token sont-ils valides ?
	 $q = $db->prepare('SELECT id, email, password FROM users WHERE pseudo = ?');
	 $q->execute([$pseudo]);
	 
	 $data = $q->fetch(PDO::FETCH_OBJ);
	 
	$token_verif = sha1($pseudo.$data->email.$data->password);
	//si le token est valide, nous activons le compte de l'utilisateur
	//Dans le cas contraire il est redirigé vers la page d'accueil avec un message d'erreur
	if($token == $token_verif){
		
	 $q = $db->prepare("UPDATE users SET active = '1' WHERE pseudo = ?");
	 $q->execute([$pseudo]);
	 
	 $q = $db->prepare("INSERT INTO friends_relationships(user_id1, user_id2, statuts) VALUES(?,?,?)");
	 $q->execute([$data->id, $data->id, '2']);
	 
	 set_flash('Votre compte a été bel et bien activé !');
     redirect('login.php');
	} else {
		set_flash("Paramètre Invalide",'danger');
		redirect('index.php');
	}
	}else {
			redirect('index.php');

		}