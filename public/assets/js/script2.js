$(document).ready(function () {
    
    // alert();
    
    // retire 'display none' sur classe no-js de btn-modal si javascript
    $('html').removeClass('no-js');
    
    // JS sur formulaire de connexion modal
    $('#connexion').submit(function(e) {
        e.preventDefault();  
        $.ajax({type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',      
                success: function(data) {   // status code 200 (OK)
                    // écriture résultat ds modal header
                    $('.modal-header').append('<p class="alert-success">'+data.message+'</p>'); 
                    window.location.href = "<?= $this->url('default_index') ?>";  
                },
                error: function(data) { // status code <> 200 (NON OK)
                    // écriture resultat ds modal header
                    $('.modal-header').append('<p class="alert-danger">'+data.responseJSON.message+'</p>');
                },
                complete: function() {      // exec quel que soit le status code

                }
        });    
    });
    
    // JS sur formulaire d'inscription modal
    $('#inscription').submit(function(e) {
        e.preventDefault();  
        $.ajax({type: "POST",
                url: $(this).attr('action'),    // récup. url spécifiée ds formulaire inscription
                data: $(this).serialize(),      // sérialisation des données en tableau
                dataType: 'json',      
                success: function(data) {   // status code 200 (OK)
                    // console.log(data);
                    // écriture résultat ds modal header
                    $('.modal-header').append('<p class="alert-success">'+data.message+'</p>'); 
                    window.location.href = "<?= $this->url('default_index') ?>";
                },
                error: function(data) { // status code <> 200 (NON OK)
                    console.log(data);
                    // écriture resultat ds modal header
                    $('.modal-header').append('<p class="alert-danger">'+data.responseJSON.message+'</p>');
                },
                complete: function() {      // exec quel que soit le status code

                }
        });    
    });
    
})