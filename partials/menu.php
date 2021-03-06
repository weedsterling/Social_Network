   
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME ?></a> </div>
    <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav " >
           <li><a  href="liste_utilisateurs.php">Liste des utilisateurs</a></li> 
           <li> 
            <input type="search" placeholder="Rechercher un utilisateur" id="searchbox" class="form-control">
             <div id="display-results">&nbsp;<i class="fas fa-spinner fa-spin " style="display:none" id="spinner"></i>
             </div>
            </li>
            
</ul>
 <ul  class="nav navbar-nav  navbar-right">
        
    <?php if(is_logged_in()):  ?>
	<li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <img src="<?= get_session('url') ? get_session('url') : get_avatar_url(get_session('email')) ?>" alt="Image de profil de <?= get_session('pseudo') ?>"  class="avatar-xs"> 
     </a>
    <ul class="dropdown-menu" aria-labelledby="dropdown01">
	<li class="<?= set_active('Profile')?>">
    <a   href="profil.php?id=<?=get_session('user_id')?>"> Mon profil</a></li>
        <li class="<?= set_active('change_password')?>" ><a  href="share_code.php">Partager</a></li>
    <li class="<?= set_active('Partage')?>" ><a  href="change_password.php">Modifier le mot de passe</a></li>
<li class="<?= set_active('Edition de profil')?>">
    <a   href="edit_user.php?id=<?=get_session('user_id')?>"> Editer mon profil	</a></li>
   
  <li ><a  href="logout.php">Deconnexion</a></li>
  </ul>
   <li class="<?= $notifications_count > 0 ? 'have_notifs' : '' ?>">
<a href="notifications.php"><i class="fa fa-bell"></i>
 <?= $notifications_count > 0 ? "($notifications_count)" : ''; ?>
 </a>
 </li>
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
