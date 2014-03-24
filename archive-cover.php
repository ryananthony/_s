<?php
/**
 * The template for displaying the 'cover' custom post type.
 *
 * This is the template that displays all covers by default.
 *
 * @package _s
 */

get_header(); ?>

  <div id="primary" class="content-area content-wrap">
    <main id="main" class="site-main" role="main">
      <div class="entry-header">
        <h3 class="entry-title">The Really Really Long Set List</h3>
      </div>
      <div class="covers-list">
        <table> <!-- todo, add if_have_posts conditional -->
          <?php query_posts(array('post_type'=>'cover')); ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <tr class="cover">
              <td>
                <?php echo get_post_meta( get_the_ID(), 'artist', true); ?>
              </td>
              <td>
                <?php the_title(); ?>
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

            <?php
              // If comments are open or we have at least one comment, load up the comment template
              if ( comments_open() || '0' != get_comments_number() )
                comments_template();
            ?>

          <?php endwhile; // end of the loop. ?>

        </table>
      </div>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
