<?php
/**
 * autoprioritet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package autoprioritet
 */

require_once ('TrinityPartsWS.php');
define('CLIENT_KEY', "1EEB8A1B71CA019259216FE234A9A246");


$siteadr = "___________________.ru";
$sitename = "Автоприоритет";
add_action( 'carbon_fields_register_fields', 'boots_register_custom_fields' );
function boots_register_custom_fields() {
require_once __DIR__ . '/inc/custom-fields-options/metaboxes.php';
require_once __DIR__ . '/inc/custom-fields-options/theme-options.php';
}
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
require_once( get_template_directory() . '/inc/carbon-fields/vendor/autoload.php' );
\Carbon_Fields\Carbon_Fields::boot();
}
if ( ! function_exists( 'auto_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function auto_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on autoprioritet, use a find and replace
		 * to change 'auto' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'auto', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'auto' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'auto_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'auto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function auto_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'auto_content_width', 640 );
}
add_action( 'after_setup_theme', 'auto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function auto_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'auto' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'auto' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'auto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function auto_scripts() {
	wp_enqueue_style( 'datatables', get_template_directory_uri()  . '/css/jquery.dataTables.min.css', array(), null, 'all');

	wp_enqueue_style( 'bascet', get_template_directory_uri()  . '/css/backet.css', array(), null, 'all');

	wp_enqueue_style( 'auto-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'auto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'auto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'datatables', get_template_directory_uri() . '/js/jquery.dataTables.min.js', array(), null, true);

	wp_enqueue_script('libs', get_template_directory_uri() . '/js/scripts.min.js', array(), null, true);

	wp_enqueue_script('bascet', get_template_directory_uri() . '/js/bascet.js', array(), null, true);

	wp_enqueue_script('main', get_template_directory_uri() . '/js/common.js', array(), null, true);

	wp_localize_script( 'main', 'allAjax', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
    ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'auto_scripts' );

function main_menu() {
	wp_nav_menu(array(
		'theme_location' => 'menu-1',
		'container' => false,
		'menu_class' => 'ul-clean header-top__menu',
	));
}
add_action( 'wp_ajax_universal_send', 'universal_send' );
  add_action( 'wp_ajax_nopriv_universal_send', 'universal_send' );

  function universal_send() {
    if ( empty( $_REQUEST['nonce'] ) ) {
      wp_die( '0' );
    }
    
    if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
      
      $headers = array(
        'From: Сайт Autoprioritet <noreply@autoprioritet.ru>',
        'content-type: text/html',
      );
    
      add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
      if (wp_mail(carbon_get_theme_option( 'as_email_send' ), 'Заказ с сайта', '<strong>С какой формы:</strong> '.$_REQUEST["msg"].'<br/> <strong>Имя:</strong> '.$_REQUEST["name"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["tel"], $headers))
        wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
      else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
      
    } else {
      wp_die( 'НО-НО-НО!', '', 403 );
    }
  }
function auto_create_table_history_orders() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'history_orders';
	$sql = '';
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		$sql = "CREATE TABLE " . $table_name . " (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		user_id mediumint(9) NOT NULL,
		detail_sku varchar(255) NOT NULL,
		brand_detail varchar(255) NOT NULL,
		detail_name varchar(255) NOT NULL,
		order_id mediumint(9) NOT NULL,
		order_date datetime NOT NULL,
		UNIQUE KEY id (id)
	)
	DEFAULT CHARACTER SET $wpdb->charset COLLATE $wpdb->collate;";
	}
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}
auto_create_table_history_orders();

function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

add_action( 'init', 'create_asgproduct_taxonomies' );

