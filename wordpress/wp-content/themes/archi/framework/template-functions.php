<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage Archi
 * @since 1.0
 */

// Add specific CSS class by filter
add_filter( 'body_class', 'archi_body_class_names' );
function archi_body_class_names( $classes ) {
    global $archi_option;
	$theme = wp_get_theme();

    // add 'class-name' to the $classes array
    if ( isset( $archi_option['version_type'] ) and $archi_option['version_type'] == 'light' ) {
        $classes[] = 'de_light';
    }

    if ( isset( $archi_option['subpage-switch'] ) && $archi_option['subpage-switch'] == false && !is_page_template( 'page-templates/template-canvas.php' ) && !is_page_template( 'page-templates/template-landing.php' ) && !is_page_template( 'page-templates/template-onepage.php' ) ) { 
        $classes[] = 'no-subheader';
    }

    if ( isset( $archi_option['topbar-allpage'] ) && $archi_option['topbar-allpage'] == true && $archi_option['header_layout'] == "htop_page" ) {
        $classes[] = 'has-topbar';
    } 

    if ( isset( $archi_option['desktop-sticky'] ) and $archi_option['desktop-sticky'] == false ) {
        $classes[] = 'header-no-sticky-subheader';
    }   

    if ( isset( $archi_option['mobile-sticky'] ) and $archi_option['mobile-sticky'] == true ) {
        $classes[] = 'header-mobile-sticky-subheader';
    }

    if ( isset( $archi_option['header_layout'] ) and $archi_option['header_layout'] != "htop_page" ) {
        $classes[] = 'de-navbar-left';
    } 

    if ( isset( $archi_option['preload-switch'] ) and $archi_option['preload-switch'] != false ) {
        if ( isset( $archi_option['preloader_mode'] ) and $archi_option['preloader_mode'] == "preloader_logo" ) {
            $classes[] = 'royal_preloader';
        } else {
            $classes[] = 'jPreLoader';
        }
    }
	
	$classes[] = 'archi-theme-ver-'.$theme->version;
    $classes[] = 'wordpress-version-'.get_bloginfo( 'version' );
    
    // return the $classes array
    return $classes;
}

// Add specific CSS class by filter
function archi_header_class() {
    global $archi_option;

    $header_classes = array();

    if ( ( isset( $archi_option['header_position'] ) and $archi_option['header_position'] != "onbottom_page" and $archi_option['topbar-onepage'] ==true and is_page_template( 'page-templates/template-onepage.php' )) || ( isset( $archi_option['topbar-allpage'] ) and $archi_option['topbar-allpage'] == true and !is_page_template('page-templates/template-onepage.php'))){ 
        $header_classes[] = 'de_header_2';
    }

    if ( isset( $archi_option['mobile-sticky'] ) and $archi_option['mobile-sticky'] == true ) {
        $header_classes[] = 'header-mobile-sticky';
    }  

    if ( isset( $archi_option['desktop-sticky'] ) and $archi_option['desktop-sticky'] == false and $archi_option['hideshow_header'] == false ) {
        $header_classes[] = 'header-desktop-nosticky';
    }   

    if ( isset( $archi_option['header_style'] ) and $archi_option['header_style'] == "header_light" and is_page_template( array( 'page-templates/template-canvas.php', 'page-templates/template-onepage.php' ) )){
        $header_classes[] = 'header-light';
    } elseif ( isset($archi_option['header_style'] ) and $archi_option['header_style'] == "header_overlay" and is_page_template( array( 'page-templates/template-canvas.php', 'page-templates/template-onepage.php' ) )){
        $header_classes[] = 'header-bg';
    } elseif ( isset($archi_option['header_style'] ) and $archi_option['header_style'] == "header_transparent" and is_page_template( array( 'page-templates/template-canvas.php', 'page-templates/template-onepage.php' ) )){
        $header_classes[] = 'transparent';
    } else {
        $header_classes[] = '';
    }

    if ( !is_page_template('page-templates/template-canvas.php') and !is_page_template('page-templates/template-onepage.php') ){
        $header_classes[] = 'header-bg';
    }

    if ( isset( $archi_option['header_position'] ) and $archi_option['header_position'] == "onbottom_page" and is_page_template( array( 'page-templates/template-canvas.php', 'page-templates/template-onepage.php' ) ) ){
        $header_classes[] = 'header-bottom';
    }    		

    if ( isset( $archi_option['hideshow_header'] ) and $archi_option['hideshow_header'] == true and $archi_option['header_position'] != "onbottom_page" and $archi_option['header_layout'] == "htop_page" and is_page_template('page-templates/template-canvas.php') ) {
        $header_classes[] = 'autoshow scrollOff';
    } 
    
    // return the $classes array
    echo implode( ' ', $header_classes );
}

