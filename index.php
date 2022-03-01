<?php get_header(); ?>

<?php
$ourCurrentPage = get_query_var('paged');
//$ourCurrentPage = max(1, $ourCurrentPage);
//$per_page = 12;
//$offset_start = 1;
//$offset = ($ourCurrentPage - 1) * $per_page + $offset_start;
//$post = new WP_Query(array(
//    'posts_per_page' => $per_page,
//    'paged' => $ourCurrentPage,
//    'offset' => $offset,
//    'orderby' => 'date',
//    'order' => 'DESC'
//));
//
//$total_rows = max (0, $post->found_posts - $offset_start);
//$total_pages = ceil ($total_rows / $per_page);
//
//    wp_reset_postdata();
//

$PrimaryPost    = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'paged'          => $ourCurrentPage
));

$SecondaryPost = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'offset'         => 1,
    'paged'          => $ourCurrentPage
));
?>

<body>
<main>
    <div class="primary-column">
        <div class="app-card">
            <div class="app-card__container">
                <div class="app-card__images">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="image-post">
                    </a>
                </div>
                <div class="app-card__box">
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words($post->post_title, 10, ' ...'); ?></a>
                    </h3>
                    <p class="card-text"><?php echo wp_trim_words(get_the_content(), 60, ' ...'); ?></p>
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <div class="flex">
        <?php
        if ($SecondaryPost->have_posts()) :
            while ($SecondaryPost->have_posts()) :
                $SecondaryPost->the_post();
                ?>
                <div class="app-card">
                    <div class="app-card__container">
                        <div class="app-card__images">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="image-post">
                            </a>
                        </div>
                        <div class="app-card__box">
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words($post->post_title, 10, ' ...'); ?></a>
                            </h3>
                            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 30, ' ...'); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    </div>
    <br>

    <div class="clear text-center">
        <br>
        <?php
        echo fauzan_pagination();
        ?>
        <br>
    </div>
    <div class="clear">
        <?php get_footer(); ?>
    </div>
</main>
</body>