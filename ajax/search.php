<?php
session_start();
require '../config/database.php';
require '../include/fonctions.php'; 

extract($_POST);

$q = $db->prepare('SELECT id,pseudo,name, email, url FROM users WHERE (name LIKE :query OR pseudo LIKE :query OR email LIKE :query) LIMIT 5');

$q->execute([
'query' => '%'.$query.'%'
]);

$users = $q->fetchAll(PDO::FETCH_OBJ);
if(count($users) > 0){
	
foreach($users as $user)
{
	?>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">

     <div class="display-box-user">
     <a href="profil.php?id=<?= $user->id ?>">
     <img  src="<?= $user->url ? $user->url : get_avatar_url($user->email,100) ?>" alt="<?= e($user->pseudo)?>" class="img-circle" width="25">&nbsp;<?= e($user->name )?>
      <br><?= e($user->email )?>
       </a>
</div>
             <?php
}
} else
{
	echo '<div class="display-box-user">Aucun utilisateur trouve</div>';
}
?>