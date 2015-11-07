$(document).ready( function() {
   // create project page fix menu on scroll
    var stickyOffset = $('#stickypnav-outer .stickypnav').offset().top;
    $(window).scroll(function(){
      var sticky = $('#stickypnav-outer .stickypnav'),
          scroll = $(window).scrollTop();

      if (scroll >= stickyOffset) sticky.addClass('sticky');
      else sticky.removeClass('sticky');
    });
    $(window).load(function(){
      
    });
})