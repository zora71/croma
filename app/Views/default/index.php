<?php $this->layout('layout', ['title'=>'Vod-In']) ?>

<?php $this->start('main_content') ?>

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
                    <img src="<?= $this->assetUrl('images/logochaine5.jpg') ?>" class="borderyt img-responsive circle">

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

<?php $this->stop('main-content') ?>