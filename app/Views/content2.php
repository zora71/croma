<?php ?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->url('default_index'); ?>">VODIN Framework</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <?php if (isset($_SESSION['user'])) : ?>  
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li>
                            <!-- appel administration du site -->
                            <a href="<?php echo $this->url('default_index'); ?>"><i class="fa fa-gear fa-fw"></i> ACCUEIL</a>
				
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="<?= $this->url('default_deconnexion') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            <?php else : ?>
                <li>
                    <a href="<?= $this->url('default_inscription') ?>"><i class="fa fa-user fa-fw"></i> Inscription</a>
                </li>
                <li>
                    <a href="<?= $this->url('default_connexion') ?>"><i class="fa fa-sign-in fa-fw"></i> Connexion</a>
                </li>
            <?php endif; ?>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo $this->url('default_index'); ?>"><i class="fa fa-dashboard fa-fw"></i> Tableau de bord</a>
                    </li>
                    <li>
                        <!-- menu gestion des utilisateurs -->
                        <a href="#"><i class="fa fa-user fa-fw"></i> Utilisateurs <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <!-- appel liste -->
                                <a href="?controler=user&action=index"><i class="fa fa-list fa-fw"></i> Liste</a>
                            </li>
                            <li>
                                <!-- appel création -->
                                <a href="?controler=user&action=edit"><i class="fa fa-plus fa-fw"></i> Création</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $this->e($title) ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
			
					
            <?= $this->section('main_content') ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!------------------------------------------------------VODIN CONTETNT --------------------------------------->
 <div id="sideBar">
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------------Platefromes vidéos-------------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->



        <div id="platYou" class="platform switch-on youtube rounded">

            <div id="img-you" class="flex">
                <img src="<?= $this->assetUrl('images/logoYoutube.jpg') ?>" class="rounded">



                <span>Youtube</span>

            </div>
        </div>
        <div id="platTw" class="platform switch-on twitch rounded">

            <div id="img-tw" class="flex">
                <img src="<?= $this->assetUrl('images/logoTwitch.jpg') ?>" class="rounded">


                <span>Twitch</span>
            </div>
        </div>
        <div id="platDM" class="platform switch-on dailymotion rounded">

            <div id="img-dm" class="flex" >
                <img src="<?= $this->assetUrl('images/logoMotion.jpg') ?>" class="rounded">


                <span>Daily motion</span>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!---------------------------------------------------------------------Chaines et abonnements------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <div id="tri-chaine" class="switch-on flex">
            <!--<div id="titre-tri"><span>Trier votre contenu</span></div>-->
            <div id="tri-group" class="btn-tri rounded waves-effect waves-light green darken-4">
                <input id="group" type="checkbox" style="display:none">
                <label id="group-label" for="group">
                    <span class="yt">-</span>
                    <span class="dm">-</span>
                    <span class="tw">-</span>
                    <span class="yt">-</span>
                    <span class="dm">-</span>
                </label>


            </div>   


            <div id="tri-az" class="btn-tri rounded waves-effect waves-light green darken-4">
                <input id="az-sort" type="checkbox" style="display:none">
                <label id="az-sort-label" for="az-sort">
                    <div id="A"> A </div>
                    <div id="arrow1" class="ion-arrow-down-c"> </div>
                    <div id="Z"> Z </div>

                </label>



            </div>



            <div id="tri-date" class="btn-tri rounded waves-effect waves-light green darken-4">
                <input id="date-sort" type="checkbox" style="display:none">
                <label id="date-sort-label" for="date-sort">
                    <div id="A">Date</div>
                    <div id="arrow1" class="ion-arrow-down-c"> </div>


                </label>

            </div>
        </div>


        <!--<div id="abonne" class="bordure chaine">-->
        <div class="abonnement borderyt">
            <div class="switch-on">
                <div class="logo-chaine">
                    <img src="<?= $this->assetUrl('images/logochaine1.jpg') ?>" class="rounded responsive-img">

                    <div class="micro-logo">
                        <img src="<?= $this->assetUrl('images/logoYoutube.jpg') ?>" class="img-responsive rounded">
                    </div>


                </div>
                <span class="titre-chaine">PlayerG</span>


            </div> 
        </div>

        <div class="abonnement">
            <div class="switch-on">
                <div class="logo-chaine">
                    <img src="<?= $this->assetUrl('images/logochaine3.jpg') ?>" class="rounded responsive-img">

                    <div class="micro-logo">
                        <img src="<?= $this->assetUrl('images/logoMotion.jpg') ?>" class="img-responsive rounded">
                    </div>


                </div>
                <span class="titre-chaine">Daily Emotions</span>


            </div> 
        </div>


        <div class="abonnement">
            <div class="switch-on rounded">
                <div class="logo-chaine">
                    <img src="<?= $this->assetUrl('images/logochaine2.jpg') ?>" class="borderyt rounded responsive-img">

                    <div class="micro-logo">
                        <img src="<?= $this->assetUrl('images/logoYoutube.jpg') ?>" class="img-responsive rounded">
                    </div>


                </div>
                <span class="titre-chaine">Dunod</span>


            </div> 
        </div>

        <div class="abonnement bordertw">
            <div class="switch-on">
                <div class="logo-chaine">
                    <img src="<?= $this->assetUrl('images/logochaine4.jpg') ?>" class="rounded responsive-img">

                    <div class="micro-logo">
                        <img src="<?= $this->assetUrl('images/logoTwitch.jpg') ?>" class="img-responsive rounded">
                    </div>


                </div>
                <span class="titre-chaine">François le français</span>


            </div> 
        </div>

        <div class="abonnement">
            <div class="switch-on">
                <div class="logo-chaine">
                    <img src="images/logochaine5.jpg" class="circle borderyt  responsive-img">

                    <div class="micro-logo">
                        <img src="<?= $this->assetUrl('images/logoMotion.jpg') ?>" class="img-responsive circle">
                    </div>


                </div>
                <span class="titre-chaine">Bonheur au quotidien</span>


            </div> 
        </div>

        <div class="abonnement">
            <div class="switch-on">
                <div class="logo-chaine">
                    <img src="<?= $this->assetUrl('images/logochaine6.jpg') ?>" class="circle responsive-img">

                    <div class="micro-logo">
                        <img src="<?= $this->assetUrl('images/logoTwitch.jpg') ?>" class="img-responsive circle">
                    </div>


                </div>
                <span class="titre-chaine">Geek inside</span>


            </div> 
        </div>







        <!--</div>-->
    </div>



    <!---------------------------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------Debut classement vidéos----------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------------------------------------------------->

    <div id="section2">
        <div id="video">
            <div class="row group">
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">		
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/dDW2ZYbZTHY">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="//www.dailymotion.com/embed/video/x55o4hw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
            </div>

            <div class="row group">
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
            </div>

            <div class="row group">
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
            </div>

            <div class="row group">
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
            </div>

            <div class="row group">
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
            </div>

            <div class="row group">
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
                <div class="player col l3 z-depth-5">
                    <img src="<?= $this->assetUrl('images/VodIn.PNG') ?>" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                    <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                </div>
            </div>

        </div>
        <div class="overlay">
        </div>
        <iframe class="mini" frameborder="0" allowfullscreen></iframe>
        <div id="close" class="btn-floating waves-effect waves-light red btn-gauche"><i class="material-icons">close</i></div>
    </div>