<?php 
session_start();
//Supprimer l'entree en bdd au niveau de auth_tokens
require "config/database.php";
$q = $db->prepare('DELETE FROM auth_tokens where user_id = ?');
$q->execute([$_SESSION['user_id']]);
//supprimer les cookies et detruire la session
setcookie('auth', '', time()-36000);
session_destroy();
$_SESSION = [];
//redirection
header('location: login.php');