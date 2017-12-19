<?php get_header(); ?>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="blog-featured">
              <?php 
                $home_page_id = get_option('page_on_front');
                if(get_field('featured_blog', $home_page_id)){
                  $featured_blog_args = array('p' => get_field('featured_blog', $home_page_id));
                }
                else{
                  $featured_blog_args = array('posts_per_page' => 1, 'post_status' => 'publish');
                }
                $featured_blog = new WP_Query($featured_blog_args);
                if($featured_blog->have_posts()) : while($featured_blog->have_posts()) : $featured_blog->the_post();
                $featured_blog_id[] = get_the_ID(); ?>
              <img src="<?php echo (get_field('featured_image')) ? get_field('featured_image') : get_stylesheet_directory_uri() . '/images/several-compressors.jpg'; ?>" class="img-responsive center-block" alt="" />
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
                </div>
              </div>
              <div class="row read-share">
                <div class="col-sm-6">
                  <p class="btn-pill btn-blue">
                    <a href="<?php the_permalink(); ?>">Read More</a>
                  </p>
                </div>
                <div class="col-sm-6">
                  <div class="share">
                    <?php
                      if(function_exists('ADDTOANY_SHARE_SAVE_KIT')){ 
                        ADDTOANY_SHARE_SAVE_KIT(array('linkname' => get_the_title(), 'linkurl' => get_permalink()));
                      } 
                    ?>
                    <span>SHARE THIS</span>
                  </div>
                </div>
              </div>
              <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
            <div id="posts">
              <?php 
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $ppp = 3;
                $query = new WP_Query(array(
                  'posts_per_page' => $ppp,
                  'paged' => $paged,
                  'post__not_in' => $featured_blog_id
                ));
                if($query->have_posts()): ?>
                  <div class="page" id="p<?Php echo $paged; ?>">
                    <?php while($query->have_posts()) : $query->the_post(); ?>
                      <div class="blog-post">
                        <img src="<?php echo (get_field('featured_image')) ? get_field('featured_image') : get_stylesheet_directory_uri() . '/images/several-compressors.jpg'; ?>" class="img-responsive center-block" alt="" />
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
                      </div>
                    <?php endwhile; ?>
                  </div>
                <?php endif; ?>
            </div>
            <p class="btn-pill btn-blue">
              <a href="#">
                <span class="has-spinner">Show More <span class="spinner"><i class="glyphicon glyphicon-refresh gly-spin"></i></span></span>
              </a>
            </p>
          </div>
          <div class="col-sm-4 sidebar">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large.png" class="img-responsive center-block" alt="Turner Air Conditioning" />
            <?php get_template_part('custom-sidebar'); ?>
          </div>
        </div>
      </div>    
    </div>
<?php get_footer(); ?>