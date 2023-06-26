<?php global $archi_option; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp'); ?>>
    <div class="post-content">
        <div class="post-image">
            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
              <?php $images = rwmb_meta( '_cmb_images', "type=image_advanced&size=full" ); ?>
              <?php if (count($images) > 0 ){ ?>  
                <div class="slider-post owl-carousel" data-autoplay="<?php if($archi_option['post-slide-autoplay']!=false){echo 'true';}else{echo 'false';} ?>" data-speed="<?php echo esc_attr($archi_option['post-slide-speed']); ?>" data-navspeed="<?php echo esc_attr($archi_option['post-slide-pagination-speed']); ?>" data-rewinspeed="<?php echo esc_attr($archi_option['post-slide-rewind-speed']); ?>" data-transition="<?php if($archi_option['post-slide-transition']!=false){echo "'fade'";}else{echo "false";} ?>">
                  <?php foreach ( $images as $image ) { ?>
                    <div class="item"><?php echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' title='{$image['title']}' />"; ?></div> 
                  <?php } ?>   
                </div>                                    
              <?php }else{
                  if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                      <?php the_post_thumbnail('full'); ?>
                    </a>
                  <?php endif; 
              } ?>
            <?php } ?>
        </div>

        <div class="entry-summary clearfix">
          <div class="date-box">
            <div class="day"><?php the_time('d'); ?></div>
            <div class="month"><?php the_time('M'); ?></div>
          </div>
          <div class="post-text">
            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
            <p><?php echo archi_excerpt(); ?></p>
          </div>  
        </div><!-- .entry-content -->
        
        <a href="<?php the_permalink(); ?>" class="btn-more"><?php if ($archi_option['blog_btntext'] != ''){ echo esc_attr($archi_option['blog_btntext']); }else{ esc_html_e('Read More', 'archi'); } ?></a>

    </div>
</article>