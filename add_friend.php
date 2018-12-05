<?php 
 session_start();
		 
  require("include/init.php");
  require('filters/auth_filter.php');
  if(!empty($_GET['id']) && $_GET['id']!== get_session('user_id') )
  {
	if(!if_a_friend_request_has_already_sent(get_session('user_id'),$_GET['id']))
  {
	$q = $db->prepare('INSERT INTO friends_relationships (user_id1 ,user_id2) VALUES (?,?)'); 
	 $q->execute([ 
	 get_session('user_id'),$_GET['id']
	 ]);
	 // Sauvegarde de la notification
 $q = $db->prepare('INSERT INTO notifications(subject_id, name, user_id)
 VALUES(:subject_id, :name, :user_id)');
 $q->execute([
 'subject_id' => $_GET['id'],
 'name' => 'friend_request_sent',
 'user_id' => get_session('user_id'),
 ]);
	 set_flash("Votre demande d'amitié a été envoyé avec succès !");
	 redirect('profil.php?id='.$_GET['id']);  
  }
  else
  {
	set_flash("Cet utilisteur vous a deja envoyé une demande d'amitié !");
	 redirect('profil.php?id='.$_GET['id']);  
  }
  } else
  {
	  redirect('profil.php?id='.get_session('user_id'));
  }
  