function create_asgproduct_taxonomies(){

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy('asgproductcat', array('asgproduct'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => "Категория товара",
			'singular_name'     => "Категория товара",
			'search_items'      => "Найти категорию товара",
			'all_items'         => __( 'Все категории товара' ),
			'parent_item'       => __( 'Дочерние категории' ),
			'parent_item_colon' => __( 'Дочерние категории:' ),
			'edit_item'         => __( 'Редактировать категорию' ),
			'update_item'       => __( 'Обновить категорию' ),
			'add_new_item'      => __( 'Добавить новую категорию товара' ),
			'new_item_name'     => __( 'Имя новой категории товара' ),
			'menu_name'         => __( 'Категории товара' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
		'show_admin_column'     => true,
	));
}

add_action('init', 'asgproduct_custom_init');

function asgproduct_custom_init(){
	register_post_type('asgproduct', array(
		'labels'             => array(
			'name'               => 'Продукты', // Основное название типа записи
			'singular_name'      => 'Продукты', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый товар',
			'edit_item'          => 'Редактировать товар',
			'new_item'           => 'Новый товар',
			'view_item'          => 'Посмотреть товар',
			'search_items'       => 'Найти товар',
			'not_found'          =>  'Товаров не найдено',
			'not_found_in_trash' => 'В корзине товаров не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Товары'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats')
	) );
}

add_filter('manage_asgproduct_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

 
function posts_columns($defaults){
    
	$defaults['riv_post_thumbs'] = __('Миниатюра');
    return $defaults;
}
 
function posts_custom_columns($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        the_post_thumbnail( array(80, 80) );
    }
}


//Получение списка опций для Выпадающего списка при покупке в 1 клик и на странице товара
add_action( 'wp_ajax_get_tov_option', 'get_tov_option' );
add_action( 'wp_ajax_nopriv_get_tov_option', 'get_tov_option' );

function get_tov_option() {
  if ( empty( $_REQUEST['nonce'] ) ) {
    wp_die( '0' );
  }
  
  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
    
	if (empty($_REQUEST["groupid"])) wp_die( 'Нет параметров товара!', '', 403 );
	
	if (empty($_REQUEST["offertype"]))
		wp_die(get_rr($_REQUEST["groupid"]));
    else
		//wp_die(carbon_get_the_post_meta($_REQUEST["postid"], 'as_main_param'));
		wp_die(get_rr_main(carbon_get_post_meta((int)($_REQUEST["postid"]), 'as_main_param')));
  } else {
    wp_die( 'НО-НО-НО!', '', 403 );
  }
}
function get_rr($groupID){
	global $wpdb;
	$rezq = $wpdb->get_results("SELECT * FROM `asg_product_transfer` WHERE `offer_group_id` = '".$groupID."'");
	$optionstr = "";
	$contpn = 0;
	foreach ($rezq as $elem) {
		$optionmsg = "";
		if (!empty($elem->offer_param_razmer)) $optionmsg .= "Размер: ".$elem->offer_param_razmer;
		if (!empty($elem->offer_param_rost)) $optionmsg .= " Рост: ".$elem->offer_param_rost;
		if (!empty($elem->offer_param_color)) $optionmsg .= " Цвет: ".$elem->offer_param_color;
		if (!empty($elem->offer_param_pol)) $optionmsg .= " (".$elem->offer_param_pol.")";
		
		$optionstr .= "<option value = '".$elem->offer_id."'>".$optionmsg."</option>";
		$contpn++;
	}
	
	
	
	return ($contpn > 1)?$optionstr:"";
	
}

function get_rr_main($textElem){
	$contpn = 0;
	$elems = explode(";", $textElem);
	$optionstr = "";
	
	foreach ($elems as $elem) {
		$optionmsg = "";
		
		$optionstr .= "<option value = '".$elem."'>".$elem."</option>";
		$contpn++;
	}
	
	return ($contpn > 1)?$optionstr:"";
}

/*----------ОБРАБОТКА КОРЗИНЫ AJAX -----------*/

function get_text_param($offerid) {
	global $wpdb;
	$rez = $wpdb->get_results("SELECT * FROM `asg_product_transfer` where `offer_id` = ".$offerid);
	$optionmsg = "";
	
	if (!empty($rez[0]->offer_param_razmer)) $optionmsg .= "Размер: ".$rez[0]->offer_param_razmer;
	if (!empty($rez[0]->offer_param_rost)) $optionmsg .= " Рост: ".$rez[0]->offer_param_rost;
	if (!empty($rez[0]->offer_param_color)) $optionmsg .= " Цвет: ".$rez[0]->offer_param_color;
	if (!empty($rez[0]->offer_param_pol)) $optionmsg .= " (".$rez[0]->offer_param_pol.")";
		
	return $optionmsg;
}

// Удаление из корзины

add_action( 'wp_ajax_del_bascet', 'del_bascet' );
add_action( 'wp_ajax_nopriv_del_bascet', 'del_bascet' );

function del_bascet() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			if (!empty($_COOKIE["bascet"]))
			{
				$ncookelem = "";
				$bascetsod = explode(",", $_COOKIE["bascet"]);	
				
				$countinBascet = 0;
				foreach ($bascetsod as $be) {
					$elempart = explode("|", $be);	
					if (($elempart[0] !== $_REQUEST['postid']))
					{
						if (empty($ncookelem)) 
							$ncookelem .= $be;
						else $ncookelem .= ",".$be;
						$countinBascet+=$elempart[1];
					} 
				}
				
				setcookie("bascet", $ncookelem, 0, "/", $siteadr);
			}
			wp_die( $countinBascet );	
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
}


