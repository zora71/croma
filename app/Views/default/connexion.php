<?php $this->layout('backend', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
    <!-- connexion d'un utilisateur -->
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <!-- affichage message erreur si pb connexion -->
            <?php if (isset($_SESSION['error'])) : ?>
                <p class="bg-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <!-- formulaire de connexion -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form method="POST" role="form" action="<?php echo $this->url($loginRoute); ?>">
								
                                <div class="form-group">
                                    <label class="control-label" for="usernameOrEmail">Nom ou Email</label>
                                    <input name="usernameOrEmail" id="usernameOrEmail" type="text" class="form-control" placeholder="Enter username OR Email" required/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="pwd">Mot de passe</label>
                                    <input name="pwd" id="pwd" class="form-control" type="password" placeholder="Enter password" required/>
                                </div>
								
                                <button type="submit" class="btn btn-lg btn-primary">Se connecter</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
<?php $this->stop('main_content') ?>
