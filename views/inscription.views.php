<?php $title = 'Inscription' ?>
<?php include('partials/header.php'); ?>


<div id="main-content">
<div class="container"  >
  <h1 class="text-center" >Devenez à present menbre </h1>
  <br/> <br/>
  
 <?php 
  include('partials/error.php');
  ?>
  
  <form method="post" data-parsley-validate  class="well col-md-6 col-md-offset-3"  autocomplete="on"  >

  <!-- Name field --> 
  <div  class="form-group" >
  <label class="Control-label" for="name">Nom :</label>
  <input type="text" class="form-control" required id="name" value="<?= get_input('name')?>" name="name" data-parsley-trigger = 'keypress'  / >
  </div>
  
  <!-- Pseudo field --> 
  <div  class="form-group">
  <label class="Control-label" for="pseudo">Pseudo :</label>
  <input type="text"  class="form-control" id="pseudo" value="<?= get_input('pseudo')?>"  name="pseudo" data-parsley-trigger = 'keypress'required / >
    </div>
  
  <!-- Email field --> 
  <div  class="form-group">
  <label class="Control-label" for="Email">Adresse email :</label>
  <input  type="email" class="form-control" id="Email" value="<?= get_input('Email')?>" name="Email" data-parsley-trigger = 'keypress' required / >
  </div>
  
  <!-- Password field --> 
  <div  class="form-group">
  <label class="Control-label" for="Password">Mot de passe :</label>
  <input  type="password" class="form-control" id="Password"  name="Password"  required / >
  </div>
  
  <!-- Password confirmation field --> 
  <div  class="form-group">
  <label class="Control-label" for="Password_Confirm">Confirmer Votre Mot de passe :</label>
  <input  type="password" class="form-control" id="Password_Confirm"  name="Password_Confirm"  required data-parsley-equalto ="#password" / >
  </div>
  
    <input   type="submit"  class="btn btn-primary"  value="Inscription" name="Inscription" / >

  </form>
</div>
</div>
<!-- /.container --> 
<?php include('partials/footer.php'); ?>