add_action('wp_footer', 'archi_add_custom_script_footer');
function archi_add_custom_script_footer(){ 
    global $archi_option;
    if ( isset( $archi_option['js_editor'] ) and $archi_option['js_editor'] != '' ) {
?>
    <script type="text/javascript">
        <?php echo $archi_option['js_editor']; ?>
    </script>
<?php
    }
} 
 
if ( ! function_exists( 'topbar_loginout_link' ) ) :
    function topbar_loginout_link() {
        $current_user = wp_get_current_user();
        if ( is_user_logged_in() ) {
            echo '<li><i class="fa fa-user-o"></i> <a href="'. wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) .'">' . $current_user->user_login . '( ' . esc_html__( 'Log Out', 'archi' ) . ' )</a> <span>/</span> <a href="'. get_permalink( wc_get_page_id( 'myaccount' ) ) .'">' . esc_html__( 'My account', 'archi' ) . '</a></li>';
        } elseif ( !is_user_logged_in() ) {
            echo '<li><i class="fa fa-lock"></i> <a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">' . esc_html__( 'Login', 'archi' ) . '</a> <span>/</span> <a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">' . esc_html__( 'Register', 'archi' ) . '</a></li>';
        }
    }
endif;

// [oceanthemes_date time_custom="F j, Y"]
function oceanthemes_date_func( $atts ) {
    $date_format = shortcode_atts( array(
        'time_custom' => 'Y',        
    ), $atts );

    $dt = new DateTime("now");
    $gmt_timestamp = $dt->format("{$date_format['time_custom']}");

    return $gmt_timestamp;
}
add_shortcode( 'oceanthemes_date', 'oceanthemes_date_func' );

// Add Title Attribute to WordPress Image the_post_thumbnail
function archi_add_img_title( $attr, $attachment = null ) {
    $img_title = trim( strip_tags( $attachment->post_title ) );
    $attr['title'] = $img_title;
 
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','archi_add_img_title', 10, 2 );

// Add default custom post type using WPBakery Page Builder
if ( class_exists( 'Vc_Manager' ) ) {
    $list = array(
        'post',
        'page',
        'portfolio',        
        'service',        
    );
    vc_set_default_editor_post_types( $list );    
}

function archi_preload_body_open_script() {
    global $archi_option; 
    if ( isset( $archi_option['preload-switch'] ) and $archi_option['preload-switch'] == true ) {
        if ( isset( $archi_option['preloader_mode'] ) and $archi_option['preloader_mode'] == "preloader_logo" ){
            echo '<div id="royal_preloader" data-width="'.esc_attr($archi_option['prelogo_width']).'" data-height="'.esc_attr($archi_option['prelogo_height']).'" data-url="'.esc_url( $archi_option['logo_preload']['url'] ).'" data-color="'.esc_attr($archi_option['preload-text-color']).'" data-bgcolor="'.esc_attr($archi_option['preload-background-color']).'"></div>';
        }
    }
}
add_action( 'wp_body_open', 'archi_preload_body_open_script' );

