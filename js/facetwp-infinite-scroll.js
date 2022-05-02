jQuery(function ($) {
	var intBottomMargin = 400; // Pixels from bottom when script should trigger
	setInterval(() => {
		if (($(window).scrollTop() >= $(document).height() - $(window).height() - intBottomMargin)
			&& (!$(".facetwp-load-more").hasClass("loading"))
			&& (!$(".facetwp-load-more").hasClass("facetwp-hidden"))
		) {
			$(".facetwp-load-more").addClass('loading');
			$(".facetwp-load-more").click(); // trigger click
// the class is automatically removed, as the button is recreated, as soon as it loaded the products
		}
	}, 1000);
});
