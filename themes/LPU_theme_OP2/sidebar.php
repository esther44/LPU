<!--SIDEBAR-->
<!--<aside class="sidebar">-->
<aside class="sidebar col-md-3">
    <ul>
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
            <!--Champ de recherche-->
            <li id="search" class="row">
                <?php include(TEMPLATEPATH . '/searchform.php'); ?>
            </li>
            <!--Calendrier-->
            <li id="calendar" class="row">
                <h2>Calendrier</h2><?php get_calendar(); ?>
            </li>
            <!--Catégories-->
            <li class="row">
<!--                <h2>Categories</h2>-->
                <!--sort_column=name » trier la liste par ordre alphabétique,-->
                <!--optioncount=1? afficher le nombre de billets pour chaque catégorie. Si on avait pris le chiffre 0 à la place de 1, le nombre de billets ne s’afficherait pas.-->
                <!--hierarchical=0? ne permet pas l’affichage des sous-catégories. Si vous voulez les voir apparaître, mettez 1 à la place de 0.-->
                <ul> <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=1'); ?><?php wp_list_categories('title_li='); ?></ul>
            </li>
            <!--liste des pages du site -->
            <?php wp_list_pages('title_li=<h2>Pages</h2>'); ?>
            <!--liste des archives par mois-->
            <li class="row">
                <h2>Archives</h2>
                <ul> <?php wp_get_archives('type=monthly'); ?>   </ul>
            </li>
        </ul>
        <!--liste blogroll (sites que l'on aime bien)-->
        <?php get_links_list(); ?>
        <!--infos meta-->
        <li><h2>Infos Meta</h2>
            <ul> <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
            </ul>
        </li>
    <?php endif; ?>
</aside>
<!--</aside>-->