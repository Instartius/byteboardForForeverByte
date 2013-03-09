<?php
	add_action( 'init', 'crearTipoFichaTecnica' );
	
	function crearTipoFichaTecnica() 
	{
		$labels =	array
					(
						'name'			=>	__( 'Fichas Tecnicas' ),
						'singular_name'	=>	__( 'Ficha Tecnica' ),
						'add_new'		=>	__('Agregar nueva'),
						'add_new_item'	=>	__('Agregar nueva ficha tecnica'),
						'edit_item'		=>	__('Editar ficha tecnica'),
						'new_item'		=>	__('Nueva ficha tecnica'),
						'view_item'		=>	__('Ver ficha tecnica'),
						'search_items'	=>	__('Buscar fichas tecnicas'),
						'not_found'		=>	__('No se encontraron fichas tecnicas')
					);

		$customPostRegisterArgs =	array
									(
										'labels'				=> $labels,
										'public'				=> true,
										'has_archive'			=> true,
										'publicly_queryable'	=> true
									);

		register_post_type	( 'ficha_tecnica', $customPostRegisterArgs );
	}

	function InstartiusBuildPanels( $panels )
	{
		global $InstartiusPanels;
		if(is_array($panels))
		{
			$InstartiusPanels = $panels;
			add_action('admin_menu', 'InstartiusCreateMetaboxes');
			add_action('save_post', 'InstartiusSavePostdata');
		}
	}

	function InstartiusCreateMetaboxes()
	{
		global $InstartiusPanels, $theme_name;
		if( function_exists('add_meta_box') )
		{
			foreach($InstartiusPanels as $panel)
			{
				if($panel['post_kind'] != '')
					$postKindToAddPanel = $panel['post_kind'];
				else 
					$postKindToAddPanel = 'post';

				if($panel['name'] != '')
					$metaName = $panel['name'];
				else 
					$metaName = 'Instartius Options';

				$postKinds = explode(",", $postKindToAddPanel);

				foreach($postKinds as $postKind)
					add_meta_box	(	'instartius-meta-boxes', 
										__('Panel de personalización de Instartius'), 
										'InstartiusRenderMetaboxes', 
										trim($postKind), 
										'normal', 'high'
									);
			}
		}
	}

	function IsTheJustPostType($post_kind, $post_type)
	{
		$bothArePost = trim($post_kind) == 'post' && $post_type == '';
		$bothAreSame = $post_type == trim($post_kind);
		return $bothArePost ||  $bothAreSame;
	}

	function InstartiusRenderMetaboxes() 
	{
		global $post, $InstartiusPanels;
		echo '<div id="instartius-meta-box-tabs">';
		echo '<ul class="ilc-htabs instartius-tabs-heading">';

		// Render de los Paneles (tabs) del Metabox

		foreach($InstartiusPanels as $panel)
			if( IsTheJustPostType($panel['post_kind'], $_GET['post_type']) ) // Si el panel es del tipo de post del editor que se esta cargando, entonces
				echo '<li><span><a id="' . sanitize_title($panel['name']) . 't" href="#' . sanitize_title($panel['name']) . '">' . $panel['name'] . '</a></span></li>'; // Cargue el panel
		
		echo '</ul>';
		echo '<div class="ilc-btabs instartius-tabs-body">';

		foreach($InstartiusPanels as $panel)
		{
			$postKinds = explode(",", $panel['post_kind']);
			$justPostType = false;
			foreach($postKinds as $postKind)
			{
				if(get_post_type($post))
					if(get_post_type($post) == $postKind)
						$justPostType = true;
				else
					if( IsTheJustPostType($panel['post_kind'], $_GET['post_type']) )
						$justPostType = true;
			}
			
			if($justPostType)
			{
?>
				<div id="<?php echo sanitize_title($panel['name']); ?>" class="ilc-tab instartius_panel">
					<div class="inside">
						<input type="hidden" name="instartius_proper_save" value="true" />
							<script type='text/javascript'>
        						// instartius Directory and Full Path
        						var app_url = "<?php echo get_template_directory_uri(); ?>/instartius/";
        						var theme_url = "<?php echo get_template_directory_uri(); ?>/";
        						var blog_url = "<?php echo site_url(); ?>/";
        						var complete_status = true;
        						var current_obj = "";
							</script> 
							<script type="text/javascript">
								jQuery(
									function($)
									{
										var complete_status = false;
										$(".instartius_upload_image").click
										(
											function(e)
											{
												//$("#instartius_upload_image").
											}
										);
										$(".instartius_field .preview-icon").click
										(
											function(e)
											{
												e.preventDefault();
												$(this).parent().find(".selected").removeClass("selected");
												$(this).addClass("selected");
												$(this).parent().find(".val").val($(this).find("img").attr("alt"));
											}
										);
										$(".instartius_field .query_category_single, .instartius_field .query_category").blur
										(
											function(e)
											{
												$(this).parent().find(".val").val($(this).val());
											}
										);
<?php foreach($panel['fields'] as $meta_box): ?>
	<?php if($meta_box['type'] == "image"): ?>
										$("#instartius_upload_image_<?php echo $meta_box['name']; ?>").uploadify
										(
											{
												"uploader": "<?php echo get_template_directory_uri(); ?>/instartius/scripts/uploadify.swf",
												"script": "<?php echo get_template_directory_uri(); ?>/instartius/instartius-ajax.php?upload-wordpress=true",
												"folder": "uploads",
												"cancelImg": "",
												"height": "23",
												"width": "66",
												"method": "POST",
												"hideButton": true,
												"wmode": "transparent",
												"fileDesc": "Image Files",
												"fileExt": "*.jpg;*.jpeg;*.gif;*.png",
												"multi": true,
												"sizeLimit": 100 * 1024 * 1024,
												"auto": true
											}
										);
										$("#instartius_upload_image_<?php echo $meta_box['name']; ?>").bind
										(
											{
												"uploadifySelect": function (a, b, c) 
												{
													showAlert()
												},
												"uploadifyOpen": function (a, b, c) {},
												"uploadifyError": function (a, b, c, d) {},
												"uploadifyProgress": function (a, b, c, d) {},
												"uploadifyCancel": function (a, b, c, d) 
												{
													hideAlert()
												},
												"uploadifyComplete": function (a, b, c, d, e) 
												{
													d = d.replace("%uFEFF","");
													var f = $.trim(decodeURI(d));
                                    				var file = f.replace("%3A",":");
													f = f.replace("%3A",":");
													f = f.replace("%3A",":");
													hideAlert();
													$(this).parent().parent().find(".instartius_upload_field").val(f);
													$(this).parent().parent().parent().find(".instartius_upload_preview").html("<img src=\'<?php echo get_template_directory_uri(); ?>/instartius/img.php?w=40&h=40&src=" + f + "\' alt=\'" + f + "\' />").fadeIn(200);
												}
											}
										);
	<?php endif; ?>
<?php endforeach; ?>                            
										function showAlert() 
										{
											$(".alert").addClass("busy").fadeIn(800)
										}
										function hideAlert() 
										{
											$(".alert").removeClass("busy").addClass("done").delay(800).fadeOut
											(
												800,
												function() 
												{
													$(this).removeClass("done")
												}
											)
										}
									}
								);
							</script>
							<!-- alerts -->
							<div class="alert"></div> 
							<!-- /alerts -->
<?php foreach($panel['fields'] as $meta_box): ?>
	<?php $meta_value = get_post_meta($post->ID, $meta_box['name'], true); ?>                
	<?php if($meta_box['type'] == 'image') { ?>
								<input type="hidden" name="<?php echo $meta_box['name']; ?>_noncename" id="<?php echo $meta_box['name']; ?>'_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ); ?>" />
								<div class="instartius_field_row clearfix">
									<div class="instartius_field_title"><?php echo $meta_box['title']; ?></div>
									<div class="instartius_field">
										<input type="text" name="<?php echo $meta_box['name']; ?>" value="<?php echo $meta_value; ?>" size="55" class="instartius_input_field instartius_upload_field" />
										<span class="instartius_upload_buttons">
												<a href="#" class="button button-highlighted"><?php _e('Upload', 'instartius'); ?></a>
												<a href="#" id="instartius_upload_image_<?php echo $meta_box['name']; ?>" class="button button-highlighted">swf</a>
										</span><br />
										<span class="instartius_field_description"><?php echo $meta_box['description']; ?></span>
									</div>
		<?php if($meta_value != ""): ?>
									<div class="instartius_upload_preview" style="display:block;"><?php instartius_image('w=40&h=40&src='.$meta_value); ?></div>
		<?php else: ?>
									<div class="instartius_upload_preview"></div>
		<?php endif; ?>
								</div><!--/instartius_field_row -->
	<?php } else if($meta_box['type'] == 'dropdown') { ?>
								<input type="hidden" name="<?php echo $meta_box['name']; ?>_noncename" id="<?php echo $meta_box['name']; ?>'_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ); ?>" />
								<div class="instartius_field_row clearfix">
									<div class="instartius_field_title"><?php echo $meta_box['title']; ?></div>
									<div class="instartius_field">
										<select name="<?php echo $meta_box['name']; ?>">
		<?php foreach($meta_box['meta'] as $option): ?>
			<?php if($option['value'] == $meta_value){ $selected = "selected='selected'"; } else { $selected = ""; } ?>
											<option value="<?php echo $option['value']; ?>" <?php echo $selected; ?>><?php echo $option['name']; ?></option>
		<?php endforeach; ?>
										</select>
										<span class="instartius_field_description"><?php echo $meta_box['description']; ?></span>
									</div>
								</div><!--/instartius_field_row -->
	<?php } else if($meta_box['type'] == 'textbox') { ?>
								<input type="hidden" name="<?php echo $meta_box['name']; ?>_noncename" id="<?php echo $meta_box['name']; ?>'_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ); ?>" />
								<div class="instartius_field_row clearfix">
									<div class="instartius_field_title"><?php echo $meta_box['title']; ?></div>
									<div class="instartius_field">
		<?php 
			if($meta_box['meta']['size'] != '' && $meta_box['meta']['size'] == 'small')
			{
				$class = "small";	
			} 
			else 
			{
				$class = "";
			}
		?>
										<input type="text" name="<?php echo $meta_box['name']; ?>" value="<?php echo $meta_value; ?>" size="55" class="instartius_input_field <?php echo $class; ?>" />
										<span class="instartius_field_description"><?php echo $meta_box['description']; ?></span>
									</div>
								</div><!--/instartius_field_row -->
	<?php } else if($meta_box['type'] == 'checkbox'){ ?>
								<input type="hidden" name="<?php echo $meta_box['name']; ?>_noncename" id="<?php echo $meta_box['name']; ?>'_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ); ?>" />
								<div class="instartius_field_row clearfix">
									<div class="instartius_field_title"><?php echo $meta_box['title']; ?></div>
		<?php if($meta_value){ $checked = "checked='checked'"; } else { $checked = ""; } ?>
									<div class="instartius_field">
										<input type="checkbox" name="<?php echo $meta_box['name']; ?>" <?php echo $checked; ?> class="" />
										<span class="instartius_checkbox_description"><?php echo $meta_box['description']; ?></span>
									</div>
								</div><!--/instartius_field_row -->
	<?php } else if($meta_box['type'] == 'layout'){ ?>
                        		<input type="hidden" name="<?php echo $meta_box['name']; ?>_noncename" id="<?php echo $meta_box['name']; ?>'_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ); ?>" />
								<div class="instartius_field_row clearfix">    
									<div class="instartius_field_title"><?php echo $meta_box['title']; ?></div>
									<div class="instartius_field">
		<?php foreach($meta_box['meta'] as $options){ ?>
			<?php
				if(($meta_value == "" || !$meta_value || !isset($meta_value)) && $options['selected'])
					$meta_value = $options['value'];
				if($meta_value == $options['value'])
					$class = "selected";
				else 
					$class = "";
			?>
										<a href="#" class="preview-icon <?php echo $class; ?>">
											<img src="<?php echo get_template_directory_uri()."/".$options['img']; ?>" alt="<?php echo $options['value']; ?>"  />
										</a>
		<?php } ?>
										<input type="hidden" name="<?php echo $meta_box['name']; ?>" value="<?php echo $meta_value; ?>" class="val" />
										<span class="instartius_field_description"><?php echo $meta_box['description']; ?></span>
									</div>
								</div>
	<?php } else if($meta_box['type'] == 'query_category'){ ?>                                
								<input type="hidden" name="<?php echo $meta_box['name']; ?>_noncename" id="<?php echo $meta_box['name']; ?>'_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ); ?>" />
								<div class="instartius_field_row clearfix">    
									<div class="instartius_field_title"><?php echo $meta_box['title']; ?></div>
									<div class="instartius_field">
		<?php echo preg_replace('/>/', '><option></option>', wp_dropdown_categories(array("class"=>"query_category_single","show_option_all"=>"All Categories","hide_empty"=>0, "echo"=>0,"name"=>$meta_box['name'],"selected"=>$meta_value)), 1); ?> 
		or 
										<input type="text" class="query_category" value="<?php echo $meta_value; ?>" />
										<input type="hidden" value="<?php echo $meta_value; ?>" name="<?php echo $meta_box['name']; ?>" class="val" />
										<span class="instartius_field_description"><?php echo $meta_box['description']; ?></span>
									</div>
								</div>
	<?php } else if($meta_box['type'] == 'sidebar_visibility'){ ?>
                    			<input type="hidden" name="<?php echo $meta_box['name']; ?>_noncename" id="<?php echo $meta_box['name']; ?>'_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ); ?>" />
								<div class="instartius_field_row clearfix">    
									<div class="instartius_field_title"><?php echo $meta_box['title']; ?></div>
									<div class="instartius_field">
		<?php 
			$sidebars = get_option('sidebars_widgets');
			global $wp_registered_sidebars;
			foreach($sidebars as $sidebar => $val)
			{
				if($sidebar != 'wp_inactive_widgets' && $sidebar != 'array_version' && strpos(strtolower($wp_registered_sidebars[$sidebar]['name']),'sidebar') !== false)
				{
					$checked = "";
					if(get_post_meta($post->ID, $meta_box['name'], true) == "" || !get_post_meta($post->ID, $meta_box['name'], true))
						$checked = "checked='checked'";
					else 
						foreach($meta_value as $key => $val)
							if(str_replace("'","",$key) == $wp_registered_sidebars[$sidebar]['name'])
								$checked = "checked='checked'";
		?>
										<input type="checkbox" name="<?php echo $meta_box['name']; ?>[<?php echo $wp_registered_sidebars[$sidebar]['name']; ?>]" class="" <?php echo $checked; ?> /> <?php echo $wp_registered_sidebars[$sidebar]['name']; ?><br />
		<?php		
				}
			}
		?>
										<span class="instartius_field_description"><?php echo $meta_box['description']; ?></span>
									</div>
								</div>
	<?php } ?>
<?php endforeach; ?>
					</div>
				</div>
<?php
			}
		}
		echo '</div>';//end .ilc-btabs
		echo '</div>';//end #instartius-meta-box-tabs
		echo '<script type="text/javascript">';
			echo 'jQuery(document).ready(function(){';
				echo 'if(jQuery(".ilc-htabs li").length > 1)';
					echo 'ilcTabs({ilctabs  : "#instartius-meta-box-tabs"});';
				echo 'else{';
					echo 'jQuery(".ilc-tab").show();';
					echo 'jQuery(".ilc-htabs li").addClass("select");';
				echo '}';
			echo '});';
		echo '</script>';
	}

	function InstartiusSavePostdata( $post_id )
	{
		global $post, $InstartiusPanels;
		if(isset($_POST['instartius_proper_save']) && $_POST['instartius_proper_save'] != '')
		{
			foreach($InstartiusPanels as $panel)
			{	
				foreach($panel['fields'] as $field)
				{  
					if ('page' == $_POST['post_type'])
						if ( !current_user_can( 'edit_page', $post_id )) // Si NO puede editar paginas
							return $post_id;
					else 
						if ( !current_user_can( 'edit_post', $post_id )) // Si NO puede editar cualquier otro tipo de post
							return $post_id;
					$data = $_POST[$field['name']];
					if(get_post_meta($post_id, $field['name']) == "")  
						add_post_meta($post_id, $field['name'], $data, true);  
					elseif($data != get_post_meta($post_id, $field['name'], true))
						update_post_meta($post_id, $field['name'], $data); 
				}
			}
		}
		else 
			return $post->ID;
	}

	$fichaMetaboxField_ListToTag = array	(
												"name" 			=>	"list_tag",
												"title" 		=>	__('Listar posts con el tag'), 
												"description"	=>	"",
												"type" 			=>	"textbox"
											);

	$fichaMetaboxFields = array	( $fichaMetaboxField_ListToTag );

	$fichaMetaboxPanel1 = array	(
										"name"		=>	__('Opciones de Ficha Tecnica'),		// Name displayed in box
										"fields"	=>	$fichaMetaboxFields,					// Field options
										"post_kind"	=>	"ficha_tecnica"							// Pages to show write panel
									);
	
	$fichaMetaboxPanels =	array	( $fichaMetaboxPanel1 );
	InstartiusBuildPanels	( $fichaMetaboxPanels );
?>