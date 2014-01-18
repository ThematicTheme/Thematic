( function( $ ) {
	/**
	 * Enables menu toggle for small screens.
	 */
	( function() {
		var nav = $( '#access' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.sf-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
	
	/**
	 * Enable superfish on larger screens, but only if it exists
	 * 
	 * See @link{http://stackoverflow.com/questions/6748301/disable-superfish-on-resize-event}
	 */
	( function() {
		var body = $( 'body' );
		var breakpoint = parseInt( thematicOptions.mobileMenuBreakpoint );
		var sf = $( 'ul.sf-menu' );
		
		// only activate superfish if scripts are loaded
		if( typeof( sf.superfish ) === 'function' ) {

			if( body.width() >= breakpoint ) {
				
				// enable superfish when the page first loads if we're on desktop
				sf.superfish({ 
					animation:    thematicOptions['superfish'].animation, 
					hoverClass:   thematicOptions['superfish'].hoverClass,
					pathClass:    thematicOptions['superfish'].pathClass,
					pathLevels:   parseInt( thematicOptions['superfish'].pathLevels ),
					delay:        parseInt( thematicOptions['superfish'].delay ),
					speed:        thematicOptions['superfish'].speed,
					cssArrows:    thematicOptions['superfish'].cssArrows,
					disableHI:    thematicOptions['superfish'].disableHI
				});
			}

			$( window ).resize( function() {
				if( body.width() >= breakpoint && !sf.hasClass('sf-js-enabled') ) {
					// you only want SuperFish to be re-enabled once (sf.hasClass)
					sf.superfish( 'init' );
				} else if( body.width() < breakpoint ) {
					// smaller screen, disable SuperFish
					sf.superfish( 'destroy' );
				}
			});
		}
	} )();
} )( jQuery );