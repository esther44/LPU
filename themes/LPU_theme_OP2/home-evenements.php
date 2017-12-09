<?php
/**
 * Created by PhpStorm.
 * User: esthe
 * Date: 24/06/2016
 * Time: 23:15
 */

while (have_posts()) :
the_post(); ?>
<div class="section_title">
    <div class="content_title">
        <h1 class="post-title">
            <?php the_title(); ?>
        </h1>
    </div>
</div>

<div class="post-content">
    <?php
    $args = array('posts_per_page' => -1, 'post_typ' => 'evenement', 'order' => 'DESC');
    $loop = new WP_Query($args);
    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
        $link = get_permalink($post->ID);
        $thumbID = get_post_thumbnail_id($post->ID);
        $postImg = wp_get_attachment_image_src($thumbID, 'width=350&crop=1');
        $baseline = $post->post_excerpt;
        ?>
        <article class="evenement-card col-lg-4 col-sm-6 col-12">
            <div class="post" id="post-<?php the_ID(); ?>">
                <h2 class="card-title">
                    <a href="<?php echo $link; ?>" title="<?php echo $post->post_title; ?>"
                       rel="prefetch">
                        <?php echo $post->post_title; ?>
                    </a>
                </h2>

                <span class="date-publication">Le <?php the_date('d/m/Y'); ?></span>
                <span class="auteur"> par <?php the_author(); ?></span>
                
                <a href="<?php echo $link; ?>" title="<?php echo $post->post_title; ?>" rel="prefetch"
                   class="content_image">
                    <?php if ($baseline != '') { ?>
                        <h4 class="card-subtitle">
                            <?php echo $baseline; ?>
                        </h4>
                    <?php }
                    ?>
                    <?php
                    // Check if the post has a Post Thumbnail assigned to it.
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium');
                    }
                    ?>
                </a>
                <?php the_excerpt(); ?>

            </div>
        </article>
    <?php endwhile;endif; ?>

    <?php endwhile; ?>
</div>
<div class="see-more-events">
    <span>Voir plus</span>
</div>

