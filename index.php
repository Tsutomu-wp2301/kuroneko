<?php get_header(); ?>
        <div class="container-fluid content">
            <div class="row">
                <div class="col-lg-8">
                    <main class="main">
                      <header class="content-Header">
                          <h1 class="content-Title">
                              <?php single_post_title('<span>タイトル：　</span>',true); ?>
                          </h1>
                      </header>
                      <?php if( have_posts() ) : ?>
                        <?php  
                        while( have_posts() ) : 
                          the_post(); 
                          ?>
                          <?php get_template_part('template-parts/loop', 'post'); ?>
                        <?php endwhile; ?>
                      <?php endif; ?>
                      <?php get_template_part('template-parts/parts', 'pagenation'); ?>
                    </main>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php get_footer(); ?>
    </div>
    <script src="./assets/js/theme-common.js"></script>
</body>

</html>


 <?php the_title(); ?>