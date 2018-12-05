<?php 
 session_start();
  require("include/init.php");
  require('filters/auth_filter.php');
  if(!empty($_GET['id']) && $_GET['id']!== get_session('user_id') )
  {
	$q = $db->prepare("UPDATE friends_relationships SET statuts ='1' WHERE user_id1 = :user_id1 and user_id2 = :user_id2 OR user_id1 = :user_id2 and user_id2 = :user_id1 "); 
	 $q->execute([ 
	 'user_id1'=>get_session('user_id'),
	 'user_id2'=>$_GET['id']
	 ]);
	 // Sauvegarde de la notification
 $q = $db->prepare('INSERT INTO notifications(subject_id, name, user_id)
 VALUES(:subject_id, :name, :user_id)');
 $q->execute([
 'subject_id' => $_GET['id'],
 'name' => 'friend_request_accepted',
 'user_id' => get_session('user_id'),
 ]);
	 set_flash("Vous etes a present ami avec cet utilisateur !");
	 redirect('profil.php?id='.$_GET['id']);
	 
  } else
  {
	  redirect('profil.php?id='.get_session('user_id'));
  }