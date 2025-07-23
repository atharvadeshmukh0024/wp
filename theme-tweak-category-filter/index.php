<?php get_header(); ?>

<style>
.category-filter {
    margin: 20px 0;
    text-align: center;
}
.category-filter a {
    padding: 10px 15px;
    margin: 5px;
    background-color: #0073aa;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    display: inline-block;
}
.category-filter a:hover {
    background-color: #005177;
}
</style>

<div class="category-filter">
    <a href="<?php echo home_url(); ?>">All</a>
    <?php
    $categories = get_categories();
    foreach($categories as $category) {
        echo '<a href="' . home_url() . '/?cat=' . $category->term_id . '">' . $category->name . '</a>';
    }
    ?>
</div>

<div class="post-list" style="max-width: 800px; margin: auto;">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10
    );

    if (isset($_GET['cat'])) {
        $args['cat'] = intval($_GET['cat']);
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div style="margin-bottom: 40px;">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div><?php the_excerpt(); ?></div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
