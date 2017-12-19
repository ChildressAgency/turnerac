<?php get_header(); ?>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="page-content">
              <h2>Commercial Services</h2>
              <h4><?php the_field('page_subtitle'); ?></h4>
              <hr class="section-title-divider" />
              <?php the_field('content_section_1'); ?>
              <div class="why-choose-section">
                <h2 class="text-center"><?php the_field('why_choose_section_title'); ?></h2>
                <h4 class="text-center"><?php the_field('why_choose_section_subtitle'); ?></h4>
                <div class="row">
                  <div class="col-sm-4">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/globe-icon.png" class="img-responsive center-block" alt="" />
                    <h5><?php the_field('why_choose_block_1_text'); ?></h5>
                  </div>
                  <div class="col-sm-4">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/academic-cap-icon.png" class="img-responsive center-block" alt="" />
                    <h5><?php the_field('why_choose_block_2_text'); ?></h5>
                  </div>
                  <div class="col-sm-4">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shield-icon.png" class="img-responsive center-block" alt="" />
                    <h5><?php the_field('why_choose_block_3_text'); ?></h5>
                  </div>
                </div>
              </div>
              <?php the_field('content_section_2'); ?>
              <div class="free-estimate">
                <h5>Let's get started</h5>
                <h2>FREE ESTIMATE</h2>
                <hr />
                <p class="btn-pill btn-blue">
                  <a href="<?php echo home_url('contact-us'); ?>">Free Estimate</a>
                </p>
              </div>
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