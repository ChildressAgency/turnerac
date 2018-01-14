<?php
add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'turnerac_scripts', 100);
function turnerac_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );
  wp_register_script(
    'turnerac-scripts', 
    get_template_directory_uri() . '/js/turnerac-scripts.js', 
    array('jquery'), 
    '', 
    true
  );
  
  if(!is_singular('quotes')){
    wp_enqueue_script('bootstrap-script');
    wp_enqueue_script('turnerac-scripts');  
  }
}

add_action('wp_enqueue_scripts', 'turnerac_styles');
function turnerac_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
  wp_register_style('turnerac', get_template_directory_uri() . '/style.css');
  wp_register_style('animate-css', get_template_directory_uri() . '/css/animate.min.css');
  
  if(!is_singular('quotes')){
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('animate-css');
    wp_enqueue_style('turnerac');
  }
}

add_action('admin_enqueue_scripts', 'turnerac_admin_script');
function turnerac_admin_script($hook){
  $post_type = get_post_type();

  if($post_type != 'quotes'){ return; }

  wp_register_script(
    'turnerac-quotes-scripts',
    get_template_directory_uri() . '/js/quotes-scripts.js',
    array('jquery'),
    '',
    true
  );
  wp_enqueue_script('turnerac-quotes-scripts');

  wp_localize_script(
    'turnerac-quotes-scripts', 
    'qs_vars', 
    array('qs_nonce' => wp_create_nonce('qs_nonce'))
  );
}

register_nav_menu( 'header-nav', 'Header Navigation' );

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				//$atts['href']   		= '#';
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
				//$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .' class="bold"><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .' class="bold">';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

