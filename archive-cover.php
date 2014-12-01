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
        <p>You can click a heading in the table to sort the content.</p>
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
              <th class="cover-info">Details</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              while ( have_posts() ) : the_post(); 
                $soundcloud = get_post_meta( get_the_ID(), 'soundcloud', true);
                $spotify_link = (get_post_meta( get_the_ID(), 'spotify_link', true));
                $album = get_post_meta( get_the_ID(), 'album', true);
                $link = (get_post_meta( get_the_ID(), 'info_link', true));
                $record_year = get_post_meta( get_the_ID(), 'year', true);
                $artist = get_post_meta( get_the_ID(), 'artist', true);
                
                if (!empty($soundcloud)) { ?>
                  <tr class="cover-info soundcloud" id="<?php the_ID(); ?>">
                <?php } else { ?>
                  <tr class="cover-info">
                <?php } ?>
                    <td class="cover-artist">
                      <?php if (!empty($soundcloud)) { ?> 
                        <img data-cover-name="<?php echo $post->post_name; ?>" class="soundcloud-label" src="/wp-content/themes/flannel_s/img/soundcloud.png">
                      <?php }  
                      echo $artist; ?>
                    </td>
                    <td class="cover-song">
                      <?php echo "<a href=\"" . get_the_permalink() . "\">" . get_the_title() . "</a>"; ?>
                    </td>
                    <td class="cover-details">
                      <?php if(!empty($spotify_link)) {
                        echo "<a class=\"button\" href=\"" . $spotify_link . "\">" . "Spotify" . "</a>";                       
                      }
                      if (!empty($album)) { 
                        echo $album;
                      } ?> - 
                    [<?php if (!empty($record_year)) { 
                        echo $record_year;
                      } ?>]
                      <?php if(!empty($link)) {
                        echo "<a href=\"" . $link . "\">" . " - More info" . "</a>";                       
                      } 
                      
                      if (!empty($soundcloud)) { ?>
                        <div class="soundcloud-container" data-cover-id="<?php the_ID(); ?>">
                          <div class="soundcloud-embed">
                            <?php echo $soundcloud;?>
                            <button>Go Back</button>
                            <p>Be sure to pause the player before pressing the &ldquo;Go Back&rdquo; button or music will continue to play in the background.</p>
                          </div>
                        </div>
                      <?php } ?>
                    </td>
                  </tr>
              <?php endwhile; // end of the loop. ?>          
          </tbody>
        </table>

      </div>

    <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

  <script>
    window.onload = function() {
      var cover_hash = window.location.hash.substring(1);
      $("[data-cover-name=" + cover_hash + "]").first().click();
    }
  </script>

<?php get_footer(); ?>
