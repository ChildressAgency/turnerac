<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
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
    <style type="text/css">
      #bodyTable{
        width:536pt;
        margin-left:auto;
        margin-right:auto;
        border:1px solid #000;
        font-family:sans-serif;
        font-size:14px;
      }
      img{
        display:block;
        max-width:100%;
      }
      table td{
        border:1px solid #000;
      }

      .bg-highlight{
        background-color:#25ace1 !important;
      }
      #installItems td{
        padding:0px 2px;
      }
      #installItems tr:nth-child(even){
        background-color:#dbe4f0;
      }
      #warranties td{
        padding:0px 2px;
      }
      #warranties tr:nth-child(even){
        background-color:#dbe4f0;
      }
      .product-img{
        width:100%;
      }
    </style>
  </head>

  <body <?php body_class(); ?>>
    <table id="bodyTable" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table id="header" cellpadding="0" cellspacing="0">
            <tr>
              <td style="width:75%;">
                <table id="logoAddress" cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="width:60%; padding:5px; border:none;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large.png" /></td>
                    <td style="width:40%; border:none;">
                      <table id="headerAddress" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="border:none; border-left:1px solid #000; width:80%;">
                            <p style="color:#26ace2; text-align:left; font-size:12px; padding:0px 5px;">(540) 840-7787<br />info@turnerairconditioning.com</p>
                            <p style="color:#000; text-align:right; font-size:12px; padding:0px 5px;">2215 Plank Rd. #292<br />Fredericksburg, Virginia 22401</p>
                          </td>
                          <td style="border:none; padding:5px; width:20%;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bbb-logo.png" /></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
              <td style="width:25%;">
                <table id="installationDate" cellpadding="0" cellspacing="0" style="width:100%;">
                  <tr>
                    <td class="bg-highlight">&nbsp;</td>
                    <td class="bg-highlight">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="bg-highlight" style="width:60%; font-size:12px; font-weight:bold; padding:0px 2px;">Installation Date</td>
                    <td class="bg-highlight" style="width:40%; font-size:12px; padding:0px 2px;"><?php the_field('installation_date'); ?></td>
                  </tr>
                  <tr>
                    <td class="bg-highlight" style="width:60%; font-size:12px; font-weight:bold; padding:0px 2px;">Start Date</td>
                    <td class="bg-highlight" style="width:60%; font-size:12px; padding:0px 2px;"><?php the_field('start_date'); ?></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="border-bottom:none;">&nbsp;</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <table id="mainBody" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top" style="width:75%; vertical-align:top;">
                <table id="mainContent" cellpadding="0" cellspacing="0" style="width:100%;">
                  <tr>
                    <td>
                      <table id="clientInfo" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                          <td style="width:33.3%; text-align:center; font-size:12px; font-weight:bold;">Name</td>
                          <td style="width:33.3%; text-align:center; font-size:12px; font-weight:bold;">Address</td>
                          <td style="width:33.3%; text-align:center; font-size:12px; font-weight:bold;">Phone</td>
                        </tr>
                        <tr>
                          <td class="bg-highlight" style="width:33.3%; padding:0px 2px"><?php echo get_the_title() ? get_the_title() : '&nbsp;'; ?></td>
                          <td class="bg-highlight" style="width:33.3%; padding:0px 2px"><?php echo get_field('street_address') ? get_field('street_address') : '&nbsp;'; ?><br /><?php echo get_field('city_state_zip') ? get_field('city_state_zip') : '&nbsp;'; ?></td>
                          <td class="bg-highlight" style="width:33.3%; padding:0px 2px"><?php echo get_field('phone') ? get_field('phone') : '&nbsp;'; ?></td>
                        </tr>
                        <tr>
                          <td style="width:33.3%;">
                            <table id="quoteDate" cellpadding="0" cellspacing="0" style="width:100%;">
                              <tr>
                                <td style="width:40%; font-size:12px; font-weight:bold; padding:0px 2px">Date</td>
                                <td style="width:60%; padding:0px 2px"><?php echo get_the_date('m/d/Y'); ?></td>
                              </tr>
                            </table>
                          </td>
                          <td style="width:33.3%; font-size:12px; font-weight:bold; padding:0px 2px">Installation Address</td>
                          <td style="width:33.3%; font-size:12px; font-weight:bold; padding:0px 2px">Email Address</td>
                        </tr>
                        <tr>
                          <td style="width:33.3%;">
                            <table id="tenantInfo" cellpadding="0" cellspacing="0" style="width:100%;">
                              <tr>
                                <td style="width:100%; font-size:12px; font-weight:bold; text-align:center;">Tenant Name</td>
                              </tr>
                              <tr>
                                <td style="width:100%; padding:0px 2px"><?php echo get_field('tenant_name') ? get_field('tenant_name') : '&nbsp;'; ?></td>
                              </tr>
                            </table>
                          </td>
                          <td style="width:33.3%;"><?php echo get_field('installation_street_address') ? get_field('installation_street_address') : '&nbsp;'; ?><br /><?php echo get_field('installation_city_state_zip') ? get_field('installation_city_state_zip') : '&nbsp;'; ?></td>
                          <td style="width:33.3%;"><?php echo get_field('email') ? get_field('email') : '&nbsp;'; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td class="bg-highlight" style="width:100%; padding:0px 2px; text-align:center; font-weight:bold; font-size:12px;">"Turner Air Conditioning will properly install the following"</td>
                  </tr>
                  <tr>
                    <td>
                      <table id="installItems" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                          <th style="width:30%; border:1px solid #000;">To Be Installed</th>
                          <th style="width:30%; border:1px solid #000;">New/Existing/NA</th>
                          <th style="width:40%; border:1px solid #000;">Note/Description</th>
                        </tr>
                        <!-- installation items loop -->
                        <?php
                          $items = get_field('item');
                          if($items){
                            foreach($items as $item){
                              echo '<tr><td>' . ($item['part'] ? $item['part'] : '&nbsp;') . '</td>';
                              echo '<td>' . ($item['new_existing_na'] ? $item['new_existing_na'] : '&nbsp;') . '</td>';
                              echo '<td>' . ($item['note_description'] ? $item['note_description'] : '&nbsp;') . '</td></tr>';
                              $item_price = get_sub_field('price');
                              if(is_numeric($item_price)){
                                $subtotal += $item_price; 
                              }
                            }
                          }
                        ?>
                        <!-- end installation items loop -->
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td class="bg-highlight" style="font-size:12px; font-weight:bold; text-align:center;">Class B Contractor, Mechanical Tradesman License #2710023723. Contractors License #2705012073.</td>
                  </tr>
                  <tr>
                    <td style="padding:0px 2px;"><?php echo get_field('project_notes') ? get_field('project_notes') : '&nbsp;'; ?></td>
                  </tr>
                  <tr>
                    <td class="bg-highlight" style="font-size:12px; font-weight:bold; text-align:center;">With every quality installation when applicable</td>
                  </tr>
                  <tr>
                    <td style="font-size:12px; padding:0px 2px;">* Refrigerant recovery and recycling * 500 Micron Evacuation of refrigerant system & charged properly * Local permits if required & meet all code requirements * Removal and disposal of old equipment, Start and check system operation upon final completion * No Lemon Guarantee * True 24/7 Emergency service * Factory trained/award winning technicians * Satisfaction Guarantee<hr /><span style="display:block; text-align:center;">Turner Conditioning is not responsible for existing duct/air flow issues caused by poor original duct design when re-used!</span></td>
                  </tr>
                  <tr>
                    <td class="bg-highlight" style="font-size:12px; font-weight:bold; text-align:center;">Your system is protected by the following warranties with proper registration</td>
                  </tr>
                  <tr>
                    <td>
                      <table id="warrantyInfo" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                          <td style="width:75%;">
                            <table id="warranties" cellpadding="0" cellspacing="0" style="width:100%;">
                              <?php if(have_rows('warranties')): while(have_rows('warranties')) : the_row(); ?>
                                <tr>
                                  <td style="width:25%;"><?php echo get_sub_field('warranty_term') ? get_sub_field('warranty_term') : '&nbsp;'; ?></td>
                                  <td style="width:75%;"><?php echo get_sub_field('warranty_details') ? get_sub_field('warranty_details') : '&nbsp;'; ?></td>
                                </tr>
                              <?php endwhile; endif; ?>
                            </table>
                          </td>
                          <td style="width:25%;">&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table id="subtotal" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                          <td style="width:75%; padding:0px 2px; font-size:12px; font-weight:bold;">The above work will be performed for the sum of:</td>
                          <td style="width:25%; padding:0px 2px;"><?php var_dump($subtotal); //echo $subtotal ? $subtotal : '&nbsp;'; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table id="options" cellpadding="0" cellspacing="0" style="width:100%;">
                        <?php 
                          $i=0; 
                          $grandtotal = $subtotal;
                          if(have_rows('options')): while(have_rows('option')): the_row(); ?>
                          <tr>
                            <td class="bg-highlight" style="width:75%; padding:0px 2px;"><span style="font-weight:bold;"><?php if($i==0){ echo 'Options: '; } ?><?php echo the_sub_field('option'); ?></span></td>
                            <td style="width:25%;"><?php the_sub_field('option_price'); ?></td>
                          </tr>
                        <?php 
                          $option_price = get_sub_field('option_price');
                          if(is_numeric($option_price)){
                            $grandtotal += $option_price;
                          }  
                          $i++; endwhile; endif; ?>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table id="grandTotal" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                          <td style="width:75%; text-align:center; font-size:12px; font-weight:bold;">Total Investment</td>
                          <td style="width:25%; padding:0px 2px;"><?php echo $grandtotal ? $grandtotal : '&nbsp;'; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table id="terms" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                          <td style="width:15%; font-size:12px; font-weight:bold; padding:0px 2px;">Terms:</td>
                          <td class="bg-highlight" style="width:85%; padding:0px 2px;"><?php the_field('payment_terms'); ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td class="bg-highlight" style="width:100%; padding:0px 2px;"><span style="font-weight:bold;">Install Notes: <?php the_field('installation_notes'); ?></span></td>
                  </tr>
                  <tr>
                    <td>
                      <table id="signature" cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                          <td colspan="2" style="text-align:center; font-size:12px;">The quoted prices are good for 30 days and may change after that time.</td>
                        </tr>  
                        <tr>
                          <td style="width:75%; padding:7px 2px; font-weight:bold;">Accepted (Client)</td>
                          <td style="width:25%; padding:7px 2px; font-weight:bold;">Date</td>
                        </tr>
                        <tr>
                          <td colspan="2" style="text-align:center; font-size:12px;">&copy;Turner Air Conditioning (All Rights Reserved)</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
              <td id="sidebar" style="width:25%;">
                <table id="productImages" cellpadding="0" cellspacing="0" style="width:100%;">
                  <?php if(have_rows('items')): while(have_rows('items')): the_row(); ?>
                    <?php 
                      $selected_part = get_sub_field('parts');
                      $selected_part_slug = $part['value'];

                      $part = new WP_Query(array(
                        'post_type' => 'parts',
                        'pagename' => $selected_part_slug
                      ));

                      if($part->have_posts()): while($part->have_posts()): $part->the_post();
                        if(get_field('picture')): ?>
                          <tr>
                            <td>
                              <table class="product-image" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="<?php the_field('picture'); ?>" /></td>
                                </tr>
                                <tr>
                                  <td class="bg-highlight"><?php the_title(); ?></td>
                                </tr>                        
                              </table>
                            </td>
                          </tr>
                    <?php endif; endwhile; endif; wp_reset_postdata(); ?> ?>
                  <?php endwhile; endif; ?>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    
    <?php wp_footer(); ?>
  </body>
</html>