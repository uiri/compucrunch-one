<!DOCTYPE HTML>
<head>
    <title><?php
        if (is_single()) {
            single_post_title();
        } elseif (is_home() || is_front_page()) {
            bloginfo('name'); print ' | '; bloginfo('description'); get_page_number();
        } elseif (is_page()) {
            single_post_title('');
        } elseif (is_search()) {
            bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number();
        } elseif (is_404()) {
            bloginfo('name'); print ' | Not Found'; 
        } else {
            bloginfo('name'); wp_title('|'); get_page_number(); 
        }?>
</title>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf(__('%s latest posts', 'compucrunch-one'), wp_specialchars(get_bloginfo('name'), 1)); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf(__('%s latest comments', 'compucrunch-one'), wp_specialchars(get_bloginfo('name'), 1)); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body>
    <div id="wrapper" class="hfeed">
        <div id="header">
            <div id="masthead">
                <div id="branding">
                    <div id="blog-title">
                        <a href="<?php bloginfo('url')?>/" title="<?php bloginfo('name')?>" rel="home">
                            <img src="http://compucrunch.com/wp-content/uploads/2011/08/cclogo.png" alt="<?php bloginfo('name') ?>" />
                        </a>
                        <br/>
                        <div id="search">
                            <form method="get" id="searchform" action="http://compucrunch.com/" >
                                <input id="s" type="text" name="s" value="" />
                                <input id="searchsubmit" type="submit" value="Search Compucrunch" />
                            </form>
                        </div>
                    </div>
                </div><!-- #branding -->
                <div id="access">
                    <div class="skip-link">
                        <a href="#content" title="<?php _e('Skip to content', 'compucrunch-one') ?>">
                            <?php _e('Skip to content', 'compucrunch-one') ?>
                        </a>
                    </div>
                    <div class="ad">
                        <script type="text/javascript"><!--
                            google_ad_client = "pub-0669517924713762";
                            /* 468x60, compucrunch1 */
                            google_ad_slot = "0100264843";
                            google_ad_width = 468;
                            google_ad_height = 60;
                            //-->
                        </script>
                        <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                        </script>
                    </div>
                    <div class="welcome">
                        <div class="welcometext">
                            <?php bloginfo('description'); ?>
                        </div>
                    </div>
<!--                <div class="ad">
                        <script type="text/javascript"><!--
                            google_ad_client = "pub-0669517924713762";
                            /* 468x60, compucrunch1 */
                            google_ad_slot = "0100264843";
                            google_ad_width = 468;
                            google_ad_height = 60;
                            //-->
                        <!--</script>
                        <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                        </script>
                    </div> -->
                </div><!-- #access -->
            </div><!-- #masthead -->
        </div><!-- #header -->
        <div id="main">
