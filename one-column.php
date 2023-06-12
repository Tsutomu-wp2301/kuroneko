
<?php 
/** 
 * Template Name: サイドバーなし
 * Template Post Type: post, page, hairstyles
 *   */
?>

<?php get_header(); ?>
        <div class="container-fluid content">
            <main class="main">
                <?php if( have_posts() ) :  while( have_posts() ) : the_post(); ?><!-- ループ開始 -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="content-Header">
                            <h1 class="content-Title">
                                <?php the_title(); ?>
                            </h1>
                        </header>
                        <div class="content-Body">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="content-EyeCatch">
                                    <?php the_post_thumbnail('page_eyecatch'); ?>
                                </div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; endif; ?>
            </main>
        </div>
        <?php get_footer(); ?>
