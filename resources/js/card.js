if($('.product-card')){ 
$(document).ready(function(){
    // Lift card and show stats on Mouseover
    $('.product-card').hover(function(){
        $(this).addClass('animate');
        $(this).find('.view_details').addClass('visible');
    }, function(){
        $(this).removeClass('animate');
        $(this).find('.view_details').removeClass('visible');
    }); 

    // Redirect to the desired route when clicking "View Details"
    // $(document).on('click', '.view_details', function(){
    //     // Redirect to the desired route
    //     var announcementId = $(this).data('announcement-id'); // Assumi che ci sia un attributo data con l'id dell'annuncio
    //     window.location.href = "/announcements/" + announcementId; // Aggiorna con la tua rotta desiderata
    // });
});
}