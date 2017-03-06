<?php $this->layout('backend', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
    <!--visualisation d'un utilisateur -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
							<h1>FormulaireInscri</h1>
                            <!-- formulaire de création d'un utilisateur -->
                            <form method="POST" role="form" action="<?=$this->url('default_inscription')?>">
                                <div class="form-group">
                                    <label class="control-label" for="lastname">Nom</label>
                                    <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="firstname">Prenom</label>
                                    <input name="firstname" id="firstname" type="text" class="form-control" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="pseudo">Pseudo</label>
                                    <input name="pseudo" id="pseudo" type="text" class="form-control" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input name="email" id="email" type="mail" class="form-control" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password">Mot de passe</label>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Enter text">
                                </div>
                                <button type="submit" class="btn btn-default btn-success">S'inscrire</button>
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

<?php $this->start('script') ?>
<?php $this->stop('script') ?>