$(document).ready(function() {
	Materialize.updateTextFields();

	$('#modal1').modal();
	
    $('#modal2').modal();

	$('.modal').modal({
		dismissible: true, // Fermeture de la modal si on click en dehors 
		opacity: .5, // Opacity de la modal
		inDuration: 300, // Transition et duration
		outDuration: 200, // Transition hors duration
		startingTop: '4%', // depart du top style attribute
		endingTop: '10%', // fin du top style attribute
		ready: function(modal, trigger) { // Appel de Modal open. Parametre du trigger de la madol sont valable ?
		},
		complete: function() { alert("Paramètre enregistré"); } // Appel de Modal close
	});
    
    $('.modal2').modal({
		dismissible: true, // Fermeture de la modal si on click en dehors 
		opacity: .5, // Opacity de la modal
		inDuration: 300, // Transition et duration
		outDuration: 200, // Transition hors duration
		startingTop: '4%', // depart du top style attribute
		endingTop: '10%', // fin du top style attribute
		ready: function(modal, trigger) { // Appel de Modal open. Parametre du trigger de la madol sont valable ?
		},
		complete: function() { alert("Bonjour xXMuggenXx"); } // Appel de Modal close
	});

	var section = $('#section');
	var droite = $('#droite');
	var gauche = $('#gauche');

	droite.click(function(){
		gauche.css('border', 'inherit');
		droite.css('border', '3px solid #1b5e20');
		section.removeClass("flexGauche").addClass("flexDroit");
	});

	gauche.click(function(){
		droite.css('border', 'inherit');
		gauche.css('border', '3px solid #1b5e20');
		section.removeClass("flexDroit").addClass("flexGauche");
	});

	$('.tooltipped').tooltip({delay: 50});

	$('.switch').on('change', function(e){
		if($(this).prop("checked")){
			$('.' + $(this).data('plat') ).removeClass("switch-off").addClass("switch-on");
		}else{
			$('.' + $(this).data('plat') ).removeClass("switch-on").addClass("switch-off");
		}
	});
$('.mini').hide();
$('.mini + div').hide();
	$('.vignette').click(function (e) {
		var v = $('#video');
		console.log(v)
		function findPos(obj) {
			var curleft = obj.offsetLeft || 0;
			var curtop = obj.offsetTop - v.get(0).scrollTop || 0;
			/*while (obj = obj.offsetParent) {
				curleft += obj.offsetLeft
				curtop += obj.offsetTop
			}*/
			return {x:curleft,y:curtop};
		}
		
		var pos = findPos($(this).get(0));
		$('.mini').css({
			zIndex: 2000,
			position: 'absolute',
			backgroundColor: 'black',
			top: pos.y,
			left: pos.x,
			width: 376,
			height: 226,
			transition: 'all .7s ease'
		}).attr('src', $(this).data('url')).show().css({
            top: 0,
			left: 0,
			width: '100%',
			height: 750
        });
		$('#close').slideUp(200).delay(1000).show(200);
		
	});
	
	$('#close').on('click', function(){
		$(this).hide();
		$('.mini').css({
            height: '0%',
            transition: 'all .1s ease'
        }).attr('src', '').hide(1000);
        
	})























});
