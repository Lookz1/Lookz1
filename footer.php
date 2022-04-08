<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hair-price
 */

?>

	<footer class="footer">
		<div class="container">
			<div class="footer__top">
				<div class="footer__left">
					<a href="<?php echo get_site_url();?>" class="logo">
						<img src="<?php echo get_field('logo','option')['url']; ?>" alt="<?php echo get_field('logo','option')['alt']; ?>"><?php the_field('logo_text','option'); ?></a>
					<span><?php the_field('logo_year','option');?></span>
				</div>

				<ul class="social-list">
					<?php if (get_field('fb_link','option')): ?>
						<li><a href="<?php the_field('fb_link','option');?>"><i class="fab fa-facebook-f"></i></a></li>			
					<?php endif ?>
					<?php if (get_field('instagram_link','option')): ?>
						<li><a href="<?php the_field('instagram_link','option');?>"><i class="fab fa-instagram"></i></a></li>
					<?php endif ?>
					<?php if (get_field('pinterest_link','option')): ?>
						<li><a href="<?php the_field('pinterest_link','option');?>"><i class="fab fa-pinterest-p"></i></a></li>
					<?php endif ?>
					<?php if (get_field('twitter_link','option')): ?>
						<li><a href="<?php the_field('twitter_link','option');?>"><i class="fab fa-twitter"></i></a></li>
					<?php endif ?>
					<?php if (get_field('youtube_link','option')): ?>
						<li><a href="<?php the_field('youtube_link','option');?>"><i class="fab fa-youtube"></i></a></li>
					<?php endif ?>
				</ul>
				<?php 
				wp_nav_menu( array( 
					'theme_location' => 'footer',
					'menu_class' => 'links-footer',
					'container' => false ) ); 
				?>
			</div>
			<div class="footer__bottom">
				<p><?php the_field('bottom_text','option');?></p>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
