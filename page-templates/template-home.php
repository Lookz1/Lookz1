<?php
/* Template name: Home */
get_header (); ?>

<div class="billbord" style="background-image: url('<?php echo get_field('top_block_background_image', get_the_ID()); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <h1 class="title-big"><?php the_field('top_block_title',get_the_ID());?></h1>
                <p><?php the_field('top_block_subtitle',get_the_ID());?></p>
                <a href="<?php the_field('top_block_link',get_the_ID());?>" class="btn-main"><?php the_field('top_block_title_link',get_the_ID());?></a>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
        <div class="search-form">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="item-form">
                        <input type="text" value="<?php echo get_search_query() ?>"  placeholder="What are you looking for?" name="s" id="s" />
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="item-form">
                        <?php 
                        if(isset($_REQUEST['ads-category']) && !empty($_REQUEST['ads-category'])) {
                            $optsetlect=$_REQUEST['ads-category'];
                        } else {
                            $optsetlect=0;
                        }
                            $args = array(
                            'show_option_all' => esc_html__( 'All categories', 'woocommerce' ),
                            'hierarchical' => 1,
                            'depth' => 2,
                            'class' => 'cat',
                            'echo' => 1,
                            'value_field' => 'slug',
                            'selected' => $optsetlect
                        );
                        $args['taxonomy'] = 'ads-category';
                        $args['name'] = 'ads-category';
                        wp_dropdown_categories($args); ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <input type="submit" id="searchsubmit" class="btn-main" value="Start search" />
                </div>

            </div>
        </div>
    </form>
</div>

<div class="featured">
    <div class="container">
        <?php if (get_field('featured_hair', get_the_ID())): ?> 
            <h2 class="title-section">Featured hair for sale</h2>
            <ul class="slider-feature">
                <?php foreach (get_field('featured_hair', get_the_ID()) as $featured_hair): ?>
                    <li>
                        <a href="<?php echo get_permalink($featured_hair->ID);?>" class="item-feature">
                            <span class="item-feature__image">
                                <img src="<?php echo get_field('preview_img',$featured_hair->ID)['url'];?>" alt="<?php echo get_field('preview_img',$featured_hair->ID)['alt'];?>">
                            </span>
                            <span class="item-feature__name"><?php echo $featured_hair->post_title; ?></span>
                            <span class="item-feature__price"><?php the_field('price', $featured_hair->ID); ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
            <div class="bottom-button">
                <a href="<?php the_field('featured_hair_link', get_the_ID()); ?>" class="btn-main">Sell Your Hair</a>
            </div>
        <?php endif ?>
    </div>
</div>

