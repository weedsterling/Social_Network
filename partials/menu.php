<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME ?></a> </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="<?= set_active('index')?>"><a  href="index.php">Accueil</a></li> 
    <?php if(is_logged_in()):  ?>;
    <li class="<?= set_active('Profile')?>">
    <a   href="profil.php?id=<?=get_session('user_id')?>"> Mon profil</a></li>
    <li class="<?= set_active('Partage')?>" ><a  href="share_code.php">Partager</a></li>

            <li ><a  href="logout.php">Deconnexion</a></li>

    <?php else: ?>
        <li class="<?= set_active('login')?>"><a   href="login.php">Connexion</a></li>
        <li class="<?= set_active('inscription')?>"><a  href="inscription.php">Inscription</a></li>
<?php endif; ?>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>
