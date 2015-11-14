$(document).ready(function() {
//open document ready

	$('a#aside-nav-btn').click(function (e) {
			$('body').addClass('sidenav');
			e.preventDefault();
	});

	$('#sidemenu-container').click(function(e){
			$('body').removeClass('sidenav');
	});

	// project page fix menu on scroll
	var stickyOffset = $('#project-nav').offset().top;
	$(window).scroll(function(){
		var sticky = $('#project-nav'),
				scroll = $(window).scrollTop();

		if (scroll >= stickyOffset) sticky.addClass('sticky');
		else sticky.removeClass('sticky');
	});
	$(window).load(function(){
		var sticky = $('#project-nav'),
				scroll = $(window).scrollTop();

		if (scroll >= stickyOffset) sticky.addClass('sticky');
		else sticky.removeClass('sticky');
	});

	// scroll to # tag function
	$('a[href^="#"].scrollhash').on('click',function (e) {
			e.preventDefault();

			var target = this.hash;
			var $target = $(target);
			var targetOffset = $target.offset().top - 65;
			$('html, body').stop().animate({scrollTop: targetOffset}, 900, 'swing');
	});
		
//close document ready
});

// -- angular apps -- //
var app = angular.module("projApp", []);
// angular controllers
	app.controller("projCtrl", function($scope, $http) {
		$scope.tabActive = 1;
		//$http.get('../detailjson/3').
		//success(function(data, status, headers, config) {
		//$scope.detail = data;
	//});
	});