<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hair-price
 */

?>
<div class="container">
	<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
</div>
<div class="article">
	<div class="container">
		<div class="row">
			<div class="col-xl-9">
				<?php the_title( '<h1 class="title-section">', '</h1>' ); ?>
				<div class="article__properties">
					<div class="properties-wrap">
						<span class="item-property"><img src="<?php echo get_template_directory_uri() ?>/img/prop2.png" alt="alt">18 hours ago</span>
						<?php $views = get_post_meta( $post->ID, 'views', true ); ?>
                		<?php if ($views[0]): ?>
							<span class="item-property"><img src="<?php echo get_template_directory_uri() ?>/img/prop3.png" alt="alt"><?php echo $views[0]; ?> views</span>
						<?php endif ?>
					</div>
					<div class="properties-wrap">
						<span class="item-property"><img src="<?php echo get_template_directory_uri() ?>/img/prop4.png" alt="alt">Author: <strong><?php the_author(); ?></strong></span>
						<span class="item-property"><img src="<?php echo get_template_directory_uri() ?>/img/prop5.png" alt="alt">Updated: <strong><?php the_date('M d, Y'); ?></strong></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="menu-page">
					<div class="menu-page__title">Menu</div>
					<ul>
						<li>
							<a href="#">1. When can a bank be held liable?</a>
							<ul>
								<li><a href="#">1.1 Fraud</a></li>
								<li><a href="#">1.2 Forgery of documents</a></li>
							</ul>
						</li>
						<li>
							<a href="#">2. Illegal actions with property</a>
							<ul>
								<li><a href="#">2.1 Failure to comply with a court decision</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<ul class="slider-gallery">
					<?php foreach (get_field('slider', get_the_ID()) as $slider): ?>
						<li>
							<div class="slider-gallery__item">
								<img src="<?php echo $slider['img']['url'];?>" alt="<?php echo $slider['img']['alt'];?>">
							</div>
						</li>						
					<?php endforeach ?>
				</ul>
				<div class="article-block">
					<?php the_content();?>
				</div>
				<?php if (get_field('title', get_the_ID())): ?>	
					<h2 class="title-section">Information for buyers</h2>
					<div class="info-buyers">
						<div class="info-buyers__title"><?php echo the_field('title', get_the_ID());?></div>
						<?php foreach (get_field('info', get_the_ID()) as $info): ?>
							<div class="line-info">
								<strong><?php echo $info['col_1']; ?></strong>
								<span><?php echo $info['col_2']; ?></span>
							</div>							
						<?php endforeach ?>
					</div>
				<?php endif ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			</div>
			<div class="col-lg-3">
				<h2 class="title-section">Popular articles</h2>
				<div class="articles-wrap">
					<?php
					$posts = get_posts( array(
						'numberposts' => 10,
						'category'    => 1,
						'orderby' => 'meta_value_num', 
						'meta_key'    => 'views',
						'post_type'   => 'post',

					) );

					foreach( $posts as $post ){
						setup_postdata($post); 
						$views = get_post_meta( $post->ID, 'views' );
						?>
						<a href="<?php the_permalink(); ?>" class="item-article">
							<span class="item-article__name"><?php the_title(); ?></span>
							<span class="item-article__views"><?php echo $views[0];?> views</span>
						</a>
					<?php   
					} wp_reset_postdata();
					?>
				</div>
				<?php echo sold_posts(); ?>
				<div class="block-subscribe">
					<div class="block-subscribe__title">The latest listings and special offers to your inbox!</div>
					<form>
						<div class="item-form">
							<input type="email" placeholder="Enter Your Email" required="required">
						</div>
						<button class="btn-main" type="submit">Subscribe</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
