<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel;
use \Model\Cookie;
use \W\Security\AuthentificationModel;
use \Model\Mailer;


use \Model\DailymotionApi;
use \Model\YoutubeApi;
use \Model\TwitchApi;
use \Model\Channel;
use \Model\Video;

class DefaultController extends Controller{

	protected $uuid;
	protected $currentUser;
	protected $auth;
	protected $mail;

	public function __construct() {
		$this->currentUser = new UsersModel;
		$this->auth = new AuthentificationModel;
		$this->mail = new Mailer;
	}

//	public function home() {
//		$mail = new Mailer;
//		print_r($mail->send('zora.amar71@gmail.com', 'test', 'test'));
//	}

        /***************/
        /* Dailymotion */
        /***************/
	public function dmauth() {
		$dm = new DailymotionApi();
		$dm->connect();
	}

	public function dmchannels() {
		$dm = new DailymotionApi();
		$channels = $dm->getChannels();
		foreach ($channels as $key => $channel) {
			echo '<a href="'.$this->generateUrl('dmvideos', [ 'id' => $channel->getUuid() ]).'">'.$channel->getTitle().'</a>';
                }
        }

	public function dmvideos($id) {
		$dm = new DailymotionApi();
		$videos = $dm->getChannelVideos($id);
		if ($videos)
		foreach ($videos as $key => $video) {
			echo '<img src="'.$video->getThumbnail().'"><br>';
		}
	}

	public function dmsearch($search = null) {
		$dm = new DailymotionApi();
		$videos = $dm->search($search);
		if ($videos)
		foreach ($videos as $key => $video) {
			echo '<img src="'.$video->getThumbnail().'">'.$video->getTitle().'<br>';
		}
		else echo 'no results';
	}

        /***************/
        /*   Youtube   */
        /***************/
	public function ytauth() {
		$yt = new YoutubeApi();
		$yt->connect();
	}

	public function ytchannels() {
		$yt = new YoutubeApi();
		$channels = $yt->getChannels();
		foreach ($channels as $key => $channel) {
			echo '<a href="'.$this->generateUrl('ytvideos', [ 'id' => $channel->getUuid() ]).'">'.$channel->getTitle().'</a><br>';
		}

	}

	public function ytvideos($id) {
		$yt = new YoutubeApi();
		$videos = $yt->getChannelVideos($id);
		if ($videos)
		foreach ($videos as $key => $video) {
			echo '<img src="'.$video->getThumbnail().'"><br>';
		}
	}

	public function ytsearch($search = null) {
		$yt = new YoutubeApi();
		$videos = $yt->search($search);
		if ($videos)
		foreach ($videos as $key => $video) {
			echo '<img src="'.$video->getThumbnail().'">'.$video->getTitle().'<br>';
		}
		else echo 'no results';
	}

        /***************/
        /*   Twitch    */
        /***************/
	public function twauth() {
		$tw = new TwitchApi();
		$tw->connect();
	}

	public function twchannels() {
		$tw = new TwitchApi();
		$channels = $tw->getChannels();
		foreach ($channels as $key => $channel) {
			echo '<a href="'.$this->generateUrl('twvideos', [ 'id' => $channel->getUuid() ]).'">'.$channel->getTitle().'</a><br>';
		}

	}

	public function twvideos($id) {
		$tw = new TwitchApi();
		$videos = $tw->getChannelVideos($id);
		if ($videos)
		foreach ($videos as $key => $video) {
			echo '<img src="'.$video->getThumbnail().'"><br>';
		}
	}

	public function twsearch($search = null) {
		$tw = new TwitchApi();
		$videos = $tw->search($search);
		if ($videos)
		foreach ($videos as $key => $video) {
			echo '<img src="'.$video->getThumbnail().'">'.$video->getTitle().'<br>';
		}
		else echo 'no results';
	}