// Пересчет корзины

add_action( 'wp_ajax_rec_bascet', 'rec_bascet' );
add_action( 'wp_ajax_nopriv_rec_bascet', 'rec_bascet' );

function rec_bascet() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			if (!empty($_COOKIE["bascet"]))
			{
				$ncookelem = "";
				$bascetsod = explode(",", $_COOKIE["bascet"]);	
				
				foreach ($bascetsod as $be) {
					$elempart = explode("|", $be);	
					if ($elempart[0] !== $_REQUEST['postid'])
					{
						if (empty($ncookelem)) 
							$ncookelem .= $be;
						else $ncookelem .= ",".$be;
					} else {
						if (empty($ncookelem)) 
							$ncookelem .= $elempart[0]."|".$_REQUEST["elcount"]."|".$elempart[2]."|".$elempart[3]."|".$elempart[4]."|".$elempart[5]."|".$elempart[6];
						else $ncookelem .= ",".$elempart[0]."|".$_REQUEST["elcount"]."|".$elempart[2]."|".$elempart[3]."|".$elempart[4]."|".$elempart[5]."|".$elempart[6];
					}
				}
				
				setcookie("bascet", $ncookelem, 0, "/", $siteadr);
			}
			
			
			
			wp_die( $_REQUEST["elcount"] );	
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
}

// Поместить в корзину

add_action( 'wp_ajax_to_bascet', 'to_bascet' );
add_action( 'wp_ajax_nopriv_to_bascet', 'to_bascet' );

function to_bascet() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			
			if (!empty($_COOKIE["bascet"])) 
			{
				$bascetelem = explode(",", $_COOKIE["bascet"]);
				
				$ctext = "";
				$dubl = false;
				foreach ($bascetelem as $r)
				{
					//postid, tovsku, tovtype, groupid, offerid
					
					$cb = explode("|", $r);
					$id = $cb[0];
					$count = $cb[1];
					
					//if (($cb[0] === $_REQUEST['postid'])&&($cb[3] === $_REQUEST['tovrazmer'])&&($cb[4] === $_REQUEST['tovrost'])&&($cb[5] === $_REQUEST['tovcolor']) ) 
					if ($cb[0] === $_REQUEST['postid']) 
					{
						$count += (int)$_REQUEST['qty'];
						$dubl = true;
					}
					
					if (empty($ctext))
						$ctext = $id."|".$count."|".$cb[2]."|".$cb[3]."|".$cb[4]."|".$cb[5]."|".$cb[6];
					else
					$ctext = $ctext.",".$id."|".$count."|".$cb[2]."|".$cb[3]."|".$cb[4]."|".$cb[5]."|".$cb[6]; 
				}
				
				if (!$dubl)
					$bvalue = $ctext.",".$_REQUEST['postid']."|".$count."|".$_REQUEST['tovsku']."|".$_REQUEST['tovtype']."|".$_REQUEST['groupid']."|".$_REQUEST['offerid']."|".$_REQUEST['dprice'];
				else 
					$bvalue = $ctext;
			}
			else 
				$bvalue = $_REQUEST['postid']."|".$_REQUEST['qty']."|".$_REQUEST['tovsku']."|".$_REQUEST['tovtype']."|".$_REQUEST['groupid']."|".$_REQUEST['offerid']."|".$_REQUEST['dprice'];
			
			
			$bascetelem = explode(",", $bvalue );
			$count = 0;
			$price = 0;
			foreach ($bascetelem as $r)
			{
				$cb = explode("|", $r);
				$count += $cb[1];
				$price += ((float)$cb[1] * (float)$cb[6]);
			}
			
			setcookie("bascet", $bvalue, 0, "/", $siteadr);
			wp_die( $count."|".$price."|".$_REQUEST['postid']."||".$_COOKIE["bascet"] );	
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
}

