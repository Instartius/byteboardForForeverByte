<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/11/13
 * La impresion de toda la consulta del post de la iteracion actual del query
 */
?>
<div class="post-meta">
    <div class="post-title">
        <h2>
            <a href="<? Loop::PostPermalink() ?>" title="<? Loop::PostTitle() ?>" rel="bookmark">
                <? Loop::PostTitle() ?>
            </a>
        </h2>
    </div><!--.post-title-->
    <div class="post-date">
		<span>
			<? Loop::PostTime() ?>
		</span>
    </div><!--.post-date-->
    <div class="post-info">
        <div class="comments">
			<span>
				<? Loop::NumberCommentsLink() ?>
			</span>
            Comentarios
        </div>
        <div class="editor-data">
            <? Loop::AuthorPostsLink() ?>
        </div>
    </div><!--.post-info-->
</div><!--.postMeta-->
<div class="post-content">
    <? Loop::PostContent() ?>
</div>
<div class="post-social">
    <?php Render('postsocial') ?>
</div>