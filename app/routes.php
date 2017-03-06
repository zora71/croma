<?php

	$w_routes = array(
		['GET', '/', 'Default#index', 'default_index'],
		['GET', '/home', 'Default#home', 'default_home'],   // test du mailer

                ['GET', '/dmauth', 'Default#dmauth', 'dmauth'],
                ['GET', '/dmchannels', 'Default#dmchannels', 'dmchannels'],
                ['GET', '/dmvideos/[:id]', 'Default#dmvideos', 'dmvideos'],
                ['GET', '/dmsearch/[:search]', 'Default#dmsearch', 'dmsearch'],
                ['GET', '/dmsearch', 'Default#dmsearch', 'dmsearch_random'],

                ['GET', '/ytauth', 'Default#ytauth', 'ytauth'],
                ['GET', '/ytchannels', 'Default#ytchannels', 'ytchannels'],
                ['GET', '/ytvideos/[:id]', 'Default#ytvideos', 'ytvideos'],
                ['GET', '/ytsearch/[:search]', 'Default#ytsearch', 'ytsearch'],
                ['GET', '/ytsearch', 'Default#ytsearch', 'ytsearch_random'],

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
		//Reglage des preferences
        ['GET|POST', '/settings/', 'Default#settings', 'default_settings'],

        // Gestion administration
        //-----------------------
        // pour accès à l'administration
        //['GET', '/admin/', 'admin#index', 'admin_index'],


	);
