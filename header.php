<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div class="content-Wrap">
        <header role="banner" class="header">
            <h1 class="header-SiteName">
                <a href="<?php echo esc_url(home_url()); ?>" class="header-SiteName_Link">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>">
                </a>
                <span class="header-Tagline"><?php bloginfo('description'); ?></span>
            </h1>
            <nav class="header-Nav">
                <button type="button" class="header-NavToggle" aria-controls="global-Nav" aria-expanded="false" aria-label="メニュー開閉">
                    <span class="header-NavToggle_Bar"></span>
                </button>
                <div class="header-Nav_Inner" id="global-Nav" aria-hidden="true">
                    <?php 
                        $defaults = array(
                            'menu'            => 'Main Menu',
                            'menu_class'      => 'header-Nav_Items',
                            'menu_id'         => '',
                            'container'       => false,
                            'container_class' => '',
                            'container_id'    => '',
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'echo'            => true,
                            'depth'           => 0,
                            'walker'          => '',
                            'theme_location'  => 'main-menu',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        );
                        wp_nav_menu( $defaults );
                    ?>
                     <?php get_search_form(); ?>
                    <!-- <form role="search" method="get" class="search-form" action="https://example.com/">
                        <label>
                            <span class="screen-reader-text">検索：</span>
                            <input type="search" class="search-field" placeholder="検索 &hellip;" value="" name="s" />
                        </label>
                        <input type="submit" class="search-submit" value="検索" />
                    </form> -->
                </div>
            </nav>
        </header>
        <?php if (!is_front_page()) : ?> 
            <?php if(function_exists('bcn_display')) :?>
                <nav class="breadCrumb" typeof="BreadcrumbList" vocab="http//schema.org/" aria-lavel="現在のページ">
                    <?php bcn_display(); ?>
                </nav>
            <?php endif; ?>
        <?php endif; ?>
