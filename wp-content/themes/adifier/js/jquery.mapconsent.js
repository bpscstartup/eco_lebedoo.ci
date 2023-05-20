(function( $ ) {
    document.addEventListener('cmplz_status_change', function (e) {
        if (e.detail.category === 'functional' && e.detail.value==='allow') {
            location.reload();
        }
    });
 
}( jQuery ));