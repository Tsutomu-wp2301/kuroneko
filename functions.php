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
  add_theme_support('wp-block-styles');/* ブロックエディター用CSSを読み込む */
  add_theme_support('responsive-embeds');/* 埋め込み要素のレスポンシブスタイルを適用 */
  add_theme_support('align-wide');/* 幅広と全幅のスタイルを適用させる */
  add_theme_support('editor-styles');/* 独自のエディタースタイルを有効化 */
  add_editor_style('assets/css/editor-styles.css');/* エディタースタイルを指定する */
  add_editor_style('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap');/* エディター側にGoogleフォントを読み込む */


  // カラーパレットのカスタム設定
  add_theme_support(
    'editor-color-palette',
    array(
      array(
        'name'  => 'スカイブルー',
        'slug'  => 'skyblue',
        'color' => '#00A1C6',
      ),
      array(
        'name'  => 'ライトスカイブルー',
        'slug'  => 'light-skyblue',
        'color' => '#ECF5F7',
      ),
      array(
        'name'  => 'ライトグレー',
        'slug'  => 'light-gray',
        'color' => '#F7F6F5',
      ),
      array(
        'name'  => 'グレー',
        'slug'  => 'gray',
        'color' => '#767268',
      ),
      array(
        'name'  => 'ダークグレー',
        'slug'  => 'dark-gray',
        'color' => '#43413B',
      ),
    )
  );

  // フォントサイズのカスタム設定
  add_theme_support(
    'editor-font-sizes',
    array(
      array(
        'name'  => '極小',
        'slug'  => 'x-small',
        'size'  => 14,
      ),
      array(
        'name'  => '小',
        'slug'  => 'small',
        'size'  => 16,
      ),
      array(
        'name'  => '標準',
        'slug'  => 'normal',
        'size'  => 18,
      ),
      array(
        'name'  => '大',
        'slug'  => 'large',
        'size'  => 24,
      ),
      array(
        'name'  => '特大',
        'slug'  => 'huge',
        'size'  => 36,
      ),
    )
  );

}
add_action('after_setup_theme', 'neko_theme_setup');


// 自作のブロックを追加する
function neko_block_style_setup(){
  register_block_style(
    'core/button',
    array(
      'name'  => 'arrow',
      'label'  => '矢印付き'
    ),
  );
  register_block_style(
    'core/button',
    array(
      'name'  => 'fixed',
      'label' => '幅固定',
    ),
  );
}
add_action('after_setup_theme','neko_block_style_setup');


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


// コアのブロックパターン全て削除する
function neko_remove_block_patterns(){
  remove_theme_support('core-block-patterns');
}
add_action('after_setup_theme','neko_remove_block_patterns');


function neko_register_block_patterns() {
  register_block_pattern(
    'neko/campaign',
    array(
      'title'         => 'キャンペーン内容',
      'categories'    => array('text'),
      'description'   => 'キャンペーン用のパターンです',
      'content'       => "<!-- wp:heading -->
      // <h2 class=\"wp-block-heading\">キャンペーン内容</h2>
      <!-- /wp:heading -->
      
      <!-- wp:table -->
      <figure class=\"wp-block-table\"><table><tbody><tr><td>対象日</td><td>キャンペーン期間中、ご来店時に雨が降っていたお客様</td></tr><tr><td>期間</td><td>2021年3月14日〜3月31日</td></tr><tr><td>内容</td><td>施術料金のお会計総額から、15％OFF<br>※物販は割引適用外となります。その他の割引・クーポンとの併用は致しかねます。</td></tr></tbody></table></figure>
      <!-- /wp:table -->
      
      <!-- wp:buttons -->
      <div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-arrow\"} -->
      <div class=\"wp-block-button is-style-arrow\"><a class=\"wp-block-button__link wp-element-button\">来店ご予約はこちら</a></div>
      <!-- /wp:button --></div>
      <!-- /wp:buttons -->",
      'viewportWidth' => 710,
    )
  );
}
add_action('init', 'neko_register_block_patterns');
