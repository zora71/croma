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
        console.log(modal, trigger);
      },
      complete: function() { alert("Paramètre enregistré"); } // Appel de Modal close
    }
  );
 


























  });
