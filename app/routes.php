<?php
	
	$w_routes = array(
		['GET', '/', 'Default#index', 'default_index'], 
		['GET', '/home', 'Default#home', 'default_home'],   // test du mailer 
        
        // Gestion utilisateurs
        //---------------------
        // inscription
        ['GET|POST', '/inscription/', 'Default#inscription', 'default_inscription'],
        // connexion
        ['GET|POST', '/connexion/', 'Default#connexion', 'default_connexion'],
        // déconnexion
        ['GET|POST', '/deconnexion/', 'Default#deconnexion', 'default_deconnexion'],
		//mot de passe perdu
        ['GET|POST', '/pwdlost/', 'Default#pwdlost', 'default_pwdlost'], 
		//changer mot de passe perdu
        ['GET|POST', '/pwdNew/', 'Default#pwdNew', 'default_pwdNew'], 
		//Confirmation email
        ['GET|POST', '/emailValid/', 'Default#emailValid', 'default_emailValid'], 
        
        // Gestion administration
        //-----------------------
        // pour accès à l'administration
        //['GET', '/admin/', 'admin#index', 'admin_index'],
       
        
	);