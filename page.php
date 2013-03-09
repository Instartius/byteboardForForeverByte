<? begin_html() ?>
    <? render('header') ?>
        <div class="container">
	        <div id="content" class="mypage">
		        <? if (have_posts()) while (have_posts()) : the_post() ?>
			        <? content_place_holder('pageread') ?>
		        <? endwhile ?>
	        </div>
	        <? get_sidebar() ?>
        </div>
    <? render('footer') ?>
<? end_html() ?>