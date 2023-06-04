<?php

// テーマサポートの記述
function neko_theme_setup() {
add_theme_support('title-tag');
add_theme_support('menu');
add_theme_support('html5', array('search-form'));
add_theme_support('post-thumbnails');
add_image_size('page_eyecatch' , 1100, 610, true);/* 固定ページで出力するアイキャッチ画像のサイズ指定 */
add_image_size('archive_eyecatch' , 200, 150, true);/* アーカイブページで出力するアイキャッチ画像のサイズ指定 */
register_nav_menus( array(
  'main-menu' => 'メインメニュー',
));

}
add_action('after_setup_theme', 'neko_theme_setup');

// CSS,JSの読み込み
function neko_enqueue_scripts() {
wp_enqueue_script('jquery');
wp_enqueue_script('kuroneko-theme-common', get_template_directory_uri() . '/assets/js/theme-common.js', array(),'1.0.0', true);
wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap', array(),'1.0.0' );
wp_enqueue_style('kuroneko-theme-styles', get_template_directory_uri().'/assets/css/theme-styles.css', array(),'1.0.0' );
}
add_action('wp_enqueue_scripts', 'neko_enqueue_scripts');


// ウィジェットを追加
function neko_widgets_init() {
  register_sidebar(
      array(
        'name'          => 'サイドバー',
        'id'            => 'sidebar-widget-area',
        'description'   => '投稿・固定ページのサイドバー',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
      )
    );


    // ウィジェットを複数一度に登録

  register_sidebars(
      3,
      array(
        'name'          => 'フッター %d',
        'id'            => 'footer-widget-area',
        'description'   => 'フッターのサイドバー',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
      )
    );
}
add_action('widgets_init', 'neko_widgets_init');


