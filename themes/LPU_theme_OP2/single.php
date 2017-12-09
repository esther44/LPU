<!--R�cup�re le header-->
<?php get_header(); ?>


<!--<!-- un article -->-->
<!--Contenus-->
<main role="main" class="container">
    <div class="article content row no-gutters">

        <!--Contenus-->
        <div class="center-block">
            <div class="image_une col-lg-12 col-sm-12 col-xs-12">
                <!-- Image � la Une-->
                <?php the_post_thumbnail(); ?>
            </div>
            <!--Si il y a des articles, parmi les articles, afficher celui/ceux qu'il faut-->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post col-lg-12 col-sm-12 col-xs-12" id="post-<?php the_ID(); ?>">
                        <!--Afficher le titre de l'article-->
                        <h1>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h1>
                        <div class="infos">
                            <span class="date-publication">Le <?php the_date(); ?></span>
                            <span class="auteur"> par <?php the_author(); ?></span>
                            <span class="email-contact"><?php echo get_post_meta($post->ID, 'email-contact', true); ?></span>
                            <span class="numero-contact"><?php echo get_post_meta($post->ID, 'numero-contact', true); ?></span>
                        </div>
                        <?php foreach ((get_the_category()) as $cat) {
                            if (!($cat->cat_ID == '10' || $cat->cat_ID == '3' || $cat->cat_ID == '4' || $cat->cat_ID == '12')) echo '<span class="annee">' . $cat->cat_name . '</span>';
                        } ?>
                        <!--Afficher le contenu de l'article -->
                        <div class="post_content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p>D�sol�, aucun article ne correspond � vos crit�res.</p>
            <?php endif; ?>
        </div>
<!--        <div class="prev_next">-->
<!--            <div class="prev">-->
<!--                <!--nom des articles suivants et pr�c�dents-->
<!--                --><?php //previous_post_link('%link', '%title', true); ?><!--</div>-->
<!--            <div class="next">-->
<!--                --><?php //next_post_link('%link', '%title', true); ?>
<!--            </div>-->
<!--        </div>-->
    </div>
</main>
<?php get_footer(); ?>
</body>
</html>