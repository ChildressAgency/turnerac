    <div class="footer-top">
    <?php if(get_field('display_special_offer', 'option')): ?>
      <div id="special-offer">
        <div class="container">
          <div class="special-inner">
            <div class="row">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-sm-5">
                    <h1>Special</h1>
                  </div>
                  <div class="col-sm-7 border-left">
                    <?php the_field('special_offer', 'option'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <p class="btn-pill btn-dark">
                  <a href="<?php echo home_url('contact-us'); ?>">Contact Us</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
      <div id="commercial" style="background-image:url(<?php echo get_field('commercial_section_image') ? get_field('commercial_section_image') : get_field('commercial_section_image', 'option'); ?>); <?php echo get_field('commercial_section_image') ? get_field('commercial_section_image_css') : get_field('commercial_section_image_css', 'option'); ?>">
        <div class="container">
          <div class="caption-wrap">
            <div class="caption">
              <h1 class="wow slideInLeft"><?php echo get_field('commercial_section_header') ? get_field('commercial_section_header') : get_field('commercial_section_header', 'option'); ?></h1>
              <h4 class="wow slideInLeft"><?php echo get_field('commercial_section_header') ? get_field('commercial_section_subheader') : get_field('commercial_section_subheader', 'option'); ?></h4>
              <hr class="section-title-divider" />
              <?php echo get_field('commercial_section_header') ? get_field('commercial_section_text') : get_field('commercial_section_text', 'option'); ?>
              <?php if(get_field('commercial_section_header') && get_field('commercial_section_link')): ?>
                <p class="btn-pill btn-white">
                  <a href="<?php the_field('commercial_section_link'); ?>"><?php the_field('commercial_section_link_text'); ?></a>
                </p>
              <?php elseif(get_field('commercial_section_link', 'option') && !get_field('commercial_section_header')): ?>
                <p class="btn-pill btn-white">
                  <a href="<?php the_field('commercial_section_link', 'option'); ?>"><?php the_field('commercial_section_link_text', 'option'); ?></a>
                </p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php if(is_front_page()): ?>
      <div class="container">
        <div class="row">
            <?php 
              if(get_field('featured_blog')){
                $featured_blog_args = array('p' => get_field('featured_blog'));
              }
              else{
                $featured_blog_args = array('posts_per_page' => 1, 'post_status' => 'publish');
              }
              $featured_blog = new WP_Query($featured_blog_args);
              if($featured_blog->have_posts()): ?>
          <div class="col-sm-6 blog-featured">
              <?php while($featured_blog->have_posts()) : $featured_blog->the_post(); 
                $featured_blog_id[] = get_the_ID(); ?>
                <img src="<?php echo get_field('featured_image') ? get_field('featured_image') : get_stylesheet_directory_uri() . '/images/several-compressors.jpg'; ?>" class="img-responsive center-block" alt="" />
                <div class="row blog-excerpt">
                  <div class="col-sm-4">
                    <div class="blog-date">
                      <span class="blog-day"><?php echo get_the_date('d'); ?></span>
                      <span class="blog-month"><?php echo get_the_date('M'); ?></span>
                      <hr />
                      <span class="blog-year"><?php echo get_the_date('Y'); ?></span>
                    </div>
                  </div>
                  <div class="col-sm-8 border-left">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">READ MORE</a>
                  </div>
                </div>
                <div class="share">
                  <?php
                    if(function_exists('ADDTOANY_SHARE_SAVE_KIT')){ 
                      ADDTOANY_SHARE_SAVE_KIT(array('linkname' => get_the_title(), 'linkurl' => get_permalink()));
                    } 
                  ?>
                  <span class="share-this">SHARE THIS</span>
                </div>
              <?php endwhile; ?>
          </div>
              <?php endif; wp_reset_postdata(); ?>
          <div class="col-sm-6">
            <?php
            if(isset($featured_blog_id)):
              $recent_posts = new WP_Query(array('posts_per_page' => 3, 'post__not_in' => $featured_blog_id));
              if($recent_posts->hoave_posts()) : while($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="row blog-short">
                  <div class="col-sm-4">
                    <img src="<?php echo get_field('featured_image') ? get_field('featured_image') : get_stylesheet_directory_uri() . '/images/several-compressors.jpg'; ?>" class="img-responsive center-block" alt="" />
                  </div>
                  <div class="col-sm-8">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </div>
                </div>
              <?php endwhile; ?>
            <p class="btn-pill btn-blue">
              <a href="<?php echo home_url('blog'); ?>">Read More</a>
            </p>
            <?php else: ?>
            <?php endif; wp_reset_postdata(); ?>
          <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    </div>
    <div class="footer"<?php if(is_front_page() && $featured_blog->have_posts()){ echo ' style="margin-top:60px;"'; }?>>
      <div class="footer-content-wrap">
        <div class="container">
          <div class="row">
            <div class="col-sm-5">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large2.png" class="img-responsive center-block" alt="Turner Air Conditioning" />
            </div>
            <div class="col-sm-2"><hr /></div>
            <div class="col-sm-5">
              <div class="social">
                <?php if(get_field('facebook', 'option')): ?>
                  <a href="<?php the_field('facebook', 'option'); ?>" class="facebook"></a>
                <?php endif; ?>
                <?php if(get_field('twitter', 'option')): ?>  
                  <a href="<?php the_field('twitter', 'option'); ?>" class="twitter"></a>
                <?php endif; ?>
                <?php if(get_field('instagram', 'option')): ?>
                  <a href="<?php the_field('instagram', 'option'); ?>" class="instagram"></a>
                <?php endif; ?>
                <?php if(get_field('youtube', 'option')): ?>
                  <a href="<?php the_field('youtube', 'option'); ?>" class="youtube"></a>
                <?php endif; ?>
                <?php if(get_field('linkedin', 'option')): ?>
                  <a href="<?php the_field('linkedin', 'option'); ?>" class="linkedin"></a>
                <?php endif; ?>
                <?php if(get_field('pinterest', 'option')): ?>
                  <a href="<?php the_field('pinterest', 'option'); ?>" class="pinterest"></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <p style="color:#000; font-size:16px; position:relative;">website created by <a href="http://childressagency.com" style="color:#000;">The Childress Agency</a></p>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>