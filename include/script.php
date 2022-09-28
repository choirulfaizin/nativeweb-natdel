    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="assets/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.themepunch.revolution.min.js"></script>
    <!-- FLEX SLIDER SCRIPTS  -->
    <script defer src="assets/js/jquery.flexslider-min.js"></script>
    <!-- Pretty Photo JS -->
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <!-- Respond JS for IE8 -->
    <script src="assets/js/respond.min.js"></script>
    <!-- HTML5 Support for IE -->
    <script src="assets/js/html5shiv.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/custom.js"></script>
    
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/classie.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/normal.js"></script>
    <script src="assets/js/portfolio-effects.js"></script>
    <script src="assets/js/slider-modernizr.js"></script>
    <script src="assets/js/toucheffects.js"></script>
    <!-- JS code for this page -->
    <script type="text/javascript">
        /* ******************************************** */
        /*  JS for SLIDER REVOLUTION  */
        /* ******************************************** */
        jQuery(document).ready(function() {
            jQuery('.tp-banner').revolution(
                {
                    delay:9000,
                    startheight:500,
                    
                    hideThumbs:10,
                    
                    navigationType:"bullet",	
                    
                    
                    hideArrowsOnMobile:"on",
                    
                    touchenabled:"on",
                    onHoverStop:"on",
                    
                    navOffsetHorizontal:0,
                    navOffsetVertical:20,
                    
                    stopAtSlide:-1,
                    stopAfterLoops:-1,
                    
                    shadow:0,
                    
                    fullWidth:"on",
                    fullScreen:"off"
                });
        });
        /* ******************************************** */
        /*  JS for FlexSlider  */
        /* ******************************************** */
        
        $(window).load(function(){
            $('.flexslider-recent').flexslider({
                animation:		"fade",
                animationSpeed:	1000,
                controlNav:		true,
                directionNav:	false
            });
            $('.flexslider-testimonial').flexslider({
                animation: 		"fade",
                slideshowSpeed:	5000,
                animationSpeed:	1000,
                controlNav:		true,
                directionNav:	false
            });
        });
        
        /* Gallery */
        
        jQuery(".gallery-img-link").prettyPhoto({
            overlay_gallery: false, social_tools: false
        });
    </script>