// оформление заказа из корзины

add_action( 'wp_ajax_oformit_zak', 'oformit_zak' );
add_action( 'wp_ajax_nopriv_oformit_zak', 'oformit_zak' );

function oformit_zak() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$headers = array(
				'From: Заказ на сайте '.$sitename.' <noreply@autoprioritet.ru>',
				'content-type: text/html',
			);
			
			$bascetsod = explode(",", $_REQUEST["basket_string"]);	
			$postInBascet = "";
			
			$summ = 0;
			
			$rezstr = "";
			$rezstr .= "<table style = 'border-collapse: 1;'>";
			
			$rezstr .= "<tr>";
				
				$rezstr .= "<th>ID</th>";
				$rezstr .= "<th>Название</th>";
				$rezstr .= "<th>Колличество</th>";
				$rezstr .= "<th>Сумма</th>";
			$rezstr .= "</tr>";
			
			foreach ($bascetsod as $be) {
				$elempart = explode("|", $be);	
				$postInBascet .= $elempart[0]." "; 
				 
				
				
				$rezstr .= "<tr>";	
					$rezstr .= "<td>";
						$rezstr .= "<span>".$elempart[0]."</span>";
					$rezstr .= "</td>";

					$rezstr .= "<td>";
						$rezstr .= "<span>".$elempart[3]."</span>";
					$rezstr .= "</td>";
					
					$rezstr .= "<td>";
						$rezstr .= $elempart[13];
					$rezstr .= "</td>";
					
					$rezstr .= "<td'>";
						$rezstr .= "<span>".$elempart[13]*$elempart[5] ."</span> руб.";
					$rezstr .= "</td>";
					
				$rezstr .= "</tr>";
				
				
				
				
				$summ += $elempart[1]*$elempart[6];
			}
			
			$rezstr .= '</table>';
			
			$content = $rezstr.'<br/>'.
					   '<strong>Сумма:</strong> '.$summ.' руб. <br/>'.
					   '<strong>Имя:</strong> '.$_REQUEST["namecl"].' <br/>'.
					   '<strong>Телефон:</strong> '.$_REQUEST["phonecl"].' <br/>'.
					   '<strong>E-mail:</strong> '.$_REQUEST["emailcl"].' <br/>'.
					   '<strong>Способ доставки:</strong> '.$_REQUEST["sdostcl"].' <br/>'.
					   '<strong>Адрес доставки:</strong> '.$_REQUEST["adrdost"].' <br/>'.
					   '<strong>Комментарий:</strong> '.$_REQUEST["msgst"].' <br/>';
			
			
			
			add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

			if( wp_get_current_user()->exists() ){
				$user_data = wp_get_current_user();
				$user_name = $user_data->user_nicename;
				$email = $_REQUEST["emailcl"];
				$current_time = date("Y-m-d-H-i-s");
				$id_zak = 'zak_' . $current_time;
				global $wpdb;
				foreach ($bascetsod as $be) {
					$elempart = explode("|", $be);
				$wpdb->insert('autopr_ordersproducts',
					array(
						'id_zak' => 'zak_' . $current_time,
						'email' => $_REQUEST["emailcl"],
						'id_product' => $elempart[0],
						'transcription' => $elempart[1],
						'name' => $elempart[2],
						'brand' => $elempart[3],
						'price' => $elempart[5],
						'balance' => $elempart[4],
						'store' => $elempart[6],
						'delivery' => $elempart[7],
						'deliverydate' => $elempart[8],
						'period' => $elempart[9],
						'multiplicity' => $elempart[10],
						'source' => $elempart[11],
						'qty' => $elempart[13],
						'user_name' => $user_name
					),
					array('%s', '%s','%s','%s','%s','%s', '%f', '%s', '%s','%s','%s','%s','%s','%s', '%d'));
				}
			}
			
			if (wp_mail(carbon_get_theme_option( 'as_email_send' ), 'Заказ через корзину', $content, $headers))
			{
				setcookie("bascet", "", 0, "/", $siteadr);
				wp_die("<span style = 'color:green;'>Ваш заказ оформлен. Мы свяжемся с Вами в ближайшее время.</span>");
			}
			else
			{
				wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
			}
			
			wp_die( $rez );	
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
}


