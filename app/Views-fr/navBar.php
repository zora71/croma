<?php 
if(isset($_SESSION['error'])) {
    $error=$_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white">
                <a href="index.php" class="brand-logo"><div id="logo"></div></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">

                    <?php if (isset($_SESSION['user']['pseudo']) &&
                              isset($_SESSION['user']['email']) &&
                              isset($_SESSION['user']['uuid']) &&
                              $_SESSION['user']['email'] == $_SESSION['user']['uuid'] &&
                              $_SESSION['user']['pseudo'] == $_SESSION['user']['uuid']): ?>

                    <!-- Modal Trigger -->
                    <li><a class="waves-effect waves-light btn green darken-4 tooltipped" href="#modal1" data-position="bottom" data-delay="50" data-tooltip="Préférences">
                        <i class="material-icons">mode_edit</i></a></li>
                    <!-- bouton de connexion -->
                    <li><a href="#modal2" class="waves-effect waves-light btn green darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Connexion">Connexion</a></li>
                    
                    <?php else : ?>
                    
                    <!-- Modal Trigger -->
                    <li> <div class="chip">
                        <?php echo $_SESSION['user']['pseudo']; ?>
                        </div></li>
                    <li><a class="waves-effect waves-light btn green darken-4 tooltipped" href="#modal1" data-position="bottom" data-delay="50" data-tooltip="Préférences">
                        <i class="material-icons">mode_edit</i></a></li>
                    <!-- bouton de déconnexion -->
                    <li><a href="<?= $this->url('default_deconnexion') ?>" class="waves-effect waves-light btn red darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Déconnexion">Déconnexion</a></li>

                    <?php endif; ?>

                </ul>
                <div id="searchNav" class="nav-wrapper flex">
                    <form id="searchBar">
                        <div id="searchChamp" class="input-field">
                            <input id="search" type="search" placeholder="  Recherche..." required>
                            <label class="label-icon" for="search"></label>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>