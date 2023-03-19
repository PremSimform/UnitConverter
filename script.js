$(document).ready(function () {
	function test() {
		var tabsNewAnim = $('#navbarSupportedContent');
		var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
		var activeItemNewAnim = tabsNewAnim.find('.active');
		var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
		var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
		var itemPosNewAnimTop = activeItemNewAnim.position();
		var itemPosNewAnimLeft = activeItemNewAnim.position();
		$(".hori-selector").css({
			"top": itemPosNewAnimTop.top + "px",
			"left": itemPosNewAnimLeft.left + "px",
			"height": activeWidthNewAnimHeight + "px",
			"width": activeWidthNewAnimWidth + "px"
		});
		$("#navbarSupportedContent").on("click", "li", function (e) {
			$('#navbarSupportedContent ul li').removeClass("active");
			$(this).addClass('active');
			var activeWidthNewAnimHeight = $(this).innerHeight();
			var activeWidthNewAnimWidth = $(this).innerWidth();
			var itemPosNewAnimTop = $(this).position();
			var itemPosNewAnimLeft = $(this).position();
			$(".hori-selector").css({
				"top": itemPosNewAnimTop.top + "px",
				"left": itemPosNewAnimLeft.left + "px",
				"height": activeWidthNewAnimHeight + "px",
				"width": activeWidthNewAnimWidth + "px"
			});
		});
	}
	setTimeout(function () { test(); });
	let path = window.location.pathname.split("/").pop();
	if (path == '') {
		path = 'index.html';
	}
	let target = $('#navbarSupportedContent ul li a[href="' + path + '"]');
	target.parent().addClass('active');
});
$(window).on('resize', function () {
	setTimeout(function () { test(); }, 500);
});
$(".navbar-toggler").click(function () {
	$(".navbar-collapse").slideToggle(300);
	setTimeout(function () { test(); });
});
