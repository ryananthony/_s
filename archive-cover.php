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

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        query_posts(
          array(
            'post_type'=>'cover',
            'posts_per_page'=>'99',
            'paged'=>$paged
          )); 
      ?>

      <?php if ( have_posts() ) : ?>
        <table>
          <thead>
            <tr>
              <th>Artist</th>
              <th>Song Title</th>
              <th>Album</th>
              <th>Released</th>
            </tr>
          </thead>
          <tbody>

            <?php while ( have_posts() ) : the_post(); ?>
              <tr class="cover-info">
                <td>
                  <?php echo get_post_meta( get_the_ID(), 'artist', true); ?>
                </td>
                <td><?php 
                  $link = (get_post_meta( get_the_ID(), 'info_link', true));

                if(!empty($link)) {
                  echo "<a href=\"" . $link . "\">" . get_the_title() . "</a>";                       
                } else {
                  echo get_the_title(); 
                }
                  ?>
                </td>
                <td>
                  <?php 
                    $album = get_post_meta( get_the_ID(), 'album', true); 
                    if (!empty($album)) { 
                      echo $album;
                    }
                  ?>
                </td>
                <td>
                  <?php 
                    $record_year = get_post_meta( get_the_ID(), 'year', true); 
                    if (!empty($record_year)) { 
                      echo $record_year;
                    }
                  ?>
                </td>
              </tr>

              <?php 
                $soundcloud = get_post_meta( get_the_ID(), 'soundcloud', true); 
                if (!empty($soundcloud)) { ?>
                  <tr class="soundcloud-embed">
                    <td colspan="4">
                      <?php echo $soundcloud;?>
                    </td>
                  </tr><?php 
                }
              ?>
            <?php endwhile; // end of the loop. ?>          
          </tbody>
        </table>

      </div>

      <?php flannel_s_paging_nav(); ?>

    <?php else : ?>

      <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
