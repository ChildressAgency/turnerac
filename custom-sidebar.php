<?php
  if(is_home()){
    $blog_page = get_page_by_path('blog');
    $blog_page_id = $blog_page->ID;
    $sidebar_widgets = get_field('sidebar_settings', $blog_page_id);
  }
  else{
    $sidebar_widgets = get_field('sidebar_settings');
  }
  
  if($sidebar_widgets): ?>
    <?php if(in_array('contact-form', $sidebar_widgets)): ?>
      <?php echo do_shortcode('[contact-form-7 id="107" title="Sidebar Contact Form"]'); ?>
    <?php endif; ?>
    
    <?php if(in_array('contact-info', $sidebar_widgets)): ?>
      <div class="sidebar-contact-page">
        <h4>Still have a question?</h4>
        <h2>Contact Us!</h2>
        <hr />
        <p><span class="contact-title">Address</span><?php the_field('street_address', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?></p>
        <p><span class="contact-title">Phone</span><?php the_field('phone', 'option'); ?></p>
        <p><span class="contact-title">E-Mail</span><?php the_field('email', 'option'); ?></p>
      </div>    
    <?php endif; ?>
    
    <?php if(in_array('service-block', $sidebar_widgets)): ?>
      <?php 
        $featured_service = get_field('featured_service'); 
        $home_page_id = 34;
        switch($featured_service){
          case 'heating-air': ?>
            <div id="services">
              <h4 class="text-center mt80">You may also be interested in</h4>
              <div class="service-block">
                <img src="<?php the_field('heating_air_image', $home_page_id); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Heating<br />&amp; Air</h3>
                  <hr />
                  <a href="<?php echo home_url('heating-air'); ?>">Learn More</a>
                </div>
                <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Heating<br />&amp; Air</h3>
                  <p><?php the_field('heating_air_description', $home_page_id); ?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('heating-air'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
          break;
          case 'electrical': ?>
            <div id="services">
              <h4 class="text-center mt80">You may also be interested in</h4>
              <div class="service-block">
                <img src="<?php the_field('electrical_image', $home_page_id); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Electrical<br />Service</h3>
                  <hr />
                  <a href="<?php echo home_url('electrical-service'); ?>">Learn More</a>
                </div>
                <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Electrical<br />Service</h3>
                  <p><?php the_field('electrical_description', $home_page_id); ?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('electrical-service'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
          break;
          case 'commercial-refrigeration': ?>
            <div id="services">
              <h4 class="text-center mt80">You may also be interested in</h4>
              <div class="service-block">
                <img src="<?php the_field('commercial_refrigeration_image', $home_page_id); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Commercial<br />Refrigeration</h3>
                  <hr />
                  <a href="<?php echo home_url('commercial-refrigeration'); ?>">Learn More</a>
                </div>
                <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Commercial<br />Service</h3>
                  <p><?php the_field('commercial_refrigeration_description', $home_page_id); ?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('commercial-refrigeration'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <?php 
          break;
          case 'plumbing-gas': ?>
            <div id="services">
              <h4 class="text-center mt80">You may also be interested in</h4>
              <div class="service-block">
                <img src="<?php the_field('plumbing_gas_image', $home_page_id); ?>" class="img-responsive center-block" alt="" />
                <div class="caption">
                  <h3>Plumbing<br />&amp; Gas</h3>
                  <hr />
                  <a href="<?php echo home_url('plumbing-gas'); ?>">Learn More</a>
                </div>
                <a href="#" class="service-block-open"></a>
                <div class="service-hover">
                  <h3>Plumbing<br />&amp; Gas</h3>
                  <p><?php the_field('plumbing_gas_description', $home_page_id); ?></p>
                  <div class="service-block-footer">
                    <span class="small-logo"></span>
                    <hr />
                    <a href="<?php echo home_url('plumbing-gas'); ?>">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
            <?php 
          break;
          default:
            '';
        }
      ?>
    <?php endif; ?>
  <?php endif; ?>