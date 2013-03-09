<?php

    require_once(get_template_directory() . '/instartius/insfuncs.inc');

    require_once(get_template_directory() . '/siteinfo.inc');

	// Register sidebars
	require_once(TEMPLATEPATH . '/sidebars-functions.php');
	InstartiusRegisterSidebars();

	require_once(TEMPLATEPATH . '/support-functions.php');
	InstartiusHabilitarSoportes();

	require_once(TEMPLATEPATH . '/filters-functions.php');
	InstartiusAgregarFiltros();

	require_once(TEMPLATEPATH . '/actions-functions.php');
	InstartiusAgregarAcciones();

	require_once(TEMPLATEPATH . '/post-functions.php');
	InstartiusAgregarFuncionesPost();

	// Author: Sergio Daniel Lozano
	// invite rss subscribers to comment
	function rss_comment_footer($content)
	{
		if (is_feed())
			if (comments_open())
				$content .= 'Comments are open! <a href="'.get_permalink().'">Add yours!</a>';
		return $content;
	}
	
	// Author: Sergio Daniel Lozano
	// Acceso rapido para incrustar contenido de otros componentes
	function content_place_holder($including)
	{
		include (TEMPLATEPATH . '/' . $including . '.php');
	}
	
	// Author: Sergio Daniel Lozano
	// Imprime un titulo adecuado para la pagina dependiendo del tipo de pagina cargada
	function get_good_title()
	{
		if ( is_category() )
			{
				echo 'Noticias de la Categoría &quot;'; 
				single_cat_title();
				echo '&quot; | '; 
				bloginfo( 'name' );
			}
			elseif ( is_tag() ) 
			{
				echo 'Noticias del Tag &quot;'; 
				single_tag_title(); 
				echo '&quot; | '; 
				bloginfo( 'name' );
			}
			elseif ( is_archive() ) 
			{
				wp_title(''); 
				echo ' Historial de Noticias | '; 
				bloginfo( 'name' );
			} 
			elseif ( is_search() )
			{
				echo 'Búsqueda de &quot;'.wp_specialchars($s).'&quot; | ';
				bloginfo( 'name' );
			} 
			elseif ( is_home() ) 
			{
				bloginfo( 'name' ); 
				echo ' | '; 
				bloginfo( 'description' );
			} 
			elseif ( is_404() ) 
			{
				echo 'Error 404 Elemento no Encontrado | '; 
				bloginfo( 'name' );
			} 
			elseif ( is_single() ) 
			{
				wp_title('');
			} 
			else
			{
				echo wp_title('');
				echo ' | ';
				bloginfo( 'name' );
			}
	}
	
	// Author: Sergio Daniel Lozano
	// Previene la carga directa de la pagina de comentarios
	function comments_validation()
	{
		if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) :
			die('Por favor no cargues esta página directamente. Gracias y que tengas un buen día!');
		endif;
	}
	
	// Author: Sergio Daniel Lozano García
	function commentli_classes()
	{
		if ($i & 1) { echo 'odd'; }
		else 		{ echo 'even'; }
		$user_info = get_userdata(1); 
		if ( $user_info -> ID == $comment -> user_id )
			echo 'authorComment';
		if ( $comment -> user_id > 0 )
			echo 'user-comment';
	}
?>