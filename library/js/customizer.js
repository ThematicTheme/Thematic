/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#blog-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.tagline' ).text( to );
		} );
	} );
	wp.customize('thematic_theme_opt[footer_txt]',function( value ) {
        value.bind(function(to) {
            $('#siteinfo').html(to);
        });
    });
} )( jQuery );