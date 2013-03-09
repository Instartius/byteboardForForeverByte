<?php
	// Author: Sergio Daniel Lozano
	// Remueve informacion detallada de error de Login por seguridad
	function RemoverDetallesErrorLogin()
	{
		add_filter( 'login_errors' , create_function('$a' , "return null;") );	
	}

	// Author: Sergio Daniel Lozano García
	// Remueve la version de Wordpress del Header por seguridad
	function OcultarVersionWordpress()
	{	
		function InstartiusRemoverVersionWordpress() 
		{
			return '<!--Construido por Instartius Corporation-->';
		}
		add_filter('the_generator', 'InstartiusRemoverVersionWordpress');	
	}

	// Author: Sergio Daniel Lozano
	// Remueve los rastros del conteo de comentarios
	function RemoverTrackbacksConteoComentarios()
	{
		function comment_count( $count )
		{
			if ( ! is_admin() )
			{
				global $id;
				$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
				return count($comments_by_type['comment']);
			} 
			else return $count;
		}
		add_filter('get_comments_number', 'comment_count', 0);	
	}

	// Author: Sergio Daniel Lozano
	// Custom excerpt ellipses for 2.9+
	function PersonalizarExcerptMore()
	{
		function custom_excerpt_more($more)
		{
			return 'Read More &raquo;';
		}
		add_filter('excerpt_more', 'custom_excerpt_more');
	}

	// Author: Sergio Daniel Lozano
	// No more jumping for read more link
	function PersonalizarTextoLeerMas()
	{
		function no_more_jumping($post)
		{
			return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'&nbsp; Continue Reading &raquo;'.'</a>';
		}
		add_filter('excerpt_more', 'no_more_jumping');
	}

	// Author: Sergio Daniel Lozano
	// Category id in body and post class
	function CategoriaIDBodyPostClass()
	{
		function category_id_class($classes)
		{
			global $post;
			foreach( (get_the_category($post->ID)) as $category)
				$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
		}
		add_filter('post_class', 'category_id_class');
		add_filter('body_class', 'category_id_class');
	}

	// Author: Sergio Daniel Lozano
	// Agrega una clase al post si hay un thumbnail
	function AgregarClasePostSiTieneThumbnail()
	{
		function has_thumb_class($classes)
		{
			global $post;
			if( has_post_thumbnail($post->ID) ) 
				$classes[] = 'has_thumb';
			return $classes;
		}
		add_filter('post_class', 'has_thumb_class');
	}

	// Author: Sergio Daniel Lozano
	// Agrega todos los filtros descritos en el script
	function InstartiusAgregarFiltros()
	{
		RemoverDetallesErrorLogin();
		OcultarVersionWordpress();
		RemoverTrackbacksConteoComentarios();
		PersonalizarExcerptMore();
		PersonalizarTextoLeerMas();
		CategoriaIDBodyPostClass();
		AgregarClasePostSiTieneThumbnail();
	}
?>