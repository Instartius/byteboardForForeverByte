<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/11/13
 * El conjunto de botones sociales por cada publicacion
 * @changed 13/01/22 Cambiado el Via de Twitter a ForeverByte
 */
?>
<div class="gp btn-social">
	<g:plusone size="medium" href="<? PostSocial::PostPermalink() ?>"></g:plusone>
</div>
<div class="tw btn-social">
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?
    PostSocial::PostPermalink() ?>" data-text="<? PostSocial::PostTitle() ?>" data-via="Fbytecom"
       data-lang="es" data-related="Doracol_">Twittear</a>
</div>
<div class="su btn-social">
	<su:badge layout="2" location="<? PostSocial::PostPermalink() ?>"></su:badge>
</div>
<div class="fb btn-social">
	<div id="fb-root"></div>
	<fb:like href="<? PostSocial::PostPermalink() ?>" show_faces="false" width="450" layout="button_count"></fb:like>
</div>