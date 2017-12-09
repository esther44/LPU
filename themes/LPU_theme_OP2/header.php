<!doctype html>
<html lang="fr">
<head>
    <title>
        <?php bloginfo('name') ?>
        <?php if (is_404()) : ?> &raquo; <?php _e('Not Found') ?><?php elseif (is_home()) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?>
    </title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/>
    <meta name="alexaVerifyID" content="T_L_ZcfIeJwX85tKvgwswAh0fuQ"/>
    <meta name="msvalidate.01" content="81662A7AB83699D5575C00A15FF822B5"/>
    <meta name="google-site-verification" content="ok9C3Ekf2O_mhSs-NBR7QDwkAcZRbY_sEwt3fkONb2g"/>
    <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0" />
    <meta charset="utf-8">
    
    <!-- leave this for stats -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>&
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>"/>
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/><?php wp_head(); ?>
    <?php wp_get_archives('type=monthly&format=link'); ?> <?php //comments_popup_script(); <?php wp_head(); ?>

    <LINK REL="SHORTCUT ICON" href="<?php echo get_option('home'); ?>/wp-content/themes/LPU_theme_OP2/images/logo-les-pelles-usees.png">
</head>
<body class="page" role="document">
<!-- Informations du blog -->
<header role="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="container_img">
                    <a href="<?php bloginfo('url'); ?>">
                        <img
                            src="<?php echo get_option('home'); ?>/wp-content/themes/LPU_theme_OP2/images/logo-les-pelles-usees.png"
                            alt="Les pelles usées BMX"/>
                    </a>
                    <!-- Titre du blog -->
                </div>
                <!--Le Menu-->
                <nav role="navigation">
                    <?php wp_nav_menu(array('LPU_theme_OP' => 'main-menu', 'walker' => new mono_walker())); ?>
                </nav>
            </div>
        </div>
    </div>
</header>
