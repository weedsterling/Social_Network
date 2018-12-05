<?php  if(relation_link_to_display($_GET['id']) == CANCEL_RELATION_LINK):?>

   <p>Demande d'amitié déja envoyée <a href="delete_friends.php?id=<?= $_GET['id']?>" class="btn btn-primary pull-right">Annuler la demande d'amitié</a></p>
   
       <?php elseif(relation_link_to_display($_GET['id']) == ACCEPT_REJECT_RELATION_LINK):?>
       <a href="accept_friend_request.php?id=<?= $_GET['id']?>" class="btn btn-primary "> Accepter</a>
<a href="delete_friends.php?id=<?= $_GET['id']?>" class="btn btn-danger ">Decliner</a>
       <?php elseif(relation_link_to_display($_GET['id']) == DELETE_RELATION_LINK):?>
       Vous etes deja ami(e)
<a href="delete_friends.php?id=<?= $_GET['id']?>" class="btn btn-primary pull-right">retirer de ma liste d'amis</a>
       
<?php elseif(relation_link_to_display($_GET['id']) == ADD_RELATION_LINK): ?>
        <a href="add_friend.php?id=<?= $_GET['id']?>" class="btn btn-primary pull-right"><i class="fas fa-plus"></i> Ajouter comme ami(e)</a>
    <?php endif ;?>