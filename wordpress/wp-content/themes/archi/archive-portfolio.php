<?php 
get_header(); 
global $archi_option; 
$showall = (!empty($archi_option['portfolio_text_all'])) ? $archi_option['portfolio_text_all'] : 'All Project';
$numbershow = (!empty($archi_option['portfolio_show'])) ? $archi_option['portfolio_show'] : 8;
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
                  <div class="title-wrap">
                    <?php if ($archi_option['portfolio_title'] != ''){ 
                      echo '<h1 class="page-title">' . esc_attr($archi_option['portfolio_title']) . '</h1>'; 
                    }else{ 
                      the_archive_title( '<h1 class="page-title">', '</h1>' ); 
                      the_archive_description( '<h4>', '</h4>' );
                    } ?>
                  </div>
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
  <div id="content" class="padtop0">   
  
    <?php if($archi_option['archive_portfolio_filter']!=false){ ?>
    <div class="container">
      <!-- portfolio filter begin -->
      <div class="row">
          <div class="col-md-12 text-center">
              <ul id="filters" class="project_filters wow fadeInUp" data-wow-delay="0s">
                <li><a href="#" data-filter="*" class="selected"><?php echo esc_attr($showall); ?></a></li>                    
                <?php 
                  $categories = get_terms('categories');
                   foreach( (array)$categories as $categorie){
                    $cat_name = $categorie->name;
                    $cat_slug = $categorie->slug;
                    $cat_count = $categorie->count;
                    $cat_id = $categorie->term_id;
                  ?>
                  <li><a href="#" data-filter=".category-<?php echo wp_specialchars_decode( $cat_id ); ?>"><?php echo wp_specialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>                    
              </ul>
          </div>
      </div>        
      <!-- portfolio filter close -->
    </div>
  <?php } ?>

  <div id="projects_grid" class="projects-grid overlay_s1 <?php if ($archi_option['portfolio_columns'] == 2) {echo 'pf_2_cols'; }elseif ($archi_option['portfolio_columns'] == 4) { echo 'pf_4_cols'; }elseif ($archi_option['portfolio_columns'] == 5) { echo 'pf_5_cols'; }elseif ($archi_option['portfolio_columns'] == 6) { echo 'pf_6_cols'; }else{ echo 'pf_3_cols'; } ?> wow fadeInUp" data-wow-delay=".3s" style="margin: -<?php echo esc_attr($gap); ?> <?php echo esc_attr($gap); ?> 0px">
      <div class="project-item-sizer"></div>
  <?php             
    if ( get_query_var('paged') ){
      $paged = get_query_var('paged');
    }elseif ( get_query_var('page') ){
      $paged = get_query_var('page');
    }else{
      $paged = 1;
    } 
    query_posts(array('post_type' => 'portfolio', 'posts_per_page' => $numbershow, 'paged' => $paged ));
    while( have_posts() ) : the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
          $cate_ids = '';
          foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.'<span>, </span> ' ;
                $cate_slug .= $cate->slug .' '; 
                $cate_ids  .= 'category-'.$cate->term_id .' ';  
              } 
          }
        ?>   
        <div class="project-item <?php echo esc_attr($cate_ids); ?>" style="padding:<?php echo esc_attr($gap); ?>">
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
