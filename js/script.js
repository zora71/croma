$(document).ready(function() {
    Materialize.updateTextFields();

	 $('#modal1').modal();

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
    }
  );
 
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





















  });
