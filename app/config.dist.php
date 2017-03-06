<?php

$w_config = [
   	//information de connexion à la bdd
	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
    'db_user' => 'root',							//nom d'utilisateur pour la bdd
    'db_pass' => '',								//mot de passe de la bdd
    'db_name' => '',								//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'users',				//nom de la table contenant les infos des utilisateurs
	'security_id_property' => 'id',					//nom de la colonne pour la clef primaire
	'security_username_property' => 'username',		//nom de la colonne pour le "pseudo"
	'security_email_property' => 'email',			//nom de la colonne pour l'"email"
	'security_password_property' => 'password',		//nom de la colonne pour le "mot de passe"
	'security_role_property' => 'role',				//nom de la colonne pour le "role"

	'security_login_route_name' => 'login',			//nom de la route affichant le formulaire de connexion

	'php_mailer_email' => 'noreply@vodin.ovh',
	'php_mailer_password' => '7HKrfUxfWwMqdv38',
	'php_mailer_port' => 465,
	'php_mailer_host' => 'SSL0.OVH.NET'


    //api keys vodin.ovh
    'dailymotion_api_key' => '19180670c2b0be2f4155',
    'dailymotion_api_secret' => '46be83e9953dd8436d0ab3459d670098eccef889',
    'youtube_api_key' => '764391474974-3a75lbqo1sieahfae0m9uvqdvqcpp3dl.apps.googleusercontent.com',
    'youtube_api_secret' => 'QCDJqOe4ciOX9Zwua9NQzGsc',
    'twitch_api_key' => 'tz8r58kqlo410037myjw641zdawprw',
    'twitch_api_secret' => 'q5sclloht7fwgd4ysclb1twz984a0y',


    //api keys localhost
    'dailymotion_api_key' => 'e16c74f9cbdf3bb326af',
    'dailymotion_api_secret' => 'a2da41393c7c7d745c9d688a88ee6a60756fee6f',
    'youtube_api_key' => '857685741489-90clnepl9etsuvv06pao3v2i84qb904k.apps.googleusercontent.com',
    'youtube_api_secret' => 'vlZUbCJ5-yL-RY8BY1x0c0Sk',
    'twitch_api_key' => '',
    'twitch_api_secret' => '',

	// configuration globale
	'site_name'	=> '', 								// contiendra le nom du site
];

require('routes.php');

