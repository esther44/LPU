<!--R�cup�re le header-->
<?php get_header(); ?>

<!--Contenus-->
<div class="content center-block">
    <section class="col-md-9 center-block">
        <ul>
            <li><h2>Infos Meta</h2>
                <ul> <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                </ul>
            </li>
        </ul>
        <!--Si il y a des articles, parmi les articles, afficher celui/ceux qu'il faut-->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post " id="post-<?php the_ID(); ?>">
                    <!--Afficher le titre de l'article-->
                    <h2>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <!--Afficher le contenu de l'article -->
                    <div class="post_content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <h2>Oooopppsss...</h2>
            <p>D�sol�, mais vous cherchez quelque chose qui ne se trouve pas ici.</p>
            <?php include(TEMPLATEPATH . "/searchform.php"); ?>
            <div class="navigation">
                <?php posts_nav_link(' - ', 'page suivante', 'page pr&eacute;c&eacute;dente'); ?>
            </div>
        <?php endif; ?>
    </section>


    <!--R�cup�re la Sidebar-->
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
</body>
</html>