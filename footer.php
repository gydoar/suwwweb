



<footer>
	<p>HECHO CON&nbsp;<img width="11" src="<?php bloginfo('template_url' ); ?>/library/img/corazon.png" alt="">&nbsp;POR <a target="_blank" href="http://suwwweb.com">SUWWWEB</a></p>
</footer>




<!-- script -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url' ); ?>/library/js/modernizr-custom-min.js"></script>

<!--/ script -->

<!-- Scripts Adiconales -->

<!-- Menu responsive -->

 <script>
        $(function() {
     
        var btn_movil = $('#nav-mobile'),
        menu = $('#menu').find('ul');
     
        // Al dar click agregar/quitar clases que permiten el despliegue del menú
        btn_movil.on('click', function (e) {
            e.preventDefault();
     
            var el = $(this);
     
            el.toggleClass('nav-active');
            menu.toggleClass('open-menu');
        });
    });
  </script>

<!--/ Menu responsive -->

<script src="<?php bloginfo('template_url' ); ?>/library/js/owl-carousel.js"></script>

<script>
	$(document).ready(function() {
 
	  $("#owl-demo").owlCarousel({
	 
	      navigation : true, // Show next and prev buttons
	      slideSpeed : 300,
	      paginationSpeed : 400,
	      singleItem:true
	 
	      // "singleItem:true" is a shortcut for:
	      // items : 1, 
	      // itemsDesktop : false,
	      // itemsDesktopSmall : false,
	      // itemsTablet: false,
	      // itemsMobile : false
	 
	  });
	 
	});
</script>

<!--/ Scripts Adiconales -->

<?php wp_footer(); ?>

</body>
</html>