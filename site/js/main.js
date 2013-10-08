$(document).ready(function() {
    
    
    // SMOOTH SCROLLING FROM PAULUND.CO.UK
    $('a[href^="#"]').on('click',function (e) {
    	    e.preventDefault();

    	    var target = this.hash,
    	    $target = $(target);

    	    $('html, body').stop().animate({
    	        'scrollTop': $target.offset().top
    	    }, 900, 'swing', function () {
    	        window.location.hash = target;
    	    });
    	});
    
    
    
    
    

    // DOCUMENT WIDE FUNCTIONS
    $('#container').scrollspy({ target: '#sidebar' })
    
        
   
    var scrollPos = 0;
    
    $(window).scroll(function () { 
        scrollPos = $(window).scrollTop();
            // console.log(scrollPos);
            if (scrollPos > 100) {
                $('#path-crime').fadeIn();
                $('#path-economy').fadeIn();
                }
    });
    
    /*
    //OPEN THE CRIME PATH
    $('#path-crime').click(function() {
      $('#section-crime').animate({
        width: "800px",
        opacity: "1.0"
        }, 500, function() {
          //$('#path-crime').removeClass('path');
          $('#section-crime').show();
      });
      $('#section-economy').animate({
          width: "50px"
        }, 500, function() {
            //completion
        });
    });
    
    //OPEN THE ECONOMY PATH
    $('#path-economy').click(function() {
      $('#section-economy').animate({
        width: "800px",
        opacity: "1.0"
      }, 500, function() {
          //$('#path-economy').removeClass('path');
          $('#section-economy').show();
      });
      $('#section-crime').animate({
          width: "50px"
        }, 500, function() {
            //completion
        });
    });
    */
 
   
    
    $("[rel='tooltip']").tooltip();
    $("[rel='popover']").popover();

  
       
});