// Оформление заказа в 1 клик

add_action( 'wp_ajax_one_click_bay', 'one_click_bay' );
add_action( 'wp_ajax_nopriv_one_click_bay', 'one_click_bay' );

function one_click_bay() {
  if ( empty( $_REQUEST['nonce'] ) ) {
    wp_die( '0' );
  }
  
  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
    
    $headers = array(
      'From: Сайт '.$sitename.' <noreply@spetssnab46.ru>',
      'content-type: text/html',
    );
  
    add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
    if (wp_mail(carbon_get_theme_option( 'as_email_send' ), 'Заказ в 1 клик', 
		'<h2>Заказ в 1 клик</h2>'.
		'<br/> <strong>Товар:</strong> ' . $_REQUEST["tovarname"] .
		'<br/> <strong>Характеристики:</strong> ' . $_REQUEST["tovcaracter"] .
		'<br/> <strong>Артикул:</strong> ' . $_REQUEST["tovsku"] .
		'<br/> <strong>Цена:</strong> ' . $_REQUEST["tovprice"] ." руб.".
		'<br/> <strong>Имя:</strong> '.$_REQUEST["clname"].
		'<br/> <strong>Телефон:</strong> '.$_REQUEST["cltel"]
		
		, $headers))
      wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
    else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
    
  } else {
    wp_die( 'НО-НО-НО!', '', 403 );
  }
}
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function post_featured_image_json( $data, $post, $context ) {
	$featured_image_id = $data->data['featured_media']; // get featured image id
	$featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'original' ); // get url of the original size
  
	if( $featured_image_url ) {
	  $data->data['featured_image_url'] = $featured_image_url[0];
	}
  
	return $data;
  }
  add_filter( 'rest_prepare_post', 'post_featured_image_json', 10, 3 );


add_action( 'rest_api_init', function () {
	// Регистрирует маршрут получения контактов
	register_rest_route( 'forfrontend/v2', '/contacts', array(
		'methods'  => 'GET',
		
		'callback' => 'get_site_contact',
	) );


	// Регистрирует маршрут полдучение карты сайта
	//https://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/forfrontend/v2/sitemap
	register_rest_route( 'forfrontend/v2', '/sitemap', array(
			'methods'  => 'GET',
			'permission_callback'  => null,
			'callback' => 'get_site_map',
	) );

	// Регистрирует маршрут получения списка брендов
	//https://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/forfrontend/v2/brands
	register_rest_route( 'forfrontend/v2', '/brands', array(
		'methods'  => 'GET',
		'permission_callback'  => null,
		'callback' => 'get_brands_list',
		'args'     => array(
			'partnumber' => array(
				'default' => ""
			)
		)
	) );

	// Регистрирует маршрут получения списка товаров бренда
	//https://head.xn--80aejla8abgjcqhb.xn--p1ai/wp-json/forfrontend/v2/tovars
	register_rest_route( 'forfrontend/v2', '/tovars', array(
		'methods'  => 'GET',
		'permission_callback'  => null,
		'callback' => 'get_tovars_list',
		'args'     => array(
			'partnumber' => array(
				'default' => ""
			),
			
			'brand' => array(
				'default' => ""
			)
		)
	) );

	// Регистрирует маршрут вывода блога на главную		
	register_rest_route( 'forfrontend/v1', '/blogmaterial', array(
		'methods'  => 'GET',
		'permission_callback'  => null,
		'callback' => 'get_blog_material3',
	) );	

} );


