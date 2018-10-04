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
     <img src="<?= get_avatar_url($user->email) ?>" alt="Image de profil de <?= e($user->pseudo) ?>"  class="img-circle"> 
 
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
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Completer mon Profil  </h3></div>
    <div class="panel-body">
    <?php include('partials/error.php'); ?>
     <form data-parsley-validate method="post" autocomplete="on" >
	<div class="row"> 
    <div class="col-md-6">
  <!-- Name field --> 
  <div  class="form-group" >
  <label class="Control-label" for="name" >Nom<span  class="text-danger"> *</span></label>
  <input type="text" class="form-control" required  id="name" placeholder="Nom"  value="<?= get_input('name')?: e($user->name)?>" name="name" data-parsley-trigger = 'keypress'  / >
  </div>
  </div>
  <div class="col-md-6">
  <!-- Ville field --> 
  <div  class="form-group">
  <label class="Control-label" for="ville">Ville<span  class="text-danger"> *</span></label>
  <input type="text"  class="form-control" required id="ville" value="<?=  get_input('city') ?: e($user->city) ?>"   name="ville" data-parsley-trigger = 'keypress'/ >
    </div>
    </div>
   </div>
  <!-- Pays field --> 
  <div class="row">
  <div class="col-md-6">
  <div  class="form-group">
  <label class="Control-label" for="Email">Pays<span  class="text-danger"> *</span></label>
  <input  type="text" class="form-control" id="pays" required value="<?=  get_input('country') ?: e($user->country) ?>"  name="pays" data-parsley-trigger = 'keypress'  / >
  </div>
  </div>
  <!-- Sexe field --> 
  <div class="col-md-6">
  <div  class="form-group">
  <label  for="sexe">Sexe<span  class="text-danger"> *</span></label>
  <select   name="sexe" class="form-control" id="sexe"  name="sexe" required   / >
  <option value="H" <?= $user->sex == 'H'? 'selected' :'' ?>>
  Homme
  </option>
    <option value="F" <?= $user->sex == 'F'? 'selected' :'' ?>>
  Femme
  </option>
  </select>
    </div>
   </div>
   </div>
  <!-- Twitter field --> 
  <div class="row">
  <div class="col-md-6">
  <div  class="form-group">
  <label class="Control-label" for="Twitter">Twitter</label>
  <input  type="text" class="form-control" id="Twitter" required  name="twitter"  value="<?= get_input('twitter') ?: e($user->twitter) ?>"    / >
  </div>
  </div>
  <!-- Github field --> 
    <div class="col-md-6">
  <div  class="form-group">
  <label class="Control-label" for="Github">Github</label>
  <input  type="text" class="form-control" id="Github" required  name="github"  value="<?= get_input('github') ?: e($user->github) ?>" / >
  </div>
  </div>
  </div>
  <!-- Disponible pour emploi field --> 
  <div class="row">
  <div class="col-md-12">
  <div  class="form-group">
   <label  for="available_for_hiring">
  <input  type="checkbox"  id="available_for_hiring" required  name="available_for_hiring" <?= $user->available_for_hiring == '1'? 'checked' :'' ?>  / >
 Disponible pour emploi ?
 </label>
  
  </div>
  </div>
  </div>
  <!-- Biographie field --> 
  <div class="row">
  <div class="col-md-12">
   <div  class="form-group">
   <label  for="bio">Biographie<span  class="text-danger"> *</span></label>
   <textarea name="bio"  id="bio" cols="30" rows="10" class="form-control" placeholder="Je suis un ammoureux de la programmation" ><?= e($user->bio) ?> </textarea>
   </div>
  </div>
  </div>
  <input   type="submit"  class="btn btn-primary"  value="Valider" name="update" / >
      </form>
            
    </div>
  </div>
  </div>
 
</div>


<!-- /.container --> 
<?php include('partials/footer.php'); ?>

