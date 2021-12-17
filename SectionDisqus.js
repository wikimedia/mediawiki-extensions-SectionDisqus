window.showDisqusDialog = function ( tooltip ) {

	// eslint-disable-next-line no-undef
	$( '#disqus_dialog' ).dialog( {
		width: 800,
		position: 'top'
	} );

	// Use the URL (without parameters) plus the section tooltip as identifier
	var identifier = location.protocol + '//' + location.hostname + location.pathname + '#!' + tooltip;

	// Reset Disqus to show the thread corresponding to the clicked section
	// eslint-disable-next-line no-undef
	DISQUS.reset( {
		reload: true,
		config: function () {
			this.page.identifier = identifier;
		}
	} );
};
