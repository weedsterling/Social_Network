<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME ?></a> </div>
    <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav " >
           <li><a  href="liste_utilisateurs.php">Liste des utilisateurs</a></li> 
</ul>
 <ul  class="nav navbar-nav  navbar-right">
        
    <?php if(is_logged_in()):  ?>;
 
    <li class="<?= set_active('Profile')?>">
    <a   href="profil.php?id=<?=get_session('user_id')?>"> Mon profil</a></li>
    <li class="<?= set_active('Partage')?>" ><a  href="share_code.php">Partager</a></li>
<li class="<?= set_active('Edition de profil')?>">
    <a   href="edit_user.php?id=<?=get_session('user_id')?>"> Editer mon profil	</a></li>
  <li ><a  href="logout.php">Deconnexion</a></li>
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?= get_avatar_url(get_session('email')) ?>" alt="Image de profil de <?= get_session('pseudo') ?>"  class="img-circle"> 
          </a>
          
        </li>
    <?php else: ?>
        <li class="<?= set_active('login')?>"><a   href="login.php">Connexion</a></li>
        <li class="<?= set_active('inscription')?>"><a  href="inscription.php">Inscription</a></li>
<?php endif; ?>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>
