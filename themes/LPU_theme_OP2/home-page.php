<?php
/**
 * Created by PhpStorm.
 * User: esthe
 * Date: 24/06/2016
 * Time: 23:15
 */


if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article class="post" id="post-<?php the_ID(); ?>">
            <div class="section_title">
                <div class="content_title">
                    <h1 class="post-title">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
        if (get_post_gallery()) :
            $gallery = get_post_gallery(get_the_ID(), false);
        endif; ?>
    <?php endwhile; ?>
<?php endif; ?>