<!DOCTYPE html>

<html lang="fr">


    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
        <title>Vod-In</title>
        <link rel="stylesheet" href="css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/ionicons.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="images/logoVodIn.PNG" />
    </head>

    <body>
        <header>
            <div class="navbar-fixed">
                <nav>
                    <div class="nav-wrapper white">
                        <a href="#" class="brand-logo"><div id="logo"></div></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <!-- Modal Trigger -->
                            <li><a class="waves-effect waves-light btn-floating green darken-4" href="#modal1">
                                <i class="material-icons">mode_edit</i></a></li>
                            <!-- bouton de connexion -->
                            <li><a class="waves-effect waves-light btn green darken-4">Connexion</a></li>

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
        <div id="section" class="row bordure flexGauche ">
            <div id="sideBar" class="col l2 bordure1">
                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------Platefromes vidéos-------------------------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->


                <div id="platYou">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoYoutube.jpg">
                        </div>
                        <div class="col s10">
                            <h5>Youtube</h5>
                        </div>
                    </div>
                </div>
                <div id="platTw">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoTwitch.jpg">
                        </div>
                        <div class="col s10">
                            <h5>Twitch</h5>
                        </div>
                    </div>
                </div>
                <div id="platDM">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoMotion.jpg">
                        </div>
                        <div class="col s10">
                            <h5>Daily motion</h5>
                        </div>
                    </div>
                </div>
                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <!---------------------------------------------------------------------Chaines et abonnements------------------------------------------------------------------------->
                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div id="tri-chaine">
                    <div class="row"><!--début tri-->
                        <div class="col s4">
                            <div id="tri-group" class="btn-floating">


                                <input id="group" type="checkbox" style="display:none">
                                <label id="group-label" for="group">
                                    <span class="yt">-</span>
                                    <span class="dm">-</span>
                                    <span class="tw">-</span>
                                    <span class="yt">-</span>
                                    <span class="dm">-</span>
                                </label>

                            </div>
                        </div>
                        
                    <div class="col s4">
                            <div id="tri-az" class="btn-floating">


                                
                                    
                                <p> A </p>
                                 <p class="ion-arrow-down-c"> Z</p>
                                       
                                

                            </div>
                        </div>
                        
                    <div class="col s4">
                            <div id="tri-date" class="btn-floating">


                                <input id="group" type="checkbox" style="display:none">
                                <label id="group-label" for="group">
                                    <span class="yt">-</span>
                                    <span class="dm">-</span>
                                    <span class="tw">-</span>
                                    <span class="yt">-</span>
                                    <span class="dm">-</span>
                                </label>

                            </div>
                        </div>
                    </div><!--fin row tri-->
                </div>

                <div class="Chaine">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logochaine1.jpg">
                        </div>
                        <div class="col s10">
                            <h6>PlayerG</h6>
                        </div>
                    </div>
                </div>

                <div class="Chaine">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoChaine2.jpg">
                        </div>
                        <div class="col s10">
                            <h6>Dunod</h6>
                        </div>
                    </div>
                </div>

                <div class="Chaine">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoChaine3.jpg">
                        </div>
                        <div class="col s10">
                            <h6>Daily Emotions</h6>
                        </div>
                    </div>
                </div>

                <div class="Chaine">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoChaine4.jpg">
                        </div>
                        <div class="col s10">
                            <h6>François le français</h6>
                        </div>
                    </div>
                </div>

                <div class="Chaine">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoChaine5.jpg">
                        </div>
                        <div class="col s10">
                            <h6>Bonheur au quotidien</h6>
                        </div>
                    </div>
                </div>

                <div class="Chaine">
                    <div class="row">
                        <div class="col s2">
                            <img src="images/logoChaine6.jpg">
                        </div>
                        <div class="col s10">
                            <h6>Geek inside</h6>
                        </div>
                    </div>
                </div>
            </div>



            <!---------------------------------------------------------------------------------------------------------------------------------->
            <!------------------------------------------Debut classement vidéos----------------------------------------------------------------->
            <!---------------------------------------------------------------------------------------------------------------------------------->

            <div id="video" class="col l10 bordure2">
                <div class="row group">
                    <div class="col l3 bordure">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                </div>

                <div class="row group">
                    <div class="col l3 bordure1">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure1">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure1">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                </div>

                <div class="row group">
                    <div class="col l3 bordure2">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure2">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure2">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                </div>

                <div class="row group">
                    <div class="col l3 bordure">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                </div>

                <div class="row group">
                    <div class="col l3 bordure1">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure1">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure1">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                </div>

                <div class="row group">
                    <div class="col l3 bordure2">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure2">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                    <div class="col l3 bordure2">
                        <img src="images/VodIn.PNG" class="vignette">
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
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