<!DOCTYPE html>

<html lang="fr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
	<title>Vod-In</title>
	<link rel="stylesheet" href="css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

		</div>
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
</body>
</html>