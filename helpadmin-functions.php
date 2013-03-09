<?php
	function InstartiusCargarPaginaAyuda()
	{
		add_action('admin_menu', 'lgap_add_pages');

		function lgap_add_pages()
		{
			add_menu_page(__('Help','menu-test'), __('Help','menu-test'), 'read', 'lifeguard-assistant-plugin', 'lgap_main_page' );
		}

		function lgap_main_page() {
			echo "<h2>" . __( 'Help', 'menu-test' ) . "</h2>";
			// place your affiliate ID between the " on the following line
			$lgap_aff = "";
			// get your affiliate ID here: http://wplifeguard.com/wp-admin/profile.php?page=affiliateearnings
			echo '
			<style type="text/css">
				#wplg { font-family: "Varela",Helvetica,Trebuchet MS,Verdana,"DejaVu Sans",sans-serif; }
				#wplg a:link,#wplg a:visited { color: #21759b; text-decoration: none; }
				#wplg a:hover { color: #d54e21; }
				.wplg-video { background: #f6f6f6; border: 1px solid #dadada; padding: 12px; margin: 0 12px 12px 0; float: left; }
				.wplg-clear { clear: both; }
				.wplg-green-button { box-shadow:inset 0 0 3px rgba(0,0,0,.1); font-size: 20px; line-height: 32px; height: 32px; width: 434px; margin: 0 12px 12px 0; text-align: center; display: block; border: 2px solid #9abf89; background: #7da742; color: #f1ffeb !important; text-shadow: 0 0 3px rgba(125,167,66,.75); }
				.wplg-green-button:hover { border: 2px solid #c0e1aa; background: #8ac636; }
				.wplg-green-button:active { border: 2px solid #88a65e; background: #5d822a; }
			</style>
			<link href="http://fonts.googleapis.com/css?family=Varela" rel="stylesheet" type="text/css">
			<div id="wplg">
				<p>Need help with WordPress? Here is a collection of free WordPress video tutorials from <a href="http://wplifeguard.com/'.$lgap_aff.'">wpLifeGuard</a> to help you get going. <a href="http://wplifeguard.com/get-access/'.$lgap_aff.'">Get access to more videos.</a></p>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32852753?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32856785?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32857648?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32860297?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32872861?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32878118?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32881530?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32864178?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32863614?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32862744?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-video"><iframe src="http://player.vimeo.com/video/32857481?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="412" height="309" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
				<div class="wplg-clear"></div>
				<a class="wplg-green-button" href="http://wplifeguard.com/get-access/'.$lgap_aff.'">Get Full Access Now</a>
			</div>
			';
		}
	}
?>