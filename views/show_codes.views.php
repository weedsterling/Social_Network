<?php $title = 'Affichage de codes sources' ?>
<?php include('partials/header.php'); ?>
<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">



<div id="main-content">
<div   id="main-content-share-code">
 <pre><?= $data->code ?> </pre>
 <div class="btn-group nav" >
 <a href="share_code.php?id=<?= $_GET['id'] ?>" class="btn btn-warning">Cloner</a> 
 <a href="share_code.php" class="btn btn-primary" >Nouveau</a>
 </div>
</div>
</div>
<!-- Placed at the end of the document so the pages load faster --> 

</script>
<script  src="assets/js/jquery.min.js" ></script>
<script  src="../bootstrap-3.3.7-dist/css/bootstrap.min.css"></script>
<script  src="libraries/parsley/parsley.min.js"></script>

</script>
