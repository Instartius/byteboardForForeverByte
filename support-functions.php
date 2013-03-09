<?php
	// Author: Sergio Daniel Lozano
	// Soporte de Thumbnails
	function AgregarSoportePostThumbnails()
	{
		add_theme_support( 'post-thumbnails' );	
	}

	// Author: Sergio Daniel Lozano
	// Agrega el thumbnail de los post a los feeds RSS
	function AgregarSoportePostRSSThumbnails()
	{
		function RSSPostThumbnail($content)
		{
			global $post;
			if( has_post_thumbnail( $post->ID ) )
				$content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . get_the_content();
			return $content;
		}
		add_filter('the_excerpt_rss', 'RSSPostThumbnail');
		add_filter('the_content_feed', 'RSSPostThumbnail');
	}
	
	// Author: Sergio Daniel Lozano
	// Habilita el soporte de menus de navegacion personalizados
	function AgregarSoporteMenuPersonalizado()
	{
		add_theme_support('menus');
		if ( function_exists('register_nav_menus') ) 
		{
	  		register_nav_menus
			(
	  			array
				(
	  				'ins-header-menu'		=> 'InsHeader Menu',
	  				'ins-sidebar-menu'		=> 'InsSidebar Menu',
	  				'ins-footer-menu'		=> 'InsFooter Menu',
	  				'ins-brand-menu'		=> 'InsBrandBlogs Menu',
	  				'ins-logged-in-menu'	=> 'InsLoggedIn Menu'
	  			)
	  		);
		}
	}

	// Author: Sergio Daniel Lozano
	// Habilita el soporte para background personalizados
	function AgregarSoporteBackgroundPersonalizado()
	{
		add_custom_background();
	}

	// Author: Sergio Daniel Lozano
	// Habilita el soporte para Imagen de Encabezado
	function AgregarSoporteImageHeader()
	{
		define('NO_HEADER_TEXT', true );
		define('HEADER_IMAGE', '%s/images/default-header.png'); // %s is the template dir uri
		define('HEADER_IMAGE_WIDTH', 320);
		define('HEADER_IMAGE_HEIGHT', 100);
		// Gets included in the admin header
		function AdminHeaderStyle()
		{
?>
			<style type="text/css">
				#headimg
				{
					width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
					height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
				}
			</style>
<?php
		}
		add_custom_image_header( '', 'AdminHeaderStyle' );
	}

	// adds Post Format support
	// learn more: http://codex.wordpress.org/Post_Formats
	// add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );

	// Author: Sergio Daniel Lozano
	// Ejecuta todos los soportes
	function InstartiusHabilitarSoportes()
	{
		AgregarSoportePostThumbnails();
		AgregarSoportePostRSSThumbnails();
		AgregarSoporteMenuPersonalizado();
		AgregarSoporteBackgroundPersonalizado();
		AgregarSoporteImageHeader();
	}
?>