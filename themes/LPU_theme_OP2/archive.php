<!--Liste des articles-->

<!--R�cup�re le header-->
<?php get_header(); ?>

<!--Contenus-->
<div class="content center-block articles">
    <section class="col-md-12 center-block">

        <!--Affiche les sous cat�gies (ann�es)-->
        <?php $this_cat = (get_query_var('cat')) ? get_query_var('cat') : 1; ?>
        <?php $this_category = get_category($this_cat);
        if ($this_category->parent) {
            $this_cat = $this_category->parent;
        } ?>
        <div class="annees">
            <?php wp_list_categories('child_of=' . $this_cat . ''); ?>
        </div>


        <!--Si il y a des articles, parmi les articles, afficher celui/ceux qu'il faut-->
        <?php if (have_posts()) : ?>


            <?php while (have_posts()) : the_post(); ?>
                <article class="post" id="post-<?php the_ID(); ?>">
                    <!--Afficher le titre de l'article-->
                    <h1 class="post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                    <!--Afficher le contenu de l'article -->
                    <div class="post_content">
                        <!--the_excertp() affiche l'extrait de l'article en cours -->
                        <h2><?php the_excerpt(); ?></h2>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>

    </section>
</div>
<?php get_footer(); ?>
</div>
</body>
</html>