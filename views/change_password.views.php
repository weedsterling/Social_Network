<?php $title = 'Changement de mot de passe' ?>
<?php include('partials/header.php'); ?>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">

<div id="main-content">
<div class="container">
 <div class="row">
<div class="col-md-6 col-md-offset-3" >
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Changer Mon mot de passe  </h3></div>
    <div class="panel-body">
    <?php include('partials/error.php'); ?>
     <form  data-parsley-validate method="post" autocomplete="on"  >
	 
      <div  class="form-group" >
  <label class="Control-label" for="current_password" >Mot de passe Actuel<span  class="text-danger">*</span></label>
  <input  type="password" class="form-control" required  id="current_password" name="current_password"  data-parsley-trigger = 'keypress'  / >
  </div>
  <div  class="form-group" >
  <label class="Control-label" for="new_password" > Nouveau Mot de passe<span  class="text-danger">*</span></label>
  <input  type="password" class="form-control" required  id="new_password" name="new_password" data-parsley-minlength='6' data-parsley-trigger = 'keypress'  / >
  </div>
  <div  class="form-group" >
  <label class="Control-label" for="new_password_confirmation" > Confirmer votre nouveau Mot de passe<span  class="text-danger">*</span></label>
  <input  type="password" class="form-control" required  id="new_password_confirmation" name="new_password_confirmation" data-parsley-equalto='#new_password' data-parsley-trigger = 'keypress'  / >
  </div>
  
  <input  type="submit"  class="btn btn-primary"  value="Valider" name="change_password" / >
      </form>
            
    </div>
  </div>
  </div>
	</div>
  </div>
  </div>

<?php include('partials/footer.php'); ?>
