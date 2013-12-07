

/* Recent post carousel (CarouFredSel) */

/* Carousel */
$('#carousel_container').carouFredSel({
          responsive: true,
          width: '96%',
         scroll: 1,
          delay: 10000,
      duration: 10000,
          items: {
            width: 180,
          //  height: '30%',  //  optionally resize item-height
            visible: {
              min: 2,
              max: 5
            }
          },
          auto: {
            pauseOnHover: 'resume',
            progress: '#timer1'
          },
            prev : {
      button  : "#car_prev",
      key   : "left"
   },
   next : {
      button  : "#car_next",
      key   : "right"
   }
  });
/* Support */

$("#slist").click(function(e){
   e.preventDefault();
   $(this).next('p').toggle(200);
});