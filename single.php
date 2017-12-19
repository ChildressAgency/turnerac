<?php get_header(); ?>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
              <div class="blog-breadcrumb">
                <a href="<?php echo home_url('blog'); ?>">Turner A/C blog</a> &gt; <span><?php the_title(); ?></span>
              </div>
              <div class="blog-content">
                <?php the_content(); ?>
              </div>
              <div class="row blog-excerpt">
                <div class="col-sm-4">
                  <div class="blog-date">
                    <span class="blog-day"><?php echo get_the_date('d'); ?></span>
                    <span class="blog-month"><?php echo get_the_date('M'); ?></span>
                    <hr />
                    <span class="blog-year"><?php echo get_the_date('Y'); ?></span>
                  </div>
                </div>
                <div class="col-sm-8 border-left" style="min-height:131px;">
                  <div class="share">
                    <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
                      ADDTOANY_SHARE_SAVE_KIT( array( 'use_current_page' => true ) );
                    } ?>                    
                    <span>SHARE THIS</span>
                  </div>
                </div>
              </div>
            <?php endwhile; endif; ?>
          </div>
          <div class="col-sm-4 sidebar">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large.png" class="img-responsive center-block" alt="Turner Air Conditioning" />
            <?php get_template_part('custom-sidebar'); ?>
          </div>
        </div>
      </div>      
    </div>
<?php get_footer(); ?>