     <?php
	 	 session_start();
		 
		require('config/database.php');
		require('include/fonctions.php');
		require('filters/auth_filter.php');
	 	require('include/constante.php');
		
		if(!empty($_GET['id']))
		{
		//recuperer les infos sur l'user en bdd en utilisant son id	
		$user = find_user_by_id($_GET['id']);
		
		if(!$user)
		{
			redirect('index.php');
		}
		} else
		
		{
			redirect('profil.php?id='.get_session('user_id'));
		}
		require('views/profil.views.php');

   