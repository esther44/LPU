<!--R�cup�re le header-->
<?php get_header(); ?>
<div id="content" class="container">
    <div class="row">
        <div class="content center-block">
            <!--Contenus-->
            <section class="col-md-9 row center-block">
                <!--Si il y a des articles, parmi les articles, afficher celui/ceux qu'il faut-->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post" id="post-<?php the_ID(); ?>">
                            <!--Afficher le titre de la page -->
                            <h1>
                                <a href="<?php the_permalink(); ?>" title="
                                <?php the_title(); ?>">
                                </a>
                            </h1>

                            <!--Afficher le contenu de la page -->
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <!--Lien permettant de modifier la page dans l'administration-->
                    <?php edit_post_link('Modifier cette page', '<p>', '</p>'); ?>
                <?php else : ?>
                    <h2>Oooopppsss...</h2>
                    <p>D�sol�, mais vous cherchez quelque chose qui ne se trouve pas ici
                        .</p> <?php include(TEMPLATEPATH . "/searchform.php"); ?>
                <?php endif; ?>
            </section>

            <!--R�cup�re la Sidebar-->
            <?php get_sidebar(); ?>
        </div>
        <?php get_footer(); ?>
    </div>
</div>
</body>
</html>