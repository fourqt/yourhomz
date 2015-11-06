$(document).ready(function() {
//open document ready
    $('#collapseOne .imgd button').click(function(){
        $('#collapseOne .imgd button').removeClass('active');
        $(this).addClass('active');
        $('#collapseOne .imgd a').toggleClass('hidden');
    });

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