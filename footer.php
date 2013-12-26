<?php //Template for Footer ?>  
  </div><!-- #main .site-main -->
     <footer id="colophon" class="site-footer" role="contentinfo">
          
          <div class="site-info">
               <?php do_action('nik_credits'); ?>
                <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'shape' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'shape' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( __('Theme: %1$s by %2$s.', 'nik'), 'Nik', '<a href="http://techvoltz.com/" rel="designer">TechVoltz</a>' ); ?>
           
          </div><!-- .site-info -->
             

     </footer><!-- #colophon .site-footer -->
   
</div><!-- #page .hfeed .site -->

  <?php wp_footer(); ?>

</body>
</html>