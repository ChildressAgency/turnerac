<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="Cache-control" content="private">

    <title>Turner Air Conditioning</title>
    <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76483065-11', 'auto');
  ga('send', 'pageview');

</script>
  </head>
  <body>
    <nav class="navbar">
      <div class="masthead">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <a href="<?php echo home_url(); ?>" class="brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large2.png" class="img-responsive" alt="Turner Air Conditioning" /></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="col-sm-6">
              <div class="row masthead-contact hidden-xs">
              <?php 
                $phone_number = get_field('phone', 'option'); 
                $email = get_field('email', 'option'); 
              ?>
                <div class="col-sm-6">
                  <a href="tel:<?php echo $phone_number; ?>" class="phone"><?php echo $phone_number; ?></a>
                </div>
                <div class="col-sm-6">
                  <a href="mailto:<?php echo $email; ?>" class="email">E-Mail Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="navbar-header">
          <?php
            $nav_defaults = array(
              'theme_location' => 'header-nav',
              'menu' => '',
              'container' => 'div',
              'container_class' => 'navbar-collapse collapse',
              'container_id' => 'navbar',
              'menu_class' => 'nav nav-justified',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'turnerac_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="visible-xs-block"><a href="tel:' . $phone_number . '" class="phone">' . $phone_number . '</a></li><li class="visible-xs-block"><a href="mailto:' . $email . '" class="email">' . $email . '</a></li>%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($nav_defaults);
            function turnerac_fallback_menu(){ ?>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav nav-justified">
                  <li class="visible-xs-block"><a href="tel:<?php echo $phone_number; ?>" class="phone"><?php echo $phone_number; ?></a></li>
                  <li class="visible-xs-block"><a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a></li>
                  <li><a href="<?php echo home_url('heating-air'); ?>">Heating &amp; Air</a></li>
                  <li><a href="<?php echo home_url('electrical'); ?>">Electrical</a></li>
                  <li><a href="<?php echo home_url('commercial-refrigeration'); ?>">Commercial Refrigeration</a></li>
                  <li><a href="<?php echo home_url('plumbing-gas'); ?>">Plumbing &amp; Gas</a></li>
                  <li><a href="<?php echo home_url('contact-us'); ?>">Contact Us</a></li>
                </ul>
              </div>
            <?php } ?>
        </div>
      </div>
    </nav>
    <div class="hero<?php if(is_front_page()){ echo ' home-hero'; } ?>" style="background-image:url(<?php the_field('hero_image'); ?>); <?php the_field('hero_image_css'); ?>">
      <!--<div class="overlay"></div>-->
      <?php if(is_front_page()): ?>
        <div id="flakeContainer"></div>
      <?php endif; ?>
      <div class="caption-wrap">
        <div class="caption">
          <?php if(is_front_page()): ?>
            <h1 class="animated slideInLeft"><?php the_field('hero_caption_header'); ?></h1>
          <?php elseif(is_single()): ?>
            <h2><?php echo get_the_date('F j, Y'); ?></h2>
          <?php else: ?>
            <?php if(get_field('hero_caption_header')): ?>
              <h2><?php the_field('hero_caption_header'); ?></h2>
            <?php else: ?>
              <h2><?php echo get_the_title(); ?></h2>
            <?php endif; ?>
          <?php endif; ?>
          
          <?php if(is_single()): ?>
            <h3><?php echo get_the_title(); ?></h3>
          <?php elseif(get_field('hero_subheader')): ?>
            <h3<?php if(is_front_page()){ echo ' class="animated slideInLeft"'; } ?>><?php the_field('hero_subheader'); ?></h3>
          <?php endif; ?>
          <hr />
          <?php if(get_field('hero_tagline')): ?>
            <p><?php the_field('hero_tagline'); ?></p>
          <?php endif; ?>
          <?php if(get_field('hero_button_link')): ?>
            <p class="btn-pill btn-white">
              <a href="<?php the_field('hero_button_link'); ?>"><?php the_field('hero_button_text'); ?></a>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </div>
