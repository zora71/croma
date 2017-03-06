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
		ready: function(modal, trigger) { // Appel de Modal open. Parametre du trigger de la modal sont valable ?
		},
		complete: function() {} // Appel de Modal close
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
		complete: function() {} // Appel de Modal close
	});
    
    var inscription = $('#inscription');
    var modal2 = $('#modal2-content');
    var modal3 = $('#modal3');
    
    inscription.click(function(){
        modal2.css({
            transform: 'scaleX(0)',
            transition: 'all 1s ease'
        }).hide({delay: 2000});
        $('#modal2').css({
            width: '25%'
        });
        modal3.show({delay:2500});
            modal3.css({
                transform: 'scaleX(1)',
                transition: 'all 1s ease'
        });
        
    });
    
    $('#fermer').click(function(){
        modal2.show().css('transform', 'scaleX(1)');
        modal3.hide().css('transform', 'scaleX(0)');
        $('#modal2').css('width', '');
       
    });

	var section = $('#section');
	var droite = $('#droite');
	var gauche = $('#gauche');
    var close = $('#close');

	droite.click(function(){
		gauche.css('border', 'inherit');
		droite.css('border', '3px solid #1b5e20');
		section.removeClass("flexGauche").addClass("flexDroit");
        close.removeClass("btn-gauche").addClass("btn-droit");
	});

	gauche.click(function(){
		droite.css('border', 'inherit');
		gauche.css('border', '3px solid #1b5e20');
		section.removeClass("flexDroit").addClass("flexGauche");
        close.removeClass("btn-droit").addClass("btn-gauche");
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
	$('.player').click(function (e) {
		$('.mini').attr('style','');
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
		console.log($('.player').index(this));
		var rect = $('.player').get($('.player').index(this)).getBoundingClientRect();
		console.log(rect.y);
		$('.mini').css({
			zIndex: 2000,
			position: 'absolute',
			backgroundColor: 'black',
			top: pos.y,
			left: pos.x,
			width: rect.width,
			height: rect.height,
			opacity: 1,
			transition: 'top .7s .1s ease, left .7s .1s ease, width .7s .1s ease, height .7s .1s ease, opacity 5s 0s ease'})
			.css('-moz-transition', 'top .7s .1s ease, left .7s .1s ease, width .7s .1s ease, height .7s .1s ease, opacity 5s 0s ease')
			.css('-webkit-transition', 'top .7s .1s ease, left .7s .1s ease, width .7s .1s ease, height .7s .1s ease, opacity 5s 0s ease')
			.css('-ms-transition', 'top .7s .1s ease, left .7s .1s ease, width .7s .1s ease, height .7s .1s ease, opacity 5s 0s ease')
			.css('-o-transition', 'top .7s .1s ease, left .7s .1s ease, width .7s .1s ease, height .7s .1s ease, opacity 5s 0s ease').attr('src', $(this).find('.vignette').data('url')).show().css({
            top: 0,
			left: 0,
			width: '100%',
			height: 750,
			opacity: 1
        });

		$('#close').data('left', pos.x).data('top', pos.y).slideUp(200).delay(1000).show(200);
		
	});
	
	$('#close').on('click', function(){
		var rect = $('.player')[0].getBoundingClientRect();
		$(this).hide();
		$('.mini').css({
			zIndex: -2000,
			opacity: 0,
            width: rect.width,
			height: rect.height,
			left: $(this).data('left'),
			top: $(this).data('top'),
			transition: 'top .7s ease, left .7s ease, width .7s ease, height .7s ease, opacity .1s .7s ease, z-index .0s .8s ease'})
			.css('-moz-transition', 'top .7s ease, left .7s ease, width .7s ease, height .7s ease, opacity .1s .7s ease, z-index .0s .8s ease')
			.css('-webkit-transition', 'top .7s ease, left .7s ease, width .7s ease, height .7s ease, opacity .1s .7s ease, z-index .0s .8s ease')
			.css('-ms-transition', 'top .7s ease, left .7s ease, width .7s ease, height .7s ease, opacity .1s .7s ease, z-index .0s .8s ease')
			.css('-o-transition', 'top .7s ease, left .7s ease, width .7s ease, height .7s ease, opacity .1s .7s ease, z-index .0s .8s ease').attr('src', '');
        
	})























});
