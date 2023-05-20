jQuery(document).ready(function($){
	"use strict";
    
    let $biddingContainer = $('.bidding-history-results');
    let $bidInput = $('input[name="bid"]');
    let $advertId = $('input[name="advert_id"]');

	/* BIDDING RESPONSE */
	$(document).on('bidding-response', function(e, response){
		if( response.price ){
            updateAuctionData( response );
            $bidInput.val('');
		}
	});

    function updateAuctionData(data)
    {
        let $price = $('.single-price-wrap .price');
        $price.after( data.price );
        $price.remove();

        $biddingContainer.html(data.bids);
        $bidInput.attr( 'placeholder', data.min_bid_text );
        $bidInput.attr( 'min', data.min_bid );
    }

    function auctionUpdate()
    {
        $.ajax({
            url: adifier_data.ajaxurl,
            method: 'POST',
            data: {
                action: 'adifier_update_auction',
                advert_id: $advertId.val(),
                adifier_nonce: adifier_data.adifier_nonce,
            },
            dataType: 'JSON',
            success: function( response ){
                updateAuctionData( response );
            },
        })
    }

    if( $('.bidding-form').length > 0 )
    {
        auctionUpdate();
        setInterval(function(){
            auctionUpdate();
        }, 30000);
    }

	$(document).on('bidding-history-response', function(e, response){
		$('.bidding-history-results').append( response.message );
		if( response.next_page ){
			$('.bidding-history').text( response.btn_text );
			$('input[name="bidpage"]').val( response.next_page );
		}
		else{
			$('.bidding-history').remove();
		}
	});

	/* CONTACT BUYER AFTER AUCITON ENDS */
	$(document).on('click', '.contact-buyer', function(e){
		if( $(this).attr('href').indexOf('http') == -1 ){
	    	e.preventDefault();
	    	$('#contact-buyer input[name="buyer_id"]').val( $(this).data('buyer_id') );
	    	$('#contact-buyer').modal('show');
		}
	});
});