add_filter( 'excerpt_length', 'turnerac_custom_excerpt_length', 999 );
function turnerac_custom_excerpt_length( $length ) {
  return 12;
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'Contact Info',
    'menu_title' => 'Contact Info',
    'menu_slug' => 'contact-info',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
  
  acf_add_options_page(array(
    'page_title' => 'Footer Settings',
    'menu_title' => 'Footer Settings',
    'menu_slug' => 'footer-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
  /*
  acf_add_options_sub_page(array(
    'page_title' => 'Social Links',
    'menu_title' => 'Social Links',
    'parent_slug' => 'footer-settings'
  ));
  acf_add_options_sub_page(array(
    'page_title' => 'Special Offer',
    'menu_title' => 'Special Offer',
    'parent_slug' => 'footer-settings'
  ));
  acf_add_options_sub_page(array(
    'page_title' => 'Commercial Section',
    'menu_title' => 'Commercial Section',
    'parent_slug' => 'footer-settings'
  ));
  */
}

add_action('init', 'turnerac_create_post_type');
function turnerac_create_post_type(){
  $quotes_labels = array(
    'name' => 'Quotes',
    'singular_name' => 'Quote',
    'menu_name' => 'Quotes',
    'add_new_item' => 'Add New Quote',
    'search_items' => 'Search Quotes'
  );
  $quotes_args = array(
    'labels' => $quotes_labels,
    'public' => true,
    'menu_position' => 5,
    'supports' => array('title', 'author', 'revisions'),
    'menu_icon' => 'dashicons-media-spreadsheet'
  );
  register_post_type('quotes', $quotes_args);

  $parts_labels = array(
    'name' => 'Parts',
    'singular_name' => 'Part',
    'menu_name' => 'Parts',
    'add_new_item' => 'Add New Part',
    'search_items' => 'Search Parts'
  );
  $parts_args = array(
    'labels' => $parts_labels,
    'public' => true,
    'menu_position' => 6,
    'supports' => array('title', 'author'),
    'taxonomies' => array('part_category'),
    'menu_icon' => 'dashicons-hammer'
  );
  register_post_type('parts', $parts_args);
  register_taxonomy('part_category',
    'parts',
    array(
      'hierarchical' => true,
      'show_admin_column' => true,
      'labels' => array(
        'name' => 'Parts Categories',
        'singular_name' => 'Parts Category'
      )
    )
  );
}

add_action('restrict_manage_posts', 'turnerac_filter_parts_by_taxonomy');
function turnerac_filter_parts_by_taxonomy(){
  global $typenow;
  $post_type = 'parts';
  $taxonomy = 'part_category';

  if($typenow == $post_type){
    $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
    $info_taxonomy = get_taxonomy($taxonomy);
    wp_dropdown_categories(array(
      'show_option_all' => __("Show All {$info_taxonomy->label}"),
      'taxonomy' => $taxonomy,
      'name' => $taxonomy,
      'orderby' => 'name',
      'selected' => $selected,
      'show_count' => true,
      'hide_empty' => false,
    ));
  }
}

add_filter('parse_query', 'turnerac_convert_part_id_to_term_in_query');
function turnerac_convert_part_id_to_term_in_query($query){
  global $pagenow;
  $post_type = 'parts';
  $taxonomy = 'part_category';
  $q_vars = &$query->query_vars;

  if($pagenow == 'edit.php'
      && isset($q_vars['post_type'])
      && $q_vars['post_type'] == $post_type
      && isset($q_vars[$taxonomy])
      && is_numeric($q_vars[$taxonomy])
      && $q_vars[$taxonomy] != 0){
    
    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
    $q_vars[$taxonomy] = $term->slug;
  }
}

add_filter('manage_edit-parts_columns', 'turnerac_edit_parts_columns');
function turnerac_edit_parts_columns($column){
  $columns = array(
    'cb' => '<input type="checkbox" />',
    'title' => __('Part'),
    'price' => __('Price'),
    'part_category' => __('Part Category'),
    'date' => __('Date')
  );
  return $columns;
}

add_action('manage_parts_posts_custom_column', 'turnerac_manage_parts_columns', 10, 2);
function turnerac_manage_parts_columns($column, $post_id){
  if($column == 'price'){
    echo get_field('price');
  }
  elseif($column == 'part_category'){
    $terms = get_the_terms($post_id, 'part_category');

    if($terms && !is_wp_error($terms)){
      $term_list = array();

      foreach($terms as $term){
        $term_list[] = $term->name;
      }

      $part_categories = implode(', ', $term_list);
      echo $part_categories;
    }
  }
}

add_filter('enter_title_here', 'turnerac_custom_title_placeholders');
function turnerac_custom_title_placeholders($title){
  $screen = get_current_screen();

  if($screen->post_type == 'quotes'){
    $title = 'Customer Name';
  }
  elseif($screen->post_type == 'parts'){
    $title = 'Part Name';
  }

  return $title;
}

//part field key: field_5a46795b00fbb
add_filter('acf/load_field/key=field_5a53ac2c87acf', 'turnerac_load_part_select');
function turnerac_load_part_select($field){

  $field['choices'] = array();

  $part_list = new WP_Query(array(
    'post_type' => 'parts',
    'posts_per_page' => -1,
    'orderby' => 'name'
  ));
  //var_dump($part_list);

  if($part_list->have_posts()){
    while($part_list->have_posts()){
      $part_list->the_post();
      $part_id = get_the_ID();
      $post_title = get_post_field('post_name', $part_id);
      $post_name = get_post_field('post_title', $part_id);

      $field['value'] = $post_title;
      $field['choices'][$post_title] = $post_name;
    }
  }

  return $field;
}

add_action('wp_ajax_qs_add_parts', 'turnerac_add_parts');
add_action('wp_ajax_nopriv_qs_add_parts', 'turnerac_add_parts');
function turnerac_add_parts($selected_part_type){
  //verify nonce
  if(!isset($_POST['qs_nonce']) || !wp_verify_nonce($_POST['qs_nonce'], 'qs_nonce')){
    wp_die('Permission denied');
  }

  $selected_part_type = $_POST['part_type'];

  $parts_query = new WP_Query(array(
    'post_type' => 'parts',
    'tax_query' => array(
      array(
        'taxonomy' => 'part_category',
        'field' => 'slug',
        'terms' => $selected_part_type
      ),
    )
  ));

  $parts = array();
  if($parts_query->have_posts()){
    while($parts_query->have_posts()){
      $parts_query->the_post();
      //$parts[get_the_ID()] = get_the_title();
      $parts[get_the_ID()]['part_name'][get_the_title()];
      $parts[get_the_ID()]['price'][get_field('price')];
      $parts[get_the_ID()]['image_url'][get_field('picture')];

      $parts[get_the_ID()] = array(
        'part_name' => get_the_title(),
        'price' => get_field('price'),
        'image_url' => get_field('picture')
      );
    }
  }

  return wp_send_json($parts);

  wp_die();
}

add_action('wp_ajax_qs_filter_parts', 'turnerac_filter_parts');
add_action('wp_ajax_nopriv_qs_filter_parts', 'turnerac_filter_parts');
function turnerac_filter_parts(){
  //verify nonce
  if(!isset($_POST['qs_nonce']) || !wp_verify_nonce($_POST['qs_nonce'], 'qs_nonce')){
    wp_die('Permission denied');
  }

  $selected_part_type = $_POST['part_type'];

  $parts_query = new WP_Query(array(
    'post_type' => 'parts',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'part_category',
        'field' => 'term_id',
        'terms' => $selected_part_type
      ),
    )
  ));

  $parts = '<option value selected="selected" data-i="0" class> - Select -</option>';
  if($parts_query->have_posts()){
    while($parts_query->have_posts()){
      $parts_query->the_post();
      $part_price = get_field('price');

      $parts .= '<option value="' . get_post_field('post_name', $part_id) . '" data-price="' . $part_price . '">' . get_post_field('post_title', $part_id) . '</option>';
    }
  }

  echo $parts;
  wp_die();
}