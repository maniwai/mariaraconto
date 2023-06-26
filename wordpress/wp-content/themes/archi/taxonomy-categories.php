<?php 
get_header(); 
global $archi_option; 
$gap = (!empty($archi_option['projects_item_gap']) ? $archi_option['projects_item_gap'].'px' : '0px');
$imgwidth = (!empty($archi_option['project_image_width'])) ? $archi_option['project_image_width'] : 700;
$imgheight = (!empty($archi_option['project_image_height'])) ? $archi_option['project_image_height'] : 466;
?>
<?php if($archi_option['subpage-switch']!=false){ ?>

  <!-- subheader begin -->
  <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom" <?php if($archi_option['portfolio_thumbnail'] != ''){ ?> style="background-image: url('<?php echo esc_url($archi_option['portfolio_thumbnail']['url']); ?>');" <?php } ?> >
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>
                  <?php 
                    if(function_exists('archi_breadcrumbs')): 
                      archi_breadcrumbs();
                    endif;
                  ?>                  
              </div>
          </div>
      </div>
  </section>
  <!-- subheader close -->

<?php }else{ ?>
    <section class="no-subpage"></section>
<?php } ?>

<?php echo wp_specialchars_decode( do_shortcode( $archi_option['top_page_contact_info'] ) ); ?>

<!-- content begin -->
<div id="content">   
    <div id="projects_grid" class="projects-grid overlay_s1 <?php if ($archi_option['portfolio_columns'] == 2) {echo 'pf_2_cols'; }elseif ($archi_option['portfolio_columns'] == 4) { echo 'pf_4_cols'; }elseif ($archi_option['portfolio_columns'] == 5) { echo 'pf_5_cols'; }elseif ($archi_option['portfolio_columns'] == 6) { echo 'pf_6_cols'; }else{ echo 'pf_3_cols'; } ?> wow fadeInUp" data-wow-delay=".3s" style="margin: 0px <?php echo esc_attr($gap); ?>">
    <div class="project-item-sizer"></div>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="project-item" style="padding:<?php echo esc_attr($gap); ?>">
        <div class="projects-box">
          <div class="projects-thumbnail">
            <?php
              if ( has_post_thumbnail() ) :               
                if ($archi_option['crop_project_images'] != false) {                        
                  the_post_thumbnail( array( $imgwidth, $imgheight ) );
                }else{
                  the_post_thumbnail( 'thumb-portfolio' ); 
                }     
              endif; 
            ?>
          </div>              
          <a <?php if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
            <span class="project-overlay">
              <span class="project-name id-color"><?php the_title(); ?></span>  
            </span>
          </a>  
        </div>
      </div> 
    <?php endwhile; ?>
  </div>
  <div class="container">
    <?php echo archi_pagination(); ?>
  </div>
</div>
<!-- content close -->
<?php get_footer(); ?>