<div class="catalog">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2 class="title-section">Latest Hair For Sale</h2>
                    <?php
                    $posts = get_posts( array(
                        'numberposts' => 10,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'post_type'   => 'ads',
                    ) );
                    foreach( $posts as $post ){ setup_postdata($post); ?>
                        <a href="<?php echo get_permalink();?>" class="item-catalog item-catalog_featured">
                            <span class="item-catalog__image">
                                <?php if (get_field('preview_img', $post->ID)): ?>
                                    <img src="<?php echo get_field('preview_img', $post->ID)['url']; ?>" alt="<?php echo get_field('preview_img', $post->ID)['alt']; ?>">
                                <?php endif ?>
                            </span>
                            <span class="item-catalog__content">
                                <span class="item-catalog__name"><?php the_title();?></span>
                                <?php $featured = get_field('featured', $post->ID); 
                                if ($featured[0]=='yes') { ?>
                                    <span class="item-catalog__status">Featured</span>
                                <?php } ?>
                                <span class="item-catalog__properties">
                                    <?php $term_list = wp_get_post_terms($post->ID, 'ads-category', array("fields" => "all")); ?>
                                    <?php if ($term_list): ?>
                                        <span class="item-catalog__property"><img src="<?php echo get_template_directory_uri() ?>/img/prop1.png" alt="alt"><?php echo $term_list[0]->name; ?></span>    
                                    <?php endif ?>
                                    <span class="item-catalog__property"><img src="<?php echo get_template_directory_uri() ?>/img/prop2.png" alt="alt"><?php echo get_the_date(); ?></span>
                                    <?php $views = get_post_meta( $post->ID, 'views', true );
                                    if ($views[0]): ?>
                                        <span class="item-catalog__property"><img src="<?php echo get_template_directory_uri() ?>/img/prop3.png" alt="alt"><?php echo $views[0]; ?> views</span>
                                    <?php endif ?>
                                </span>
                                <span class="item-catalog__text"><?php the_excerpt();?></span>
                                <span class="item-catalog__price"><?php the_field('price', $post->ID); ?></span>
                            </span>
                        </a>    
                    <?php } wp_reset_postdata(); ?>
            </div>
            <div class="col-lg-3">
                <?php echo sold_posts(); ?>

                <h2 class="title-section">Most Viewed Hair</h2>
                <div class="articles-wrap">
                    <?php
                    $posts_ads = get_posts( array(
                        'numberposts' => 10,
                        'orderby' => 'date', 
                        'order'    => 'DESC',
                        'post_type'   => 'ads',

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
            </div>
        </div>
        <div class="catalog__button">
            <div class="row">
                <div class="col-lg-3">
                    <a href="#" class="btn-main">View More Ads</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="reviews">
    <div class="container">
        <h2 class="title-section">Recent Reviews</h2>
        <ul class="slider-reviews">
            <?php 
            $reviews = get_field('reviews', 'option');
            $random_result = array_rand($reviews ,5);
            foreach ($random_result as $key) { ?>
                <li>
                    <div class="item-review">
                        <ul class="rating rating_4">
                            <?php if ($reviews[$key]['star'] == '1') { ?>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                            <?php }elseif ($reviews[$key]['star'] == '2') { ?>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                            <?php }elseif ($reviews[$key]['star'] == '3') { ?>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                            <?php }elseif ($reviews[$key]['star']=='4') { ?>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item"><i class="fas fa-star"></i></div></li>
                            <?php } else { ?>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                                <li><div class="rating__item" style="color: #ffb350;"><i class="fas fa-star"></i></div></li>
                            <?php } ?>
                        </ul>
                        <div class="title-small"><?php echo $reviews[$key]['title'];?></div>
                        <p><?php echo $reviews[$key]['text'];?></p>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <div class="bottom-button">
            <a href="#" class="btn-main">Sell Your Hair</a>
        </div>
    </div>
</div>

<div class="steps">
    <div class="container">
        <h2 class="title-section"><?php the_field('steps_title', 'option');?></h2>
        <div class="row align-items-center">
            <?php if (get_field('steps', 'option')): ?>
                <?php foreach (get_field('steps', 'option') as $steps): ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="item-step">
                            <div class="item-step__icon">
                                <img src="<?php echo $steps['img']['url']; ?>" alt="<?php echo $steps['img']['alt']; ?>">
                            </div>
                            <p><?php echo $steps['text']; ?></p>
                        </div>
                    </div>                    
                <?php endforeach ?>
            <?php endif ?>

            <div class="col-lg-3 steps__button">
                <a href="<?php the_field('steps_button_link', 'option'); ?>" class="btn-main"><?php the_field('steps_button_title', 'option'); ?></a>
            </div>
        </div>
        <div class="steps__text">
            <p><?php the_field('steps_text', 'option'); ?></p>
        </div>
    </div>
</div>

<div class="calculator">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="title-section"><?php the_field('buy_sell_title','option');?></div>
                <div class="descr-title"><?php the_field('buy_sell_subtitle','option');?></div>
                <?php the_field('buy_sell_text','option');?>
                <div class="text-more">
                    <?php the_field('buy_sell_hidden_text','option');?>
                </div>
                <?php if (get_field('buy_sell_hidden_text','option')): ?>
                    <a href="#" class="link-more"><span>Read More <i class="far fa-chevron-down"></i></span></a>
                <?php endif ?>
                <div class="title-section title-section_calculator">Hair Calculator Tool</div>
                <div class="block-calculator">
                    <form>
                        <div class="item-form">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Hair Length (inches):</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="range-input" />
                                </div>
                            </div>
                        </div>
                        <div class="item-form">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Hair Thickness:</label>
                                </div>
                                <div class="col-md-9">
                                    <select>
                                        <option value="1">Please Select</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="item-form">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Hair colour:</label>
                                </div>
                                <div class="col-md-9">
                                    <select>
                                        <option value="1">Please Select</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="item-form">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Is Your Hair</label>
                                </div>
                                <div class="col-md-9">
                                    <select>
                                        <option value="1">Please Select</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                        <option value="1">Type 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="block-calculator__buttons">
                            <a href="#">What is Virgin Hair?</a>
                            <button class="btn-main">Calculate My Hair Value</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="title-section title-section_categories">Hair Categories</div>
                <div class="sidebar-categories">
                    <?php
                    $hair_categories = get_field('hair_categories', 'option');
                    foreach ($hair_categories as $hair_category) { ?>
                        <div class="sidebar-categories__item">
                            <div class="sidebar-categories__title"><?php echo $hair_category['title']; ?></div>
                            <ul>
                                <?php foreach ($hair_category['category'] as $item) { ?>
                                    <li><a href="<?php echo get_term_link($item->term_id); ?>" class="sidebar-categories__link"><?php echo $item->name; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>                                
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="prices">
    <div class="container">
        <div class="title-section"><?php the_field('how_much_title','option') ?></div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Type</td>
                        <td>Length</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (get_field('how_much_table','option')): ?>
                        <?php foreach (get_field('how_much_table','option') as $how_much_table): ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $how_much_table['img']['url']; ?>" alt="<?php echo $how_much_table['img']['alt']; ?>">
                                </td>
                                <td>
                                    <div class="title-small"><?php echo $how_much_table['title']; ?></div>
                                </td>
                                <td><?php echo $how_much_table['length']; ?></td>
                                <td><strong><?php echo $how_much_table['price']; ?></strong></td>
                            </tr>                            
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="guide">
    <div class="container">
        <h2 class="title-section"><?php the_field('buying_or_selling_title','option') ?></h2>
        <div class="row row_guide">
            <?php if (get_field('buying_or_selling_items','option')): ?>
                <?php foreach (get_field('buying_or_selling_items','option') as $buying_or_selling): ?>
                    <div class="col-lg-6">
                        <div class="guide-block">
                            <div class="guide-block__title"><?php echo $buying_or_selling['title']; ?></div>
                            <p><?php echo $buying_or_selling['text']; ?></p>
                            <a href="<?php echo $buying_or_selling['link']; ?>" class="btn-main"><?php echo $buying_or_selling['title_link']; ?></a>
                        </div>
                    </div>                    
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>

<?php get_footer (); ?>