add_action( 'rest_api_init', function(){

	register_rest_route( 'myplug/v2', '/posts', array(
		'methods'  => 'GET',
		'callback' => 'myplug_get_post_items',
	) );

} );

function myplug_get_post_items(){
	$posts = get_posts( array (
		'post_status' => 'publish',
		'numberposts' => 100
	) ) ;

	$items = array();

	foreach( $posts as $post ){
		$items[] = array(
			'id'      => $post->ID,
			'title'   => $post->post_title,
			'author'  => get_the_author_meta( 'display_name', $post->post_author ),
			'content' => apply_filters( 'the_content', $post->post_content ),
			'teaser'  => $post->post_excerpt
		);
	}

	return $items;
}


// Обрабатывает запрос
function get_blog_material3( WP_REST_Request $request ) {
	$start = microtime(true);

	$rez = array();

	$query = new WP_Query( [ 'cat' => 16, 'posts_per_page' => 3, 'order' => 'DESC' ] );
	foreach( $query->posts as $pst ){
		$elsment["ID"] = $pst->ID;
		$elsment["title"] = $pst->post_title;
		$elsment["slug"] = $pst->post_name;
		$elsment["img"] = carbon_get_post_meta($pst->ID, "post_thumb");
		$rez["posts"][] = $elsment;
	}

	if ( empty( $rez ) )
		return new WP_Error( 'no_contacts', 'Записей не найдено', array( 'status' => 404 ) );

		$rez["time"] = 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
	return $rez;

}

// Список брендов
//
function get_brands_list( WP_REST_Request $request ) {
	$ws = new \TrinityPartsWS(CLIENT_KEY);
	
	$partnumber = $request->get_param( 'partnumber' );
	
	if (!empty ($partnumber)) {
		$brands = $ws->searchBrands($partnumber);
		$contacts = array(
			'obj' => $brands,
			'pass' => CLIENT_KEY,
			
		);
	} 

	if ( empty( $contacts ) )
		return new WP_Error( 'no_contacts', 'Записей не найдено', array( 'status' => 404 ) );

	return $contacts;
}


