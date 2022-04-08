<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hair-price
 */
?>

<div class="container">
	<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
</div>

<div class="article article_item">
	<div class="container">
		<div class="row">
			<div class="col-xl-9">
				<h1 class="title-section"><?php the_title();?></h1>
				<div class="article__properties">
					<div class="article__price"><?php the_field('price_per_lb', get_the_ID());?></div>
					<div class="properties-wrap">
						<?php $term_list = wp_get_post_terms($post->ID, 'ads-category', array("fields" => "all")); ?>
						<span class="item-property"><img src="<?php echo get_template_directory_uri() ?>/img/prop1.png" alt="alt"><?php echo $term_list[0]->name; ?></span>
						<span class="item-property"><img src="<?php echo get_template_directory_uri() ?>/img/prop2.png" alt="alt">18 hours ago</span>
						<?php $views = get_post_meta( $post->ID, 'views', true ); ?>
                		<?php if ($views[0]): ?>
							<span class="item-property"><img src="<?php echo get_template_directory_uri() ?>/img/prop3.png" alt="alt"><?php echo $views; ?> views</span>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<ul class="slider-gallery">
					<?php if (get_field('slider', get_the_ID())): ?>
						<?php foreach (get_field('slider', get_the_ID()) as $slider): ?>
							<li>
								<div class="slider-gallery__item">
									<img src="<?php echo $slider['url'];?>" alt="<?php echo $slider['alt'];?>">
								</div>
							</li>							
						<?php endforeach ?>	
					<?php endif ?>
				</ul>
				<div class="info-buyers">
					<p><?php the_field('info', get_the_ID());?></p>
					<ul class="list-social">
				        <?php
				            $img = get_field('preview_img', get_the_ID());
				            $title = get_the_title();
				            $excerpt = get_the_excerpt();
				            $link = get_the_permalink();
				        ?>
						<li><a onclick="Share.facebook('<?= $link ?>','<?= $title ?>','<?= $img ?>','<?= $excerpt ?>')"><img src="<?php echo get_template_directory_uri() ?>/img/soc1.png" alt="alt"></a></li>
						<li><a onclick="Share.twitter('<?= $link ?>','<?= $title ?>','<?= $img ?>','<?= $excerpt ?>')"><img src="<?php echo get_template_directory_uri() ?>/img/soc2.png" alt="alt"></a></li>
						<li>
							<a onClick="window.open('https://www.linkedin.com/sharing/share-offsite/?url=<?= $link; ?>','sharer','toolbar=0,status=0,width=620,height=390');"
							    href="javascript:void(0);"
							    rel="nofollow noopener noreferrer"
							    title="Поделиться в Linkedin">
							<img src="<?php echo get_template_directory_uri() ?>/img/soc3.png" alt="alt"></a>
						</li>
						<li><a href="http://www.tumblr.com/share/link?url=<?php echo get_permalink();?>"><img src="<?php echo get_template_directory_uri() ?>/img/soc4.png" alt="alt"></a></li>
					    <script>
					        Share = {
					            facebook: function (purl, ptitle, pimg, text) {
					                url = 'https://facebook.com/sharer.php?display=popup';
					                url += '&u=' + encodeURIComponent(purl);
					                Share.popup(url);
					            },
					            twitter: function (purl, ptitle) {
					                url = 'http://twitter.com/share?';
					                url += 'text=' + encodeURIComponent(ptitle);
					                url += '&url=' + encodeURIComponent(purl);
					                url += '&counturl=' + encodeURIComponent(purl);
					                Share.popup(url);
					            },
					            popup: function (url) {
					                window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
					            }
					        };
					    </script>
					</ul>
					<div class="info-buyers__title">Additional Info</div>
					<?php if (get_field('length', get_the_ID())): ?>
						<div class="line-info">
							<strong>Hair Length (Inches)</strong><span><?php the_field('length', get_the_ID());?></span>
						</div>						
					<?php endif ?>
					<?php if (get_field('thickness', get_the_ID())): ?>
						<div class="line-info">
							<strong>Hair Thickness</strong><span><?php the_field('thickness', get_the_ID());?></span>
						</div>
					<?php endif ?>
					<?php if (get_field('colour', get_the_ID())): ?>
					<div class="line-info">
						<strong>Hair Colour</strong><span><?php the_field('colour', get_the_ID());?></span>
					</div>
					<?php endif ?>
					<?php if (get_field('gender', get_the_ID())): ?>
					<div class="line-info">
						<strong>Gender</strong><span><?php the_field('gender', get_the_ID());?></span>
					</div>
					<?php endif ?>
					<?php if (get_field('ethnicity', get_the_ID())): ?>
					<div class="line-info">
						<strong>Hair Ethnicity</strong><span><?php the_field('ethnicity', get_the_ID());?></span>
					</div>
					<?php endif ?>
					<?php if (get_field('texture_type', get_the_ID())): ?>
					<div class="line-info">
						<strong>Hair Texture Type</strong><span><?php the_field('texture_type', get_the_ID());?></span>
					</div>
					<?php endif ?>
					<?php if (get_field('hair_to_be_cut_by', get_the_ID())): ?>
					<div class="line-info">
						<strong>Hair to be Cut by</strong><span><?php the_field('hair_to_be_cut_by', get_the_ID());?></span>
					</div>
					<?php endif ?>
					<?php if (get_field('weight', get_the_ID())): ?>
					<div class="line-info">
						<strong>Hair Weight</strong><span><?php the_field('weight', get_the_ID());?></span>
					</div>
					<?php endif ?>
					<?php if (get_field('country', get_the_ID())): ?>
					<div class="line-info">
						<strong>Country</strong><span><?php the_field('country', get_the_ID());?></span>
					</div>
					<?php endif ?>
					<?php if (get_field('zippostal_code', get_the_ID())): ?>
					<div class="line-info">
						<strong>Zip/Postal Code</strong><span><?php the_field('zippostal_code', get_the_ID());?></span>
					</div>
					<?php endif ?>
				</div>


				<h2 class="title-section">Featured hair for sale</h2>
				<ul class="slider-feature-page">
					<?php
					$args = array(
					    'posts_per_page' => 5,
					    'post_type' => 'ads',
					    'meta_query' => array(
					        array(
					            'key' => 'featured',
					            'value' => '3:"yes"',
					            'compare' => 'LIKE',
					        )
					    ),
					    'tax_query' => array(
					        array(
					            'taxonomy' => 'ads-category',
					            'field' => 'ID',
					            'terms' => $term_list[0]->term_id,
					        )
					    )
					);
					$loop = new WP_Query( $args );
					while ($loop->have_posts ()) : $loop->the_post ();?>
						<li>
							<a href="<?php echo get_permalink ( $loop->post->ID ) ?>" class="item-feature">
								<span class="item-feature__image">
									<img src="<?php echo get_field('preview_img', $loop->post->ID)['url']; ?>" alt="<?php echo get_field('preview_img', $loop->post->ID)['alt']; ?>">
								</span>
								<span class="item-feature__name"><?php the_title(); ?></span>
								<span class="item-feature__price"><?php the_field('price', $loop->post->ID);?></span>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<div class="col-lg-3">
				<div class="owner-block">
					<?php 
					global $post;
					$author_id=$post->post_author;
					$user_registered = get_the_author_meta('user_registered', $author_id);
					?>
					<div class="owner-block__title">Listing Owner</div>
					<div class="owner-block__wrap">
						<div class="owner-block__image">
							<img src="<?php echo get_template_directory_uri() ?>/img/ic_owner.jpg" alt="alt">
						</div>
						<div class="owner-block__content">
							<p><strong>Aleksandr</strong></p>
							<p>Registered: <?php echo stristr($user_registered, ' ', true);?></p>
							<p>United States, 32348</p>
						</div>
					</div>
					<a href="#" class="btn-main">Make an offer/Enquiry</a>
				</div>
                <h2 class="title-section">Most Viewed Hair</h2>
                <div class="articles-wrap">
                    <?php
                    $posts_ads = get_posts( array(
                        'numberposts' => 10,
                        'post_type'   => 'ads',
                        'orderby' => 'meta_value_num', 
                        'meta_key'    => 'views',
                    ) );
                    foreach( $posts_ads as $post ){
                        setup_postdata($post); 
                        $views = get_post_meta( $post->ID, 'views' );
                        ?>
                        <a href="<?php the_permalink(); ?>" class="item-article">
                            <span class="item-article__name"><?php the_title(); ?></span>
                            <span class="item-article__views">
                                <?php if ($views[0]): echo $views[0] . ' views'; endif ?>
                            </span>
                        </a>
                    <?php   
                    } wp_reset_postdata();
                    ?>
                </div>
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