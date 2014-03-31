<?php
/**
 * The template for displaying the 'cover' custom post type.
 *
 * This is the template that displays all covers by default.
 *
 * @package flannel_s
 */

get_header(); ?>

  <div id="primary" class="content-area content-wrap">
    <main id="main" class="site-main" role="main">
      <div class="entry-header">
        <h3 class="entry-title">The Really Long Set List</h3>
      </div>
      <div class="covers-list">
      
      <?php 

        query_posts(
          array(
            'post_type'=>'cover',
            'posts_per_page'=>'99',
            'paged'=>$paged
          )); 
      ?>

      <?php if ( have_posts() ) : ?>
        <table id="covers-table" class="tablesorter">
          <thead>
            <tr>
              <th class="cover-artist">Artist</th>
              <th class="cover-song">Song</th>
              <th class="cover-year">Year</th>
              <th class="cover-album">Album</th>
            </tr>
          </thead>
          <tbody>

            <?php 

              while ( have_posts() ) : the_post(); 
              $soundcloud = get_post_meta( get_the_ID(), 'soundcloud', true); 

              ?>
              <?php if (!empty($soundcloud)) { ?>
                <tr class="cover-info soundcloud" id="<?php the_ID(); ?>">
              <?php } else { ?>
                <tr class="cover-info">
                <?php } ?>
                  <td class="cover-artist">
                    <?php if (!empty($soundcloud)) { ?> <img class="soundcloud-label" src="/wp-content/themes/flannel_s/img/soundcloud.png"><?php } ?>
                    <?php 
                      echo get_post_meta( get_the_ID(), 'artist', true); 
                    ?>
                  </td>
                  <td class="cover-song"><?php 
                    $link = (get_post_meta( get_the_ID(), 'info_link', true));

                  if(!empty($link)) {
                    echo "<a href=\"" . $link . "\">" . get_the_title() . "</a>";                       
                  } else {
                    echo get_the_title(); 
                  }
                    ?>
                  </td>
                  <td class="cover-year">
                    <?php 
                      $record_year = get_post_meta( get_the_ID(), 'year', true); 
                      if (!empty($record_year)) { 
                        echo $record_year;
                      }
                    ?>
                  </td>
                  <td class="cover-album">
                    <?php 
                      $album = get_post_meta( get_the_ID(), 'album', true); 
                      if (!empty($album)) { 
                        echo $album;
                      }
                    ?>
                  </td>
                </tr>
                <?php if (!empty($soundcloud)) { ?>
                  <div class="soundcloud-container" data-cover-id="<?php the_ID(); ?>">
                    <div class="soundcloud-embed">
                      <?php echo $soundcloud;?>
                      <button>Go Back</button>
                      <p>Be sure to pause the player before pressing the &ldquo;Go Back&rdquo; button or music will continue to play in the background.</p>
                    </div>
                  </div>
                <?php } ?>
            <?php endwhile; // end of the loop. ?>          
          </tbody>
        </table>

      </div>

    <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
