<?php
require('config/database.php');
require('include/fonctions.php');
require('include/constante.php');		
if(!empty($_COOKIE['user_id']) || !empty($_COOKIE['user_id']))
{
	$_SESSION['pseudo'] = $_COOKIE['pseudo'];
	$_SESSION['user_id'] = $_COOKIE['user_id'];
	$_SESSION['url'] = $_COOKIE['url'];

}
//Récupération du nombre total de notifications non lues
 $q = $db->prepare("SELECT id FROM notifications
 WHERE subject_id = ? AND seen = '0'");

 $q->execute([get_session('user_id')]);

 $notifications_count = $q->rowCount();
auto_login();