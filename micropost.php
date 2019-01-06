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
		create_micropost_for_the_current_user($content);
	set_flash('Votre Statut a été mis à jour!');
	}
	else
	{
		set_flash("Veuillez entrez au moins 3 caractères SVP !!",danger);
		}
		}
		
	}
	redirect('profil.php?id='.get_session('user_id'));
	
 