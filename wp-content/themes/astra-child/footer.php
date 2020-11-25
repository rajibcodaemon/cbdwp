      <?php astra_content_bottom(); ?>
      </div> <!-- ast-container -->
    </div><!-- #content -->
    <?php astra_content_after(); ?>
    <footer class="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <figure>
              <?php dynamic_sidebar( 'advanced-footer-widget-1' ); ?>
            </figure>
          </div>
          <div class="col-md-3 get-in-touch">
            <?php dynamic_sidebar( 'advanced-footer-widget-2' ); ?>
          </div>
          <div class="col-md-2 offset-md-1">
            <div class="quick-links">
              <?php dynamic_sidebar( 'advanced-footer-widget-3' ); ?>
            </div>
          </div>
          <div class="col-md-2 offset-md-1">
            <div class="quick-links">
              <?php dynamic_sidebar( 'advanced-footer-widget-4' ); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-right">
            <div class="fooer-credit-card-banner">
              <img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/Credit-Card-Banner.png" />
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-section">
        <div class="container">
          <div class="row">
            <?php 
                $section_1 = astra_get_small_footer( 'footer-sml-section-1' );
                $section_2 = astra_get_small_footer( 'footer-sml-section-2' );
            ?>
            <div class="col-6"><?php echo $section_1; ?></div>
            <div class="col-6 text-right"><?php echo $section_2; ?></div>
          </div>
        </div>
      </div>
    </footer>
  </div><!-- #page -->
  <?php astra_body_bottom(); ?>
  <?php wp_footer(); ?>
  </body>
</html>