<?php 
session_start();

require("include/init.php");
require('filters/auth_filter.php');


if(!empty($_GET['id'])) {
	 	  $data = find_code_by_id($_GET['id']);

	  if(!$data) {
$code = "";
	  }
	  else {
	 $code = $data->code;

	}
} else {
	 $code = "";

	}




//Si le formulaire a ete soumis
	 if(isset($_POST['save']))
	  {
			 //si tous les champs ont été remplis
if(not_empty(['code'])) {
	
 extract($_POST);
 
 $q=$db->prepare('INSERT INTO codes (code) VALUES(?)');
 $success = $q->execute([$code]);
 if($success)
 {
 //Affichage du code source
 $id = $db->lastInsertId();
 $fullURL = WEBSITE_URL.'/show_codes.php?id='.$id;
 create_micropost_for_the_current_user('Je viens de publier un nouveau code source : '.$fullURL);
 redirect('show_codes.php?id='.$id);
 }
	 else
	{ 
set_flash("Erreur lors de l'affichage du code source. veuillez réessayez svp");
redirect('share_code.php');
 }
 }
 else
 {
	 redirect('share_code.php');
 }
 
 }
 
 
 

include("views/share_code.views.php");
   ?>