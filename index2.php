<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Vod-In</title>
        <link rel="stylesheet" href="css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="icons/ionicons.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="images/logoVodIn.PNG" />
        <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="navbar-fixed">
                <nav>
                    <div class="nav-wrapper white">
                        <a href="index.php" class="brand-logo"><div id="logo"></div></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <!-- Modal Trigger -->
                            <li><a class="waves-effect waves-light btn green darken-4 tooltipped" href="#modal1" data-position="bottom" data-delay="50" data-tooltip="Préférences">
                                <i class="material-icons">mode_edit</i></a></li>
                            <!-- bouton de connexion -->
                            <li><a href="#modal2" class="waves-effect waves-light btn green darken-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Connexion">Connexion</a></li>

                        </ul>
                        <div id="searchNav" class="nav-wrapper flex">
                            <form id="searchBar">
                                <div id="searchChamp" class="input-field">
                                    <input id="search" type="search" placeholder="  Recherche.." required>
                                    <label class="label-icon" for="search"></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div id="section" class="flexGauche">
            <div id="sideBar">
                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------Platefromes vidéos-------------------------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->



                <div id="platYou" class="platform switch-on youtube rounded">

                    <div id="img-you" class="flex">
                        <img src="images/logoYoutube.jpg" class="rounded">



                        <span>Youtube</span>

                    </div>
                </div>
                <div id="platTw" class="platform switch-on twitch rounded">

                    <div id="img-tw" class="flex">
                        <img src="images/logoTwitch.jpg" class="rounded">


                        <span>Twitch</span>
                    </div>
                </div>
                <div id="platDM" class="platform switch-on dailymotion rounded">

                    <div id="img-dm" class="flex" >
                        <img src="images/logoMotion.jpg" class="rounded">


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
                            <img src="images/logochaine1.jpg" class="rounded responsive-img">

                            <div class="micro-logo">
                                <img src="images/logoYoutube.jpg" class="img-responsive rounded">
                            </div>


                        </div>
                        <span class="titre-chaine">PlayerG</span>


                    </div> 
                </div>

                <div class="abonnement">
                    <div class="switch-on">
                        <div class="logo-chaine">
                            <img src="images/logochaine3.jpg" class="rounded responsive-img">

                            <div class="micro-logo">
                                <img src="images/logoMotion.jpg" class="img-responsive rounded">
                            </div>


                        </div>
                        <span class="titre-chaine">Daily Emotions</span>


                    </div> 
                </div>


                <div class="abonnement">
                    <div class="switch-on rounded">
                        <div class="logo-chaine">
                            <img src="images/logochaine2.jpg" class="borderyt rounded responsive-img">

                            <div class="micro-logo">
                                <img src="images/logoYoutube.jpg" class="img-responsive rounded">
                            </div>


                        </div>
                        <span class="titre-chaine">Dunod</span>


                    </div> 
                </div>

                <div class="abonnement bordertw">
                    <div class="switch-on">
                        <div class="logo-chaine">
                            <img src="images/logochaine4.jpg" class="rounded responsive-img">

                            <div class="micro-logo">
                                <img src="images/logoTwitch.jpg" class="img-responsive rounded">
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
                                <img src="images/logoMotion.jpg" class="img-responsive circle">
                            </div>


                        </div>
                        <span class="titre-chaine">Bonheur au quotidien</span>


                    </div> 
                </div>

                <div class="abonnement">
                    <div class="switch-on">
                        <div class="logo-chaine">
                            <img src="images/logochaine6.jpg" class="circle responsive-img">

                            <div class="micro-logo">
                                <img src="images/logoTwitch.jpg" class="img-responsive circle">
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
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">		
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/dDW2ZYbZTHY">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="//www.dailymotion.com/embed/video/x55o4hw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                    </div>

                    <div class="row group">
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                    </div>

                    <div class="row group">
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                    </div>

                    <div class="row group">
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                    </div>

                    <div class="row group">
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                    </div>

                    <div class="row group">
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                        <div class="player col l3 z-depth-5">
                            <img src="images/VodIn.PNG" class="vignette" data-url="https://www.youtube.com/embed/B7wkzmZ4GBw">
                            <div class="caption">Titre: <span>Minecraft</span> Temp: <span>2.55</span></div>
                        </div>
                    </div>

                </div>
                <div class="overlay">
                </div>
                <iframe class="mini" frameborder="0" allowfullscreen></iframe>
                <div id="close" class="btn-floating waves-effect waves-light red btn-gauche"><i class="material-icons">close</i></div>
            </div>
        </div>

        <!-- Modal1 Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <fieldset>
                    <legend>Vos préférences</legend>
                    <fieldset>
                        <legend>Disposition</legend>
                        <form class="flex-space" action="#">
                            <div id="gauche"></div>
                            <div id="droite"></div>
                        </form>
                    </fieldset>
                    <fieldset>
                        <legend>Vu des plateformes</legend>
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
                </fieldset>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div>

        <!-- Modal1 Structure -->
        <div id="modal2" class="modal2">
            <div class="modal-content">
                <fieldset>
                    <legend>Login</legend>
                    <form method="post" action="#">
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="pseudo" type="text" class="validate">
                                        <label for="pseudo">Pseudo</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </form>
                </fieldset>
                <fieldset>
                    <legend>Pas encore inscrit</legend>
                    <div id="inscrit" class="row">
                        <div class="col s12 flex">
                            <a id="inscription" href="#" class="modal-action modal-close waves-effect waves-blue btn-flat center">Inscription</a>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat right">Valider</a>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/materialize.min.js"></script>
        <script src="js/script.js"></script>
        <footer>
            <div class="container-fluid green-text text-darken-4 center">© 2017 Designed & Created by CROMA, All rights reserved.    <a href="#" class="green-text text-darken-4 waves-effect waves-teal">   - Mentions légales</a>     <a href="#" class="green-text text-darken-4 waves-effect waves-teal active">   - A propos  </a></div>
        </footer>
    </body>
</html>
