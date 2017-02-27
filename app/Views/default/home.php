<?php 
$this->layout('layout', ['title' => 'Accueil']);
    
    // vérification du COOKIE
    // uuid = unique universal identifier
    if (!isset($_COOKIE['uuid'])) {
        echo 'création d un cookie et mise à jour BDD';
        echo 'retour accueil';
    } else {
        echo 'récup cookie '.$_COOKIE['uuid'].' et recherche en BDD pr récup préférence';
        echo 'retour accueil';
    }
    

?>

<?php $this->start('main_content') ?>
	<h2>Vod in.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
<?php $this->stop('main_content') ?>
