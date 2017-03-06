<?php $this->layout('layout', ['title' => 'home']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
	<a href="<?php echo $this->url('default_contact'); ?>">Contact</a>
	<a href="<?php echo $this->url('default_about'); ?>">A Propos</a>

<?php $this->stop('main_content') ?>