var returnFocusTo = window.returnFocusTo || null;
// focus into svg path/use is a thing for some reason
$("svg *").attr("tabindex", -1);

$b.on('keyup', function(e){
	if(window.helpers.isEscape(e)) {
		// close things then return focus
		window.helpers.returnFocus();
	}
});