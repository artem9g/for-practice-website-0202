<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">
    <!-- Add external fonts below (Typekit Only!) -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="wrapper">

	<header id="masthead" class="header">
        <div class="header__container">
            <div class="logo text-center medium-text-left">
                <h1><?php show_custom_logo(); ?><span class="css-clip"><?php echo get_bloginfo( 'name' ); ?></span></h1>
            </div>

            <div class="site-branding">
                <?php
                if ( is_front_page() || is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;
                ?>

            </div><!-- .site-branding -->


            <div class="header__menu menu">
                <button type="button" class="menu__icon icon-menu"><span></span></button>
                <nav class="menu__body">
                    <?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'header-menu', ) ); ?>
                    <ul class="menu__list">
                        <li class="menu__item"><a href="" class="menu__link"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
	</header><!-- #masthead -->


