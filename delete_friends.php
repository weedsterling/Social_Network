<?php 
 session_start();
		 
  require("include/init.php");
  require('filters/auth_filter.php');
  if(!empty($_GET['id']) && $_GET['id']!== get_session('user_id') )
  {
	$q = $db->prepare("DELETE FROM friends_relationships WHERE user_id1 = :user_id1 and user_id2 = :user_id2 OR user_id1 = :user_id2 and user_id2 = :user_id1"); 
	 $q->execute([ 
	 'user_id1'=>get_session('user_id'),
	 'user_id2'=>$_GET['id']
	 ]);
	 set_flash("Demande d'amitié annulée !");
	 redirect('profil.php?id='.$_GET['id']);
  } else
  {
	  redirect('profil.php?id='.get_session('user_id'));
  }