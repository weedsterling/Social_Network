
<?php if(isset($_SESSION['notification']['message'])): ?>
<div class="container">
<div  class="alert alert-<?= $_SESSION['notification']['type'] ?>">
<h4><?= $_SESSION['notification']['message']?></h4>
</div>

</div>

<?php $_SESSION = ['notification']; ?>
<?php endif; ?>

