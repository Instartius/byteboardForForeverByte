<?php
/**
 * @author Instartius Corporation
 * @package ByteBoard.Components
 * @version 0.0.1
 * @created 1/9/13
 * Todo el HEAD con todos los recursos a cargar para preparar el documento
 */
?>
<head>
    <title>
        <? Head::Title() ?>
    </title>
    <meta name="description" content="<? Head::MetaDescription() ?>" />
    <meta charset="<? Head::MetaCharset() ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta name="viewport" content="wid  th=device-width; initial-scale=1"/>
    <link rel="icon" href="<? archive_from_root('favicon.ico') ?>" type="image/x-icon" />
    <link rel="pingback" href="<? Head::PingBackUrl() ?>" />
    <link rel="alternate" type="application/rss+xml" title="<? Head::SiteName() ?>" href="<? Head::Rss2Url() ?>" />
    <link rel="alternate" type="application/atom+xml" title="<? Head::SiteName() ?>" href="<? Head::AtomUrl() ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<? style('lessframework.css') ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<? style('theme.css') ?>" />
    <?php wp_enqueue_script("jquery") ?>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <script src="<? script('jquery.easing.1.3.js') ?>"></script>
    <script src="<? script('jquery.bxSlider.min.js') ?>"></script>
    <script src="<? script('bgstretcher.js') ?>"></script>
    <script src="<? script('main.js') ?>"></script>
    <?php Render('socialscripts') ?>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-25242907-1']);
        _gaq.push(['_trackPageview']);
        (function()
        {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>