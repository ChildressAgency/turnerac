<?php get_header(); ?>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
              <div class="blog-content">
                <?php the_content(); ?>
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