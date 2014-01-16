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

		$( '.menu-toggle' ).on( 'click.twentythirteen', function() {
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
		var breakpoint = 600;
		var sf = $( 'ul.sf-menu' );
		
		// only activate superfish if scripts are loaded
		if( typeof( sf.superfish ) === 'function' ) {
			
			if( body.width() >= breakpoint ) {
				
				// enable superfish when the page first loads if we're on desktop
				sf.superfish({ 
					animation:  {opacity:'show',height:'show'},    // fade-in and slide-down animation 
					hoverClass: sfOptions['superfish'].hoverClass,         
					pathClass:  sfOptions['superfish'].pathClass,
					pathLevels: parseInt( sfOptions['superfish'].pathLevels ),                 
					delay:      parseInt( sfOptions['superfish'].delay ),               
					speed:      sfOptions['superfish'].speed,            
					speedOut:   sfOptions['superfish'].speedOut,            
					cssArrows:  sfOptions['superfish'].cssArrows,             
					disableHI:  sfOptions['superfish'].disableHI               
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