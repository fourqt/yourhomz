$(document).ready( function() {
   // create project page fix menu on scroll
    var stickyOffset = $('#stickypnav-outer .stickypnav').offset().top;
    var stickyOffsetz = $('#stickypnav-outer .stickypnav').offset().top - 60;
    $(window).scroll(function(){
      var sticky = $('#stickypnav-outer .stickypnav'),
          scroll = $(window).scrollTop();

      if (scroll >= stickyOffset) sticky.addClass('sticky');
      else sticky.removeClass('sticky');

      if (scroll >= stickyOffsetz) sticky.addClass('highz');
      else sticky.removeClass('highz');
    });
})