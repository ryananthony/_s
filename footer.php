<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */
?>

	</div><!-- #content -->
  <div class="footer-wrap">
    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="site-info">
        <ul>
          <li>
            <a href="https://github.com/ryananthony/flannel_s"><img src="/wp-content/themes/flannel_s/img/fl-logo-tiny.png" alt="FLANNEL F.L. Logo"></a>
            <br><?php printf( __( 'Theme: %1$s by %2$s.', '_s' ), '"Rocking Flannel"', '<a href="http://www.ryananthonyrichardson.com/" rel="designer">Ryan</a>' ); ?>
            <br><a href="<?php echo esc_url( __( 'http://underscores.me/', '_s' ) ); ?>">
              <?php printf( __( 'Built from the ground up with a nice head start from %s', '_s' ), '_s' ); ?>
            </a>
          </li>
        </ul>
      </div><!-- .site-info -->
    </footer><!-- #colophon -->
  </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
