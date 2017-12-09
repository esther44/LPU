<!--Récupère le header-->
<?php get_header(); ?>

<!--Contenus-->
<div id="content">
    <!--Si il y a des articles, parmi les articles, afficher celui/ceux qu'il faut-->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="post" id="post-<?php the_ID(); ?>">
                <!--Afficher le titre de l'article-->
                <h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <!--Afficher informations postmetadata (date, auteur, catégorie, commentaires, auteur...)-->
                <p class="postmetadata">
                    Derni&egrave;re modification : le <?php the_time('j F Y') ?> par <?php the_author() ?> | Cat&eacute;gorie: <?php the_category(', ') ?>
                    | <?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?> <?php edit_post_link('Editer', ' &#124; ', ''); ?>
                </p>
                <!--Afficher le contenu de l'article -->
                <div class="post_content">
                    <!--the_excertp() affiche l'extrait de l'article en cours -->
                    <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Voir l'article</a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <h2 class="center">Aucun article trouvé. Essayer une autre recherche ?</h2>
        <?php include(TEMPLATEPATH . '/searchform.php'); ?>
    <?php endif; ?>
</div>

<!--Récupère la Sidebar-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>
</body>
</html>