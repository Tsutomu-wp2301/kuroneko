<article id="post-<?php the_ID(); ?>" <?php post_class('module-Article_Item'); ?>>
                                <a href="<?php the_permalink(); ?>" class="module-Article_Item_Link">
                                    <?php if (has_post_thumbnail()) : ?><!-- アイキャッチがあれば表示する条件分岐 -->
                                        <?php the_post_thumbnail('archive_eyecatch'); ?>
                                    <?php else: ?><!-- アイキャッチ画像が無ければ指定したファイル画像を表示 -->
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/dummy-image.png" alt="" width="200" height="150" load="lazy">
                                    <?php endif; ?><!-- アイキャッチの条件分岐終了 -->
                                    <div class="module-Article_Item_Body">
                                        <h2 class="module-Article_Item_Title"><?php the_title(); ?></h2>
                                        <?php the_excerpt(); ?>
                                        <ul class="module-Article_Item_Meta">
                                            <?php /* 記事の全カテゴリーを取得して表示するループ */
                                                $neko_category_list = get_the_category();
                                            if ($neko_category_list) : 
                                            ?>
                                            <li class="module-Article_Item_Cat">
                                                <?php for( $i=0; $i<count($neko_category_list); $i++ ){
                                                    echo esc_html($neko_category_list[$i]->name);
                                                    echo ' ' ;
                                                } ?>
                                            </li>
                                            <?php endif; ?><!-- カテゴリー表示のループ終了 -->
                                            <li class="module-Article_Item_Date"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time></li>
                                        </ul>
                                    </div>
                                </a>
                            </article>