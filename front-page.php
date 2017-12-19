<?php get_header(); ?>
    <div class="main">
      <div class="container">
        <div id="services">
          <div class="row">
            <div class="col-sm-6 mt40">
              <h1 class="wow slideInLeft">Our Services</h1>
              <h4 class="wow slideInLeft">Experienced Heating &amp; Air Specialists</h4>
              <hr class="section-title-divider" style="margin-bottom:0;" />
            </div>
            <div class="col-sm-6 mt40 text-right">
              <span class="question-label">QUESTIONS?</span>
              <p class="btn-pill btn-blue">
                <a href="<?php echo home_url('contact-us'); ?>">Contact Us</a>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="service-block animated fadeIn">
                <img src="<?php the_field('heating_air_image'); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Heating<br />&amp; Air</h3>
                  <hr />
                  <a href="<?php echo home_url('heating-air'); ?>">Learn More</a>
                </div>
                  <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Heating<br />&amp; Air</h3>
                  <p><?php the_field('heating_air_description'); ?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('heating-air'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="service-block animated fadeIn">
                <img src="<?php the_field('electrical_image'); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Electrical<br />Service</h3>
                  <hr />
                  <a href="<?php echo home_url('electrical-service'); ?>">Learn More</a>
                </div>
                  <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Electrical<br />Service</h3>
                  <p><?php the_field('electrical_description'); ?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('electrical-service'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="service-block animated fadeIn">
                <img src="<?php the_field('commercial_refrigeration_image'); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Commercial<br />Refrigeration</h3>
                  <hr />
                  <a href="<?php echo home_url('commercial-refrigeration'); ?>">Learn More</a>
                </div>
                  <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Commercial<br />Refrigeration</h3>
                  <p><?php the_field('commercial_refrigeration_description'); ?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('commercial-refrigeration'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="service-block animated fadeIn">
                <img src="<?php the_field('plumbing_gas_image'); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Plumbing<br />&amp; Gas</h3>
                  <hr />
                  <a href="<?php echo home_url('plumbing-gas'); ?>">Learn More</a>
                </div>
                  <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Plumbing<br />&amp; Gas</h3>
                  <p><?php the_field('plumbing_gas_description');?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('plumbing-gas'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="work" class="row">
          <div class="col-sm-6 mt80">
            <h1 class="wow slideInLeft">Our Work</h1>
            <h4 class="wow slideInLeft">Quality, Experienced Professionals</h4>
            <hr class="section-title-divider" />
            <?php the_field('our_work_text'); ?>
            <p class="btn-pill btn-blue">
              <a href="<?php echo home_url('about-us'); ?>">About Turner</a>
            </p>
          </div>
          <div class="col-sm-6 mt80">
            <img src="<?php the_field('our_work_image'); ?>" class="img-responsive center-block border-shadow" alt="" />
            <div class="row">
              <div class="col-sm-5 mt40">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="img-responsive center-block" alt="" />
              </div>
              <div class="col-sm-7 mt40">
                <p><?php the_field('our_work_image_caption'); ?></p>             
              </div>
            </div>
          </div>
        </div>
        <div class="free-estimate wow fadeInUp">
          <h5>Let's Get Started</h5>
          <h2>FREE ESTIMATE</h2>
          <hr />
          <p class="btn-pill btn-blue">
            <a href="<?php echo home_url('contact-us'); ?>">Free Estimate</a>
          </p>
        </div>
      </div>
    </div>

<?php get_footer(); ?>