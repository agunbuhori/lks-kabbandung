$(function() {
	$(window).scroll(function() {
		if ($(this).scrollTop() >= $('#header').height()) {
			$('#header').addClass('fixed').css({top: -parseInt($('#header').height())+parseInt($('#navigation').height())});
		} else {
			$('#header').removeClass('fixed');
		}
	});

	$('#menu-nav-collapse').click(function(event) {
		event.preventDefault();

		$('#navigation li').toggleClass('collapsed', 300);
	});
});