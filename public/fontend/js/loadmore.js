jQuery(function($){
	$('body').on('click', '.loadmore', function() {
 
		var button = $(this);
		var data = {
			'action': 'avid_magazine_loadmore',
			'page' : avid_magazine_loadmore_params.current_page,
			'cat' : avid_magazine_loadmore_params.cat
		};
 
		$.ajax({
			url : avid_magazine_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success : function( data ) {
				if( data ) { 
					$( 'div.blog-list-block' ).append(data);
					button.text( 'More Posts' );
					avid_magazine_loadmore_params.current_page++;
 
					if ( avid_magazine_loadmore_params.current_page == avid_magazine_loadmore_params.max_page ) { 
						button.remove();
					}
				} else {
					button.remove();
				}
			}
		});
	});
});