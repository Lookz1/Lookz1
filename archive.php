<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hair-price
 */

get_header();
?>
<div class="container">
	<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
</div>
<div class="article">
    <div class="container">
        <div class="row">
        	<div class="col-12">
				<?php
				the_archive_title( '<h1 class="title-section">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>        		
        	</div>
        	<div class="item">
				<?php if ( have_posts() ) : ?>

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part ( 'template-parts/content', 'archive-posts' );

					endwhile; ?>

					<div class="navig"><?php navigation(); ?></div>

				<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>

        </div>
    </div>
</div>


<?php
get_footer();
