 /**
 * Theme functions file
 */
(function ($) {

    var $window = $(window);
 
    /**
    * Document ready (jQuery)
    */
    $(function () {

        var $header_continer_id = $('#header-slider'),
        	$header_resize 		= $('#header-slider .header-resize');
        	
		/*
		 * If Resize window
	     **/
	    if ( $header_continer_id.length){
	    	$window.on('resize', function () {
		
		            var $windowheight   = $window.height(),
		                $windowWidth    = $window.width();
		              
						//destktop
		                if ($windowWidth > 768 && $windowheight <= 500) {
		 
		                   	$windowheight = 500;
		                    
		                } else if ($windowWidth < 768 && $windowheight <= 300){
		               		
		               		$windowheight = 300;
		                }
		
		                $header_resize.height($windowheight);           
		    
		    }).resize();
	    }
        /**
         *  function menu 
         */
                //if resize window
                $('#header-menu').nav();

                // if click button menu 
                $('button.icon-button-small-menu').on('click', function(e){
        
                    var item = $(this).next();
        
                    item.toggleClass( item.data("class") + " small-menu" );
                    $( '#site-header' ).toggleClass( "menu-active" );
        
                    e.preventDefault();
                });
        
                // If Menu focus
                $( function() { $( '.horizontal' ).find( 'a' ).on( 'focus blur', function() {
                       $( this ).parents().toggleClass( 'focus' );
                   });
                });





        /**
        * Image Popup
        */
            //Translating magnificPopup
            $.extend(true, $.magnificPopup.defaults, {
              tClose: datalanuge.close, // Alt text on close button
              tLoading: datalanuge.load, // Text that is displayed during loading. Can contain %curr% and %total% keys
              gallery: {
                tPrev: datalanuge.prev, // Alt text on left arrow
                tNext: datalanuge.next, // Alt text on right arrow
                tCounter: '%curr% '+ datalanuge.of + ' %total%' // Markup for "1 of 7" counter
              },
              image: {
                tError: '<a href="%url%">'+ datalanuge.image +'</a>' + datalanuge.error_image // Error message when image could not be loaded
              },
              ajax: {
                tError: '<a href="%url%">'+ datalanuge.image +'</a>' + datalanuge.error_image // Error message when ajax request failed
              }
            });       
       
            // Single image
            $('.image-popup').magnificPopup({
              type:'image',
            });

            //Button to gallery    
            $('.gallery-popup').on('click', function () {
                $('.gallery').magnificPopup('open');
            });

            //Gallery image    
            $('.gallery').each(function () {
               
               $(this).magnificPopup({
                    delegate: 'a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]',
                    type: 'image',
                    gallery: {
                        enabled: true,
                    }
               });
            });
    
    
       /**
        * Slick slider
        */        
       
        // Header slider (slick)
            $('#slider').slick({
            	dots: false,
            	infinite: true,
				speed: 500,
				fade: true,
				cssEase: 'linear',
				autoplay: true,
				pauseOnHover: false           	
            });
            

        /**
        * Masonry Gird
        */            
        var $container = $('.gird-masonry');
        $container.imagesLoaded( function(){
        	
        	$("body").removeClass("preload");
        	
            $container.masonry({
                itemSelector : '.gird-item',
			  	columnWidth: '.gird-item',
		
			  	percentPosition: true                
            });
        });
        
		/*
		 * Sticke head bar
	     **/	
	     
	    var $header_offset = $('#menu-two').offset();  			    
		
		$window.scroll(function() {
		      if ( $window.scrollTop() > ($header_offset.top)){
		            $('body').addClass('fixed-menu');
		       } else {
		            $('body').removeClass('fixed-menu');
		       }        
		});         
        
		/*
		 * Show/hide - Overlay sidebar
	     **/	    
	    $( "a.show-overlay" ).click(function(e) {
	    	e.preventDefault();
  			$('#sidebar-overlay').addClass('active');
		});
	    $( "a.hide-overlay" ).click(function(e) {
	    	e.preventDefault();
  			$('#sidebar-overlay').removeClass('active');
		});  
		      
		/**
		* Activate rwd table.
		*/
	    $('.hentry table').table();        
        
    });


    /*******************
    * Function Section
    ********************/
	/**
	* Function rwd table.
	*/
    $.fn.table = function() {
        return this.each(function () {
        	var headertext = [];

			var $this = $(this);

			$this.find('thead td, th').each(function(){
         		headertext.push($(this).html());
			});

			$this.find('tbody tr').each(function(){
    				$(this).find('td').each(function(index){
        					$(this).attr('data-th', headertext[index]);
					});
			});
		});
	};

    /**
    * Function rwd nav.
    */
   $.fn.nav = function(nav) {
        return this.each(function () {

           var $this = $(this);

           	$window.on('resize orientationchange', function () {

           	var window_width = $window.width();

           		if (window_width > 768) {

					$classes = $this.data("class");

					// Usuwanie classy z menu
					if ($this.hasClass( "small-menu" )) {
						$( '#site-header' ).removeClass("menu-active");
						$this.removeClass();
						$this.addClass( $classes );
					 }
				}
			}).resize();
		});
  };
})( jQuery );