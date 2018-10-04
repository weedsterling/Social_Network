<?php $title = 'Partage de codes sources' ?>
<?php include('partials/header.php'); ?>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">



<div id="main-content">
<div   id="main-content-share-code">
  <form  method="post" autocomplete="off">
  <textarea name="code" id="code" placeholder="Entrez votre code source ici"  required> <?= $code ?> </textarea>
  <div class="btn-group nav">
  <a    href="share_code.php" class="btn btn-danger" >Tout Effacer </a>
  <input type="submit" class="btn btn-success  " name="save" value="Enregistrer">
  </div>
  </form>
</div>
</div>

</script>
<script  src="assets/js/jquery.min.js" ></script>
<script  src="../bootstrap-3.3.7-dist/css/bootstrap.min.css"></script>
<script  src="libraries/parsley/parsley.min.js"></script>
<script src="assets/js/tabby.js" ></script>
<script> 
$("#code").tabby();
$("#code").height($(window).height() - 50)
</script>
</script>
