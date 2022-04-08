<?php
$views = get_post_meta( $post->ID, 'views' );
?>
<a href="<?php the_permalink(); ?>" class="item-article">
    <span class="item-article__name"><?php the_title(); ?></span>
    <span class="item-article__views"><?php echo $views[0];?> views</span>
</a>