	// fonction generer uuid
	private function gen_uuid() {
		$uuid = array(
            'time_low'  => 0,
			'time_mid'  => 0,
			'time_hi'  => 0,
			'clock_seq_hi' => 0,
			'clock_seq_low' => 0,
			'node'   => array()
		);

		$uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
		$uuid['time_mid'] = mt_rand(0, 0xffff);
		$uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
		$uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
		$uuid['clock_seq_low'] = mt_rand(0, 255);

		for ($i = 0; $i < 6; $i++) {
			$uuid['node'][$i] = mt_rand(0, 255);
		}

		$uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
						$uuid['time_low'],
						$uuid['time_mid'],
						$uuid['time_hi'],
						$uuid['clock_seq_hi'],
						$uuid['clock_seq_low'],
						$uuid['node'][0],
						$uuid['node'][1],
						$uuid['node'][2],
						$uuid['node'][3],
						$uuid['node'][4],
						$uuid['node'][5]
					   );
		return $uuid;
	}

    // page d'accueil (index)
	public function index() {

		// var_dump($_COOKIE);
		// var_dump($_SESSION);

		$invalidUuid = false;

		// vérif existence cookie
		if (Cookie::has('uuid')) {
			//... cookie existant, on le récupère
			$uuid = Cookie::get('uuid');

			// vérif existence Uuid en BDD
			if ($user = $this->currentUser->findByUuid($uuid)){
				//... Uuid existante, on le récupère
				$_SESSION['uuid'] = $user['uuid'];
				if (!$user['emailValid']) $this->auth->logUserIn($user);

			}else{
				//... Uuid NON existant (expirée) en BDD... générer Uuid en BDD
				$invalidUuid = true;
			}
		} else {
			//... cookie NON existant, donc uuid n'existe en BDD... générer Uuid en BDD
			$invalidUuid = true;
		}

		if ($invalidUuid) {
            //... générer Uuid en BDD
            // génération Cookie
			$newUuid = $this->gen_uuid();
			Cookie::set('uuid', $newUuid);

			// pseudo et email (clé unique en BDD), on est obligé de les renseigner
            // emailValid chargé à vrai (utilisateur non inscrit, email non valider)
			$this->currentUser->insert(array('uuid'=>$newUuid, 'pseudo'=>$newUuid, 'email'=>$newUuid));
			// mise en session
			$_SESSION['uuid'] = $newUuid;

		}

		$this->show('default/index');
	}

	// formulaire d'inscription
	public function inscription() {

		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->show('default/inscription');
		} else {
			// hashage du mot de passe
			$_POST['password'] = $this->auth->hashPassword($_POST['password']);
			if ($user = $this->currentUser->findByUuid($_SESSION['uuid'])) {
				$_POST['lastConnexion']= date('Y-m-d H:i:s');
				$_POST['createDate']= date('Y-m-d H:i:s');
				$_POST['emailToken']= md5($user['email'].date('Ymd')); // email + date jour codée en MD5
				// Envoi mail pour confirmation d'inscription
				// chargement adresse HOST
				$link = "http://".$_SERVER['SERVER_NAME']."/croma/public/emailValid/?token=".$_POST['emailToken'];

				// envoyer le "token" par mail au client
				$to = $_POST['email']; // destinataire
				$subject = utf8_decode('vodin -  Confirmation inscription');	// sujet du mail
				$body = '<h1>Bonjour</h1>
						<p>Confirmez votre adresse mail afin de validez votre inscription.</p>
						<a href="'.$link.'">Validation inscription</a>
						<br/>
						<p>Si vous n\'êtes pas à l\'origine de ce mail, veuillez le signaler à notre service client.</p>
						<br/>
						<p> Ceci est un mail automatique, veuillez ne pas répondre. Merci.</p>
						<br/>
						<p>L\'équipe Vodin</p>';
				$this->mail->send($to, $subject, $body);
				// mettre à jour utilisateur (BDD) avec le token généré
				$newUser = $this->currentUser->update($_POST, $user['id']);
				if ($newUser) {
					$this->auth->logUserIn($newUser);
				}
			}
		}
		$this->redirectToRoute('default_index');
	}

	// formulaire de connexion
	public function connexion() {

		$app = getApp(); // récup. variable globale instance de l'application (getApp ds W\view\globals.php)

		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$user = $this->auth->isValidLoginInfo($_POST['usernameOrEmail'], $_POST['pwd']);
            // vérif existence pseudo ou email en BDD
			if ($user) {
				//... pseudo ou email existant, on le récupère
				$currentUser = $this->currentUser->find($user);

				$this->auth->logUserIn($currentUser); // récup. info utilisateur pr stockage $_SESSION
				Cookie::set('uuid', $currentUser['uuid']);

                // ajout date dernière connexion, et date de creation sur Uuid

				$this->currentUser->update(array('lastConnexion'=>date('Y-m-d H:i:s')), $currentUser['id']) ;


                // suppression Uuid (en BDD) généré automatiquement à l'accès
                $oldUuid = $_SESSION['uuid'];
				$oldUser = $this->currentUser->deleteByUuid($oldUuid);

                // redirection sur page d'accueil (index)
				$_SESSION['uuid'] = $currentUser['uuid'];
				$this->redirectToRoute('default_index');
			} else {
				//... pseudo ou email NON existant, redirection page login
				$_SESSION['error']='Mot de passe, pseudo ou email incorrect';
				$this->redirectToRoute('default_index');
			}

		}
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$loginRoute = $app->getConfig('security_login_route_name');
			$this->show('default/connexion', ['loginRoute' => $loginRoute]);
		}
	}

	// formulaire de déconnexion
	public function deconnexion() {
		$this->auth->logUserOut();
        // suppression COOKIE et SESSION
		Cookie::del('uuid');
		unset($_SESSION['uuid']);
        // redirection page d'accueil (index)
		$this->redirectToRoute('default_index');

	}
	//Fonction pwdLost() mot de passe perdu
	public function pwdLost() {
		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Récupère un utilisateur en fonction de son email ou de son pseudo
			$user = $this->currentUser->getUserByUsernameOrEmail($_POST['usernameOrEmail']);

			// si utilisateur trouvé, on exécute la suite...
			if ($user <> false) {

				// générer un "token"
				$pwdToken = md5($user['email'].date('Ymd')); // email + date jour codée en MD5

				// chargement adresse HOST
				$link = "http://".$_SERVER['SERVER_NAME']."/croma/public/pwdNew/?token=".$pwdToken;

				// envoyer le "token" par mail au client
				$to = $user['email']; // destinataire
				$subject = utf8_decode('vodin -  Récupération mot de passe');	// sujet du mail
				$body = '<h1>Bonjour</h1>
						<p>Vous avez signalé votre mot de passe comme oublié.
						Veuillez cliquer sur le lien suivant pour le réinitialiser.</p>
						<a href="'.$link.'">Réinitialiser votre mot de passe</a>
						<br/>
						<p>Si vous n\'êtes pas à l\'origine de ce mail, veuillez le signaler à notre service client.</p>
						<br/>
						<p> Ceci est un mail automatique, veuillez ne pas répondre. Merci.</p>
						<br/>
						<p>L\'équipe Vodin</p>';
				$this->mail->send($to, $subject, $body);
				// mettre à jour utilisateur (BDD) avec le token généré
				$this->currentUser->update(array('pwdToken'=>$pwdToken), $user['id']);
				// redirection page d'accueil (index)
				$this->redirectToRoute('default_index');
			} else {
				echo  "Votre email est invalide... Réessayer";
				// si erreur, on refait une saisie de email
				$this->redirectToRoute('default_pwdLost');
			}
		}
		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {

			// formulaire saisie mot de passe perdu A FAIRE
			?>
			<h1>mot de passe perdu</h1>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<form method="POST" role="form" action="">
									<div class="form-group">
										<label class="control-label" for="usernameOrEmail">Nom ou Email</label>
										<input name="usernameOrEmail" id="usernameOrEmail" type="text" class="form-control" placeholder="Enter username OR Email" required/>
									</div>
									<div class="form-group text-center">
										<input type="submit" name="btnSub" value="Envoyer" class="btn btn-success btn-lg" />
									</div>
								</form>
							</div>
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
			<?php
			// fin de formulaire
		}
	}

	//Fonction pwdNew() modification du mot de passe
	public function pwdNew(){
		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$token = htmlentities(strip_tags($_GET['token']));

			// formulaire saisie nouveau mot de passe A FAIRE
			?>
			<h1>nouveau mot passe </h1>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form method="POST" role="form" action="">
								<input type="hidden" name="pwdToken" value="<?= $token ?>">
								<div class="form-group">
									<label class="control-label" for="password">Nouveau password</label>
									<input name="password" id="password" type="text" class="form-control" placeholder="Enter votre mot de pass" required/>
								</div>
								<div class="form-group text-center">
									<input type="submit" name="btnSub" value="Envoyer" class="btn btn-success btn-lg" />
								</div>
							</form>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<?php
			// fin de formualaire
		}

		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Récupère un utilisateur en fonction de son email ou de son pseudo
			$user = $this->currentUser->findByToken($_POST['pwdToken'], 'P');
			// si utilisateur trouvé, on exécute la suite...
			if ($user <> false) {
				//nettoyage et hashage le mot de passe
				$password= $this->auth->hashPassword(htmlentities(strip_tags($_POST['password'])));
                //mise à jour du nouveau de mot passe et réintialisation pwdToken
				$this->currentUser->update(array('password'=>$password, 'pwdToken'=>""), $user['id']);
				// redirection page d'accueil (index)
				$this->redirectToRoute('default_index');
			} else {
				echo  "Erreur...";
				// redirection page d'???????
				$this->redirectToRoute('default_pwdNew');   //// vérifier la route si problème ???????
			}
		}
	}

	//Fonction emailValid() confirmation email
	public function emailValid(){
		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$token = htmlentities(strip_tags($_GET['token']));

			// formulaire de confirmation email A FAIRE
			?>
			<h1>Confirmez email </h1>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form method="POST" role="form" action="">
								<input type="hidden" name="emailToken" value="<?= $token ?>">
								<div class="form-group text-center">
									<input type="submit" name="btnSub" value="Validez" class="btn btn-success btn-lg" />
								</div>
							</form>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<?php
			// fin de formualaire
		}

		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Récupère un utilisateur en fonction de son email ou de son pseudo
			$user = $this->currentUser->findByToken($_POST['emailToken'], 'E');
			// si utilisateur trouvé, on exécute la suite...
			if ($user <> false) {
                //mise à jour email valide et réintialisation emailToken
				$this->currentUser->update(array('emailValid'=>true, 'emailToken'=>""), $user['id']);
				// redirection page d'accueil (index)
				$this->redirectToRoute('default_index');
			} else {
				echo  "Erreur...";
				// redirection page d'???????
				$this->redirectToRoute('default_emailValid');   //// vérifier la route si problème ???????
			}
		}
	}

	// Fonction settings() formulaire de saisie des préférences
	public function settings() {
        
        // récup. utilisateur en cours (en 'POST' ou en 'GET')
        $user = $this->currentUser->find($_SESSION['user']['id']);
		
        // vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
            // dé-sérialise la table des préférences pour récup.
			$settings = unserialize($user['settings']); 
            // initialisation des préférences avant chargement
            $left = ' '; 
            $right = ' ';
            $youtube = ' ';
            $twitch = ' ';
            $dailymotion = ' ';
            
            // vérif. si préférences renseignées
            if (count($settings) <> 0) {
                //... si OK, on les récupère (checked pr les préférences renseignées)
                if ($settings['layout'] == 'left') {$left = 'checked';}
                else {$right = 'checked';}
                if (isset($settings['youtube'])) {$youtube = 'checked';}
                if (isset($settings['twitch'])) {$twitch = 'checked';}
                if (isset($settings['dailymotion'])) {$dailymotion = 'checked';}
            } else {
                //... si non OK, on charge par défaut left et le reste à blanc
                $left = 'checked';
            }
			
			// formulaire de preference A FAIRE
			?>

            <!--style pr tester un switch (voir les valeurs dans le serialize) A SUPPRIMER -->
            <style> 
                .switch {position: relative; display: inline-block; width: 60px; height: 34px;}
                .switch input {display:none;}
                .slider {position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
                         background-color: #ccc; transition: .4s;}
                .slider:before {position: absolute; content: ""; height: 26px; width: 26px;
                                left: 4px; bottom: 4px; background-color: white; transition: .4s;}
                input:checked + .slider {background-color: #2196F3;}
                input:focus + .slider {box-shadow: 0 0 1px #2196F3;}
                input:checked + .slider:before {transform: translateX(26px);}
            </style>

            <!-- formulaire des préférences -->
			<h1>Préferences </h1>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form method="POST" role="form" action="">
                                <!-- $left, $right, $youtube, $twith, $dailymotion : -->
                                <!-- variables php si renseignées en BDD "checked" sinon " " -->
								<fieldset>
									<label for="left">Gauche</label>
                                    <input type="radio" id="left" name="layout" value="left" <?= $left ?>>
									<label for="right">droite</label>
                                    <input type="radio" id="right" name="layout" value="right" <?= $right ?>>
								</fieldset>
								<fieldset>
                                    <b>Youtube</b> Off 
                                    <label for="youtube" class="switch">
									    <input type="checkbox" id="youtube" name="youtube" value="$youtube" <?= $youtube ?> >
                                        <div class="slider"></div>
                                    </label> On <br/>
                                    <b>Twitch</b> Off 
									<label for="twitch" class="switch">
									    <input type="checkbox" id="twitch" name="twitch" value="$twitch" <?= $twitch ?>>
                                        <div class="slider"></div>
                                    </label> On <br/>
                                    <b>Dailymotion</b> Off 
									<label for="dailymotion" class="switch">
									    <input type="checkbox" id="dailymotion" name="dailymotion" value="$dailymotion" <?= $dailymotion ?>>
                                        <div class="slider"></div>
                                    </label> On <br/>
								</fieldset>
								<div class="form-group text-center">
									<input type="submit" name="btnSub" value="Validez" class="btn btn-success btn-lg" />
								</div>
							</form>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<?php 
			// fin de formualaire			
		}
		
		// vérif méthode envoyée 'POST' ou 'GET'
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
			// si utilisateur trouvé, on exécute la suite...
			if ($user <> false) {
                 // sérialise la table des préférences pour mise à jour
				$settings = serialize($_POST);
				$this->currentUser->update(array('settings'=>$settings), $user['id']);
				// redirection page d'accueil (index)
				$this->redirectToRoute('default_index');
			} else {
				echo  "Erreur...";
				// redirection page d'???????
				$this->redirectToRoute('default_emailValid');   //// vérifier la route si problème ???????
			}
		}
		
	}



}
?>
