<?php
	
	$w_routes = array(
		['GET', '/', 'Default#index', 'default_index'],
        
        // Gestion utilisateurs
        //---------------------
        // inscription
        ['GET|POST', '/inscription/', 'Default#inscription', 'default_inscription'],
        // connexion
        ['GET|POST', '/connexion/', 'Default#connexion', 'default_connexion'],
        // déconnexion
        ['GET|POST', '/deconnexion/', 'Default#deconnexion', 'default_deconnexion'], 
        
        // Gestion administration
        //-----------------------
        // pour accès à l'administration
        //['GET', '/admin/', 'admin#index', 'admin_index'],
       
        
	);