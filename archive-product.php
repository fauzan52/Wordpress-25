<?php
$args = array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_category',
            'field' => 'slug',
            'terms' => 'boardgames'
        )
    )
);
$products = new WP_Query( $args );
if( $products->have_posts() ) {
    while( $products->have_posts() ) {
        $products->the_post();
        ?>
        <h1><?php the_title() ?></h1>
        <div class='content'>
            <?php the_content() ?>
        </div>
        <?php
    }
}
else {
    echo 'NO POST ARCHIVE PRODUCT !';
}

?>
<?php
// If we are in a loop we can get the post ID easily
$price = get_post_meta(get_the_ID(), 'product_price', true);
?>