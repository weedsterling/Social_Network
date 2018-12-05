<article  class="media statuts-media" id="micropost<?= $micropost->id ?>" >
     <div class="pull-left">
     <img src="<?= $user->url ? $user->url : get_avatar_url($user->email,100) ?>" alt="Image de profil de <?= e($user->pseudo) ?>"  class="avatar-xs"> 
     </div>
     
     <div  class="media-body">
     <h4  class="media-heading"> <?= e($user->pseudo) ?></h4>
     <p><i class="far fa-clock"> </i> <time class="timeago" datetime="<?= $micropost->created_at ?>"><?= $micropost->created_at ?></time>
<a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce micropost ?')"  href="delete_micropost.php?id=<?= $micropost->id ?>">
  <i class="fa fa-trash"></i> Supprimer
 </a>  </p>
     <?= nl2br(replace_links(e($micropost->content))) ?>
     <hr>
     <p>
     <?php if(user_has_already_liked_the_micropost($micropost->id)):?>
     <a class="like" href="unlike_micropost.php?id=<?= $micropost->id ?>">Je n'aime plus </a>
     <?php else: ?>
     <a class="like" href="like_micropost.php?id=<?= $micropost->id ?>">J'aime </a>
	 <?php endif; ?>

     </p>
     Nombre de j'aimes (<?= $micropost->like_count ?>)
     </div>
     </article>