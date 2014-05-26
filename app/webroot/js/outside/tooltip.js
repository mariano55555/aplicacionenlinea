function showTooltip(x, y, contents) {
	$('<div id="tooltip" class="flot-tooltip tooltip"><div class="tooltip-arrow"></div>' + contents + '</div>').css( {
		top: y - 43,
		left: x - 15,
	}).appendTo("body").fadeIn(200);
}


$(document).ready(function() {

	

// Calendar

});

$(window).resize(function(){
	// console.log($(window).width());
});