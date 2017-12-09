<?php get_header(); ?>

<!--Contenus-->
<?php
$menu_items = wp_get_nav_menu_items('main-nav');
?>
<div id="banner">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <img src="<?php echo get_option('home'); ?>/wp-content/themes/LPU_theme_OP2/images/bandeau.jpg"
                 alt="BMX compétition"/>
        </div>
    </div>
</div>
<!--<div class="image_une container">-->
<!--    <div class="row">-->
<!--        <!-- Image � la Une-->
<!--        --><?php //the_post_thumbnail(); ?>
<!--    </div>-->
<!--</div>-->
<div class="full_content container-fluid">
    <div class="row no-gutters">
        <div class="container content">
            <div class="row">
                <?php
                //    Affiche toutes les pages créees dans la home page (créer le one page)
                foreach ($menu_items as $menu_item) {
                    $args = array('p' => $menu_item->object_id, 'post_type' => 'any');

                    global $wp_query;
                    $wp_query = new WP_Query($args);
                    $templatePart = ($menu_item->title == 'Évènements') ? 'evenements' : $menu_item->object;
                    ?>

                    <section <?php post_class('sep col-lg-12 col-sm-12 col-xs-12'); ?>
                        id="<?php echo sanitize_title($menu_item->title); ?>">
                        <?php
                        if (have_posts()) {
                            include(locate_template('home-' . $templatePart . '.php'));
                        } ?>
                    </section>

                    <?php
                };
                ?>
            </div>
        </div>
        <?php get_footer(); ?>
    </div>
</div>
</body>
</html>



