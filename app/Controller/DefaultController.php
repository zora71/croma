<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel;
use \Model\Cookie;
use \W\Security\AuthentificationModel;

class DefaultController extends Controller{

	protected $uuid;
	protected $currentUser;
	protected $auth;

	public function __construct() {
		$this->currentUser = new UsersModel;
		$this->auth = new AuthentificationModel;
	}

	public function home() {
		$this->show('default/home');
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
			$this->currentUser->insert(array('uuid'=>$newUuid, 'pseudo'=>$newUuid, 'email'=>$newUuid, 'emailValid'=>true));
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

				$_POST['emailValid']= false;
				// stockage de l'utilisateur inséré pour log suivant
				$newUser = $this->currentUser->update($_POST, $user['id']) ;
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
                
                // ajout date dernière connexion sur Uuid

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
}
?>
