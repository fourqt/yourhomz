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
   
   $(window).load(function(){
   var sticky = $('#stickypnav-outer .stickypnav'),
       scroll = $(window).scrollTop();

   if (scroll >= stickyOffset) sticky.addClass('sticky');
   else sticky.removeClass('sticky');

   if (scroll >= stickyOffsetz) sticky.addClass('highz');
   else sticky.removeClass('highz');
   });


   // create project page fix footer button on scroll
   var stickyfOffset = $('#ppager').offset().top + 56;
   $(window).scroll(function(){
      var stickyf = $('#ppager'),
         scrollf = $(window).scrollTop() + $(window).height();

      if (scrollf <= stickyfOffset) stickyf.addClass('sticky');
      else stickyf.removeClass('sticky');
   });

   $(window).load(function(){
      var stickyf = $('#ppager'),
         scrollf = $(window).scrollTop() + $(window).height();

      if (scrollf <= stickyfOffset) stickyf.addClass('sticky');
      else stickyf.removeClass('sticky');
   });


   // $('#ppager .previous, #ppager .next').click(function(){
   //    setTimeout(function(){
   //       $('#ppager').removeClass('sticky');
   //       var stickyfOffset = $('#ppager').offset().top + 56;
   //       var stickyf = $('#ppager'),
   //          scrollf = $(window).scrollTop() + $(window).height();
   //       if (scrollf <= stickyfOffset) stickyf.addClass('sticky');
   //       else stickyf.removeClass('sticky');
   //    },600);
   // });
   
   


})