// Список товаров бренда
//
function get_tovars_list( WP_REST_Request $request ) {
	$ws = new \TrinityPartsWS(CLIENT_KEY);
	
	$partnumber = $request->get_param( 'partnumber' );
	$brand = $request->get_param( 'brand' );
	
	if (!empty ($partnumber) && !empty($brand)) {
		$tovars = $ws->searchItems($partnumber, $brand);
		$tovarsSorted = array();
		
		$totalMaxPrice = -1; 
		$totalMaxPriceTov = [];

		$totalMinPrice = 99000000; 
		$totalMinPriceTov = []; 

		$totalMinDelivery = 99000000; 
		$totalMinDeliveryTov = [];

		$totalMaxDelivery = -1; 
		$totalMaxDeliveryTov = [];

		foreach ($tovars["data"] as $telem) {
			if (empty($tovarsSorted[$telem["producer"]]["minprice"])) 
					$tovarsSorted[$telem["producer"]]["minprice"] = round($telem["price"],2);

			if ($tovarsSorted[$telem["producer"]]["minprice"] > $telem["price"])
				$tovarsSorted[$telem["producer"]]["minprice"] = round($telem["price"],2); 

			if ($totalMinPrice >  $telem["price"] ) {
					$totalMinPrice = round($telem["price"]);
					$totalMinPriceTov = $telem;
			}

			if ($totalMaxPrice <  $telem["price"] ) {
				$totalMaxPrice = round($telem["price"]);
				$totalMaxPriceTov = $telem;
			}

			$tovarsSorted[$telem["producer"]]["count"]++;
			$tovarsSorted[$telem["producer"]]["code"] = $telem["code"];
			$tovarsSorted[$telem["producer"]]["brend"] = $telem["producer"];
			$telem["price"] = round($telem["price"],2);
			if (strpos($telem["deliverydays"], "/")){
				$telem["deliverydays_min"] = explode("/", $telem["deliverydays"])[0];
				$telem["deliverydays_max"] = explode("/", $telem["deliverydays"])[1];
			} else {
				$telem["deliverydays_min"] = explode("-", $telem["deliverydays"])[0];
				$telem["deliverydays_max"] = explode("-", $telem["deliverydays"])[1];
			}

			if ($totalMinDelivery > $telem["deliverydays_min"] ) {
				$totalMinDelivery = round($telem["deliverydays_min"]) ;
				$totalMinDeliveryTov = $telem;
			}

			if ($totalMaxDelivery < $telem["deliverydays_max"] ) {
				$totalMaxDelivery = round($telem["deliverydays_max"]) ;
				$totalMaxDeliveryTov = $telem;
			}

			$tovarsSorted[$telem["producer"]]["items"][] = $telem;
		}

		$contacts = array(
			'total_max_price' => $totalMaxPrice,
			'total_max_price_tov' =>$totalMaxPriceTov,

			'total_min_price' => $totalMinPrice,
			'total_min_price_tov' =>$totalMinPriceTov, 

			'total_max_delivery' => $totalMaxDelivery, 
			'total_max_delivery_tov' =>$totalMaxDeliveryTov, 

			'total_min_delivery' => $totalMinDelivery, 
			'total_min_delivery_tov' =>$totalMinDeliveryTov, 

			'obj' => $tovarsSorted,
			'pass' => CLIENT_KEY,
		);
	} 

	if ( empty( $contacts ) )
		return new WP_Error( 'no_contacts', 'Записей не найдено', array( 'status' => 404 ) );

	return $contacts;
}

// Обрабатывает запрос
function get_site_contact( WP_REST_Request $request ) {

	$contacts = array(
		'phone' => carbon_get_theme_option( "as_phone" ),
		'phonelnk' => "tel:".str_replace(array(")", "(", " ","-"), "", carbon_get_theme_option( "as_phone" )),
		'email' => carbon_get_theme_option( "as_email" ),
		'emailto' => "mailto:".carbon_get_theme_option( "as_email" ),
		'inn' => carbon_get_theme_option( "as_inn" ),
		'orgn' => carbon_get_theme_option( "as_orgn" ),
		'address' => carbon_get_theme_option( "as_address" ),
		'tele' => carbon_get_theme_option( "as_tele" ),
		'whatsapp' => carbon_get_theme_option( "as_whatsapp" ),
		'vk' => carbon_get_theme_option( "as_vk" ),
		'insta' => carbon_get_theme_option( "as_insta" )
	);

	if ( empty( $contacts ) )
		return new WP_Error( 'no_contacts', 'Записей не найдено', array( 'status' => 404 ) );

	return $contacts;
}


// Генерация карты сайта
function get_site_map( WP_REST_Request $request ) {

	$rez = array();

	$query = new WP_Query( [ 'cat' => 16, 'posts_per_page' => -1, 'order' => 'DESC' ] );
	foreach( $query->posts as $pst ){
		$elsment["url"] = "blog/".$pst->post_name;
		$elsment["changefreq"] = 'daily';
		$elsment["priority"] = 1;
		$elsment["lastmod"] = date(DATE_RFC822);
		$rez[] = $elsment;
	}


	if ( empty( $rez ) )
		return new WP_Error( 'no_contacts', 'Записей не найдено', array( 'status' => 404 ) );

	return $rez;
}
