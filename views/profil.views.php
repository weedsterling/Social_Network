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
     <div class="col-md-6">
     <strong<?= e($user->pseudo) ?></strong><br>
     <a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a>
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
  <label class="Control-label" for="name">Nom<span  class="text-danger">*</span></label>
  <input type="text" class="form-control"  id="name" placeholder="Nom" value="<?= get_input('name')?>" name="name" data-parsley-trigger = 'keypress'  / >
  </div>
  </div>
  <div class="col-md-6">
  <!-- Ville field --> 
  <div  class="form-group">
  <label class="Control-label" for="ville">Ville<span  class="text-danger">*</span></label>
  <input type="text"  class="form-control" id="ville" value="<?= get_input('pseudo')?>"  name="ville" data-parsley-trigger = 'keypress'/ >
    </div>
    </div>
   </div>
  <!-- Pays field --> 
  <div class="row">
  <div class="col-md-6">
  <div  class="form-group">
  <label class="Control-label" for="Email">Pays<span  class="text-danger">*</span></label>
  <input  type="text" class="form-control" id="pays" value="<?= get_input('Email')?>" name="pays" data-parsley-trigger = 'keypress'  / >
  </div>
  </div>
  <!-- Sexe field --> 
  <div class="col-md-6">
  <div  class="form-group">
  <label  for="sexe">Sexe<span  class="text-danger">*</span></label>
  <select   name="sexe" class="form-control" id="sexe"  name="sexe"   / >
  <option value="H">
  Homme
  </option>
    <option value="F">
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
  <input  type="text" class="form-control" id="Twitter"  name="twitter"    / >
  </div>
  </div>
  <!-- Github field --> 
    <div class="col-md-6">
  <div  class="form-group">
  <label class="Control-label" for="Github">Github</label>
  <input  type="text" class="form-control" id="Github"  name="github"   / >
  </div>
  </div>
  </div>
  <!-- Disponible pour emploi field --> 
  <div class="row">
  <div class="col-md-12">
  <div  class="form-group">
   <label  for="available_for_hiring">
  <input  type="checkbox"  id="available_for_hiring"  name="available_for_hiring"   / >
 Disponible pour emploi ?
 </label>
  
  </div>
  </div>
  </div>
  <!-- Biographie field --> 
  <div class="row">
  <div class="col-md-12">
   <div  class="form-group">
   <label  for="bio">Biographie<span  class="text-danger">*</span></label>
   <textarea name="bio"  id="bio" cols="30" rows="10" class="form-control" placeholder="Je suis un ammoureux de la programmation"></textarea>
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

