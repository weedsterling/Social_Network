     <?php
	 	 session_start();
		 
		require("include/init.php");
		require('filters/auth_filter.php');
		
		if(!empty($_GET['id']))
		{
		//recuperer les infos sur l'user en bdd en utilisant son id	
		$user = find_user_by_id($_GET['id']);
		
		if(!$user)
		{
			redirect('index.php');
		}
		else 
		{
			$q = $db->prepare('SELECT id,content,like_count, created_at FROM microposts WHERE user_id = :user_id ORDER BY created_at DESC');
			$q->execute([ 
			'user_id' => $_GET['id']
			]);
			$microposts = $q->fetchAll( PDO::FETCH_OBJ);
			
		}
		} else
		
		{
			redirect('profil.php?id='.get_session('user_id'));
		}
		require('views/profil.views.php');

   