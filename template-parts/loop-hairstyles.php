<div class="col-6 col-md-3">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('module-Style_Item'); ?>>
                                    <a href="<?php the_permalink(); ?>" class="module-Style_Item_Link">
                                        <figure class="module-Style_Item_Img">
                                            <?php if (has_post_thumbnail()) : ?><!-- アイキャッチがあれば表示する条件分岐 -->
                                                <?php the_post_thumbnail('archive_eyecatch'); ?>
                                            <?php else: ?><!-- アイキャッチ画像が無ければ指定したファイル画像を表示 -->
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/dummy-image.png" alt="" width="400" height="400" load="lazy">
                                            <?php endif; ?>
                                        </figure>
                                        <h2 class="module-Style_Item_Title">
                                            <?php the_title(); ?>
                                        </h2>
                                        <?php the_excerpt(); ?>
                                    </a>
                                </article>
                            </div>