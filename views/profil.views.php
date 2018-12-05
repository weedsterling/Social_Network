<?php $title = 'Page de profil' ?>
<?php include('partials/header.php'); ?>
<div id="main-content">
<div class="container">
 <div class="row">
 <div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Profil de <?= e($user->pseudo)?> (<?= friends_count($_GET['id']) ?> ami<?=friends_count($_GET['id']) == 1 ? '':'s'?>)</h3></div>
    <div class="panel-body">
    <div class="row">
     <div class="col-md-5">
     <img src="<?= $user->url ? $user->url : get_avatar_url($user->email,100) ?>" alt="Image de profil de <?= e($user->pseudo) ?>"  class="avatar-md"> 
    </div>
    <div class="col-md-7">
    <?php if(!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')): ?>
    <?php include('partials/relation_link.php') ?>
     <?php endif ;?>
    </div>
    </div>
    <div class="row">
     <div class="col-sm-6">
     <strong><?= e($user->pseudo) ?></strong><br/>
     <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a><br/>
     <?=
	 $user->city && $user->country ?  
	 '<i class="fas fa-location-arrow"></i> &nbsp;'.e($user->city).' - '.e($user->country)  : ' '   ?><br/>
     <a href="https://www.google.com/maps?q= <?= e($user->city).' '.e($user->country) ?>" target="_blank"oooo>Voir sur google Maps</a>
    </div>
      <div class="col-sm-6">
      <?=
        $user->twitter ? '<i class="fab fa-twitter"></i>&nbsp;<a href="//twitter.com/'.e($user->twitter).' ">@'.e($user->twitter).'</a>': ''; 
        ?><br/>
        <?=
        $user->github ? '<i class="fab fa-github"></i>&nbsp;<a href="//github.com/'.e($user->github).' ">'.e($user->github).'</a>': ''; 
        ?> <br/>
        <?=
        $user->sex =='H' ? '<i class="fas fa-male"></i>' : '<i class="fas fa-female"></i>'; 
        ?> 
        <?=
        $user->available_for_hiring ? 'Disponible pour emploi ': 'Non diponible pour emploi'; 
        ?> <br/>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12 well" >
    <h4> Petite Biographie de <?= e($user->name )?> </h4>
    <p>
    <?=
	 $user->bio ? nl2br(e($user->bio )) : 'Aucune biographie pour le moment'
	?>
    </p>
    </div>
    </div>
    </div>
  </div>
  </div>
   <div class="col-md-6">
   <?php if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>
   <div class="statuts-post">
   <form action="micropost.php" method="post" data-parsley-validate  >
   <div class="form-group">
   <label for="content" class="sr-only" id="content" >Statut:</label>
   <textarea name="content" id="content" rows="3" class="form-control" placeholder="Alors quoi de neuf ?" maxlength="140" data-parsley-minlength="3"  required >
   </textarea>
   </div>
   <div class="form-group statuts-post-submit">
   <input type="submit" name="publish" value="Publier" class="btn btn-default btn btn-xs">
   </div>
   </form>
   </div>
   <?php endif; ?>
   <?php if(count($microposts) != 0): ?>
   <?php foreach( $microposts as $micropost): ?>
    <?php require('partials/microposts.php')?>
     <?php endforeach; ?>
      <?php else: ?>
      <br/>
      <p>Cet utilisateur n'a rien posté pour le moment ...</p>
      <?php endif; ?>
   </div>
 </div>
 </div>
  </div>

<!-- /.SCRIPTS --> 

<?php include('partials/footer.php'); ?>
<script src="libraries/sweetalert/sweetalert.min.js" type="text/javascript"></script>
 <script  src="assets/js/main.js" type="text/javascript"></script>
