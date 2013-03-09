<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/9/13
 * El contenedor de logotipo y publicidad superior
 */
?>
<header>
	<div class="container">
		<div id="title">
			<div id="logo">
				<a href="<? UpHeader::SiteUrl() ?>/" title="<? UpHeader::SiteDescription() ?>">
					<img src="<? UpHeader::HeaderImage() ?>" />
				</a>
				<h1 class="hide">
					<?php UpHeader::SiteName() ?>
				</h1>
			</div>
			<div id="tagline">
				<?php UpHeader::SiteDescription() ?>
			</div>
		</div><!--#title-->
		<div id="header-advert">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-5110428742100635";
			/* ED728x */
			google_ad_slot = "5069951013";
			google_ad_width = 728;
			google_ad_height = 90;
			//-->
			</script>
            <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
		</div>
		<?php if (!UpHeader::Sidebar('Header')) : ?>
		<?php endif ?>
		<div class="clear"></div>
	</div><!--.container-->
</header>