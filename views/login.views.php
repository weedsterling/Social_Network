<?php $title = 'Connexion' ?>
<?php include('partials/header.php'); ?>


<div id="main-content">
<div class="container"  >
  <h1 class="text-center" >Connexion </h1>
  <br/> <br/>
  
 <?php 
  include('partials/error.php');
  ?>
  
  <form method="post" data-parsley-validate  class="well col-md-6 col-md-offset-3"  autocomplete="on"  >

  <!-- Pseudo or email field --> 
  <div  class="form-group" >
  <label class="Control-label" for="Identifiant">Pseudo ou email :</label>
  <input type="text" class="form-control"  id="Identifiant" value="<?= get_input('Identifiant')?>" name="Identifiant"  data-parsley-trigger='keypress' required  / >
  </div>
  
  
  
  <!-- Password field --> 
  <div  class="form-group">
  <label class="Control-label" for="Password">Mot de passe :</label>
  <input  type="password" class="form-control" id="Password"  name="Password" data-parsley-trigger = 'keypress'  required / >
  </div>
  
  
  
    <input   type="submit"  class="btn btn-primary"  value="Login" name="Login" / >

  </form>
</div>
</div>
<!-- /.container --> 
<?php include('partials/footer.php'); ?>

