<?php $title = 'Edition de profil' ?>
<?php include('partials/header.php'); ?>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">

<div id="main-content">
<div class="container">
 <div class="row">
	 <?php if(!empty($_GET['id']) && ($_GET['id']) === get_session('user_id') ): ?>
<div class="col-md-6 col-md-offset-3" >
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Completer mon Profil  </h3></div>
    <div class="panel-body">
    <?php include('partials/error.php'); ?>
     <form  data-parsley-validate method="post" autocomplete="on" enctype="multipart/form-data" >
	<div class="row"> 
    <div class="col-md-6">
  <!-- Name field --> 
  <div  class="form-group" >
  <label class="Control-label" for="name" >Nom<span  class="text-danger">*</span></label>
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

   <div class="row"> 
    <div class="col-md-12">
<!-- Avatar field --> 
<label  for="avatar">Changer Mon avatar</label>
 <input type="file" name="photo" value="<?=  get_input('photo') ?: e($user->photo) ?>" required />
     </div>
   </div>
   <br/>
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
  <input  type="checkbox"  id="available_for_hiring"  name="available_for_hiring" <?= $user->available_for_hiring == '1'? 'checked' :'' ?>  / >
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
   <textarea name="bio"  id="bio" cols="30" rows="10" class="form-control" placeholder="Veuillez renseigner votre bio ici" ><?= e($user->bio) ?> </textarea>
   </div>
  </div>
  </div>
  <input   type="submit"  class="btn btn-primary"  value="Valider" name="update" / >
      </form>
            
    </div>
  </div>
  </div>
 <?php endif; ?>
	</div>
  </div>
  </div>

<?php include('partials/footer.php'); ?>
