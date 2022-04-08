<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hair-price
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wrapper">
		<header class="header">
			<div class="container header__top">
				<div class="row align-items-center">
					<div class="col-md-6 col-9">
						<div class="header__left">
							<a href="<?php echo get_site_url();?>" class="logo">
								<img src="<?php echo get_field('logo','option')['url']; ?>" alt="<?php echo get_field('logo','option')['alt']; ?>"><?php the_field('logo_text','option'); ?></a>
							<div class="language-block">
								<div class="language-block__value"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng <i class="far fa-chevron-down"></i></div>
								<div class="language-block__dropdown">
									<ul>
										<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng</a></li>
										<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng</a></li>
										<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-3">
						<div class="header__right">
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
							<div class="links-header">
								<a href="#">Login</a><span>or</span><a href="#">Register</a>
							</div>
							<span class="btn_nav">
								<span class='sandwich'>
									<span class='sw-topper'></span>
									<span class='sw-bottom'></span>
									<span class='sw-footer'></span>
								</span>
							</span>
						</div>
					</div>
				</div>
			</div>
			<nav class="nav">
				<div class="container">
					<div class="nav__wrap">
						<?php 
						wp_nav_menu( array( 
							'theme_location' => 'menu-1',
							'menu_class' => 'menu',
							'container' => false ) ); 
						?>
						<a href="#" class="btn-nav">+ Post an Ad</a>
					</div>
				</div>
			</nav>
			<div class="menu-mobile">
				<?php 
				wp_nav_menu( array( 
					'theme_location' => 'menu-1',
					'menu_class' => 'menu',
					'container' => false ) ); 
				?>
				<a href="#" class="btn-main">+ Post an Ad</a>
				<div class="language-block">
					<div class="language-block__value"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng <i class="far fa-chevron-down"></i></div>
					<div class="language-block__dropdown">
						<ul>
							<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng</a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng</a></li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/eng.png" alt="alt">Eng</a></li>
						</ul>
					</div>
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
				<div class="links-header">
					<a href="#">Login</a><span>or</span><a href="#">Register</a>
				</div>
			</div>
		</header>