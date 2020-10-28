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
              <!--<ul class="social-icons">
                <li>
                  <a href="#"
                    ><i class="fa fa-instagram" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-twitter" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-facebook" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-linkedin" aria-hidden="true"></i
                  ></a>
                </li>
              </ul>-->
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