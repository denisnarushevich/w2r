$(document).ready(function() {

	$("#tab_container > div").hide();
	$("#tabs li:first").addClass("active").show();
	$("#tab_container div:first").show();
	
	$("#tabs li").click(function() {
		$("#tabs li").removeClass("active");
		$(this).addClass("active");
		$("#tab_container > div").hide();
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		return false;
	});

});