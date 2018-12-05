<?php 
session_start();

require("include/init.php");
require('filters/auth_filter.php');

if(isset($_POST['publish']))
{
	if(!empty($_POST['content']))
	{
		
	extract($_POST);
	if (mb_strlen($content) >= 3)
	{
	$q = $db->prepare('INSERT INTO microposts(content, user_id, created_at) VALUES(:content, :user_id, now() )');	
	$q->execute([
	'content' => $content,
	'user_id' => get_session('user_id')
	]);
	set_flash('Votre Statut a été mis à jour!');
	}
	else
	{
		set_flash("Veuillez entrez au moins 3   caractères SVP !!",danger);
		}
		}
		
	}
	redirect('profil.php?id='.get_session('user_id'));
	
 