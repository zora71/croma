<?php ?>
<!-- Modal1 Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <form method="POST" action="#">
            <fieldset>
                <legend>Your preference</legend>
                <fieldset>
                    <legend>Disposition</legend>
                    <div class="flex-space">
                        <div id="gauche"></div>
                        <div id="droite"></div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Views of platforms </legend>
                    <!-- Switch -->
                    <div class="switch">
                        <label>
                            Off
                            <input id="switchYoutube" class="switch" data-plat="youtube" type="checkbox" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        <b>Youtube</b>
                    </div><br>
                    <div class="switch">
                        <label>
                            Off
                            <input id="switchTwitch" class="switch" data-plat="twitch" type="checkbox" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        <b>Twitch</b>
                    </div><br>
                    <div class="switch">
                        <label>
                            Off
                            <input id="switchDailymotion" class="switch" data-plat="dailymotion" type="checkbox" checked>
                            <span class="lever"></span>
                            On
                        </label>
                        <b>Dailymotion</b>
                    </div>
                </fieldset>
                <div class="row" style="margin-top: 25px">
                    <div class="col s12 flex-space">
                        <button type="submit" class="waves-effect waves-light btn green darken-4">Validate</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<!-- Modal2 Structure -->
<div id="modal2" class="modal2">
    <div id="modal2-content" class="modal2-content">
        <?php if (isset($error)) : ?><div id="erreur" class=""><b><?=$error?></b></div><?php endif; ?>
        <fieldset>
            <legend>Login</legend>
            <form method="POST" action="<?php echo $this->url('default_connexion'); ?>">
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="usernameOrEmail" id="usernameOrEmail" type="text" class="validate">
                                <label for="usernameOrEmail">Username or email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="pwd" id="pwd" type="password" class="validate">
                                <label for="pwd">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 flex-space">
                                <button type="submit" class="waves-effect waves-light btn green darken-4">Connexion</button>
                            </div>
                            <div class="col s12 flex-space">
                                <a id="oubliMdp" href="#" class="center">Forgot your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>

            </form>
        </fieldset>
        <fieldset>
            <legend>Not yet registered</legend>
            <div id="inscrit" class="row">
                <div class="col s12 flex">
                    <a id="inscription" href="#" class="waves-effect waves-blue btn-flat center">Sign up</a>
                </div>
            </div>
        </fieldset>
    </div>
    <div id="modal3">
        <div class="modal3-content">
            <fieldset>
                <legend>Registration form</legend>
                <form method="POST" action="<?=$this->url('default_inscription')?>">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="lastname" id="lastname" type="text" class="validate">
                                    <label for="lastname">Last name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="firstname" id="firstname" type="text" class="validate">
                                    <label for="firstname">First name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="pseudo" id="pseudo" type="text" class="validate">
                                    <label for="pseudo">Username</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="email" id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="password" id="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 flex-space">
                                    <button type="submit" class="waves-effect waves-light btn green darken-4">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
    <div class="modal-footer">
        <a id="fermer" href="#!" class="modal2-action modal-close waves-effect waves-green btn-flat right">Close</a>
    </div>
</div>
<script src="<?= $this->assetUrl('vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= $this->assetUrl('vendor/materialize/js/materialize.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/script.js') ?>"></script>
<?php if(isset($error)) : ?>
<script>
    $(document).ready(function(){
    $('#modal2').modal('open');    
    })
</script>
<?php endif; ?>
<footer>
    <div class="container-fluid green-text text-darken-4 center">© 2017 Designed & Created by CROMA, All rights reserved.    <a href="#" class="green-text text-darken-4 waves-effect waves-teal">   - Legals Mentions </a>     <a href="#" class="green-text text-darken-4 waves-effect waves-teal active">   - About  </a></div>
</footer>