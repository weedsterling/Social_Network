<?php $title = 'Liste des utilisateurs' ?>
<?php include('partials/header.php'); ?>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">





<div id="main-content">
<div class="container">
 <h1> Liste des utilisateurs</h1>
  <?php foreach(array_chunk ($users, 4) as $user_set):?>

 <div  class="row users">
 <?php foreach ($user_set as $user):?>
 <div class=" col-md-3 user-block">
 <a href="profil.php?id<?= $user->
 id ?>">
 <img src="<?= get_avatar_url($user->email,70) ?>" alt="Image de profil de <?= e($user->pseudo) ?>"  class=" avatar img-circle"> 

 </a>
  <h4 class="user-block-username"></h4>

  <a href="profil.php?id <?= $user->id ?>">
 
  <?= e($user->pseudo) ?>
  </a>
 </div>
 <?php endforeach ;?>
 </div>
  <?php endforeach ;?>

			<div id="pagination"><?= $pagination?></div>

  </div>
  
 </div>


<!-- /.container --> 
<?php include('partials/footer.php'); ?>

