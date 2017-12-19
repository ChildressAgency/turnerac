<?php get_header(); ?>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="page-content">
              <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <h2><?php echo is_page('contact-us') ? 'In need of service?' : get_the_title(); ?></h2>
                <h4><?php the_field('page_subtitle'); ?></h4>
                <hr />
                <?php the_content(); ?>
              <?php endwhile; endif; ?>
              <?php if(!is_page('contact-us')): ?>
              <div class="free-estimate">
                <h5>Let's get started</h5>
                <h2>FREE ESTIMATE</h2>
                <hr />
                <p class="btn-pill btn-blue">
                  <a href="<?php echo home_url('contact-us'); ?>">Free Estimate</a>
                </p>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-4 sidebar">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large.png" class="img-responsive center-block" alt="Turner Air Conditioning" />
            <?php get_template_part('custom-sidebar'); ?>
          </div>
        </div>
      </div>      
    </div>
<?php get_footer(); ?>