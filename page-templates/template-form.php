<?php
/* Template name: Form */
get_header (); ?>

<div class="container">
    <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
</div>

<div class="submit-listing">
    <div class="container">
        <div class="title-section">Submit Your Listing</div>
        <div class="block-form">
            <p class="block-form__title">Congratulations! You’ve registered with HairSellon! The only hair marketplace with HairSellon Seller Protection and a Certified Buyer Network.</p>
            <p>Beautiful naturally highlighted dark blonde virgin hair from 7 year old. Thick, shiny, and healthy. From smoke and alcohol free home.</p>


            <form enctype="multipart/form-data" method="post" action="#" class="form-horizontal">
                <div class="item-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Advert Title*:</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="title" placeholder="$" required="required">
                            <div class="item-form__descr">Must include Hair length and color title</div>
                        </div>
                    </div>
                </div>
                <div class="item-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Price*:</p>
                        </div>

                        <div class="col-lg-10">
                            <input type="text" name="price" placeholder="$" required="required">
                            <div class="item-form__descr">If you are unsure on pricing, use the Hair calculator on try browsing throgh similar listing to get an idea of cost, or state “Open to Offers”</div>
                        </div>
                    </div>
                </div>
                <div class="item-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Hair Length*:</p>
                        </div>
                        <div class="col-lg-10">
                            <select name="length" required="required">
                                <option value="1">Choose Hair Length (inches)</option>
                                <option value="Under 5 Inches">Under 5 Inches</option>
                                <option value="5-10 Inches">5-10 Inches</option>
                                <option value="15-25 Inches">15-25 Inches</option>
                                <option value="25-30 inches">25-30 inches</option>
                                <option value="30 Inches Plus">30 Inches Plus</option>
                            </select>
                            <div class="item-form__descr">The total length of the hair you wish to sell</div>
                        </div>
                    </div>
                </div>
                <div class="item-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Hair Thickness*:</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="thickness" placeholder="" required="required">
                            <div class="item-form__descr">The total length of the hair you wish to sell</div>
                        </div>
                    </div>
                </div>
                <div class="item-form">
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Images:</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="file" name="my_image_upload[]" id="my_image_upload"  multiple="true" />
                            <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
                        </div>
                    </div>
                </div>
                <input class="btn-main" type="submit" name="submit_my_image_upload" value="Submit" />
            </form>
        </div>
    </div>
</div>

<?php get_footer (); ?>