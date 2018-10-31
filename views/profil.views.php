<?php $title = 'Page de profil' ?>
<?php include('partials/header.php'); ?>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">



<div id="main-content">
<div class="container">
 <div class="row">
 <div class="col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Profil de <?= e($user->pseudo) ?></h3></div>
    <div class="panel-body">
    <div class="row">
     <div class="col-md-5">
     <img src="<?= get_avatar_url($user->email,100) ?>" alt="Image de profil de <?= e($user->pseudo) ?>"  class="img-circle"> 
 
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
  
 </div>


<!-- /.container --> 
<?php include('partials/footer.php'); ?>

