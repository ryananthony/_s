<?php
/**
 * The template for displaying the 'show' custom post type.
 *
 * This is the template that displays all shows by default.
 *
 * @package -s
 */

get_header(); ?>

    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

        <?php query_posts(array('post_type'=>'show')); ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <div class="content-wrap">
            <div class="entry-header">
              <div class="entry-title">
                <h2>
                  <?php 
                    $month_int = substr(get_post_meta( get_the_ID(), 'date', true), 4, 2);
                    switch ($month_int) {
                        case 01:
                          echo 'January';
                          break;
                        case 02:
                          echo 'February';
                          break;
                        case 03:
                          echo 'March';
                          break;
                        case 04:
                          echo 'April';
                          break;
                        case 05:
                          echo 'May';
                          break;
                        case 06:
                          echo 'June';
                          break;
                        case 07:
                          echo 'July';
                          break;
                        case 08:
                          echo 'August';
                          break;
                        case 09:
                          echo 'September';
                          break;
                        case 10:
                          echo 'October';
                          break;
                        case 11:
                          echo 'November';
                          break;
                        case 12:
                          echo 'December';
                          break;
                        default:
                          echo $month_int;
                          break;
                      } // month ?> 
                  <?php 
                    $day_int = substr(get_post_meta( get_the_ID(), 'date', true), 6, 2);
                    $day_adjective;
                    switch ($day_int) {
                      case 01:
                        $day_adjective = 'st';
                        break;
                      case 02:
                        $day_adjective = 'nd';
                        break;
                      case 03:
                        $day_adjective = 'rd';
                        break;
                      case 21:
                        $day_adjective = 'st';
                        break;
                      case 22:
                        $day_adjective = 'nd';
                        break;
                      case 23:
                        $day_adjective = 'rd';
                        break;
                      case 31:
                        $day_adjective = 'st';
                        break;
                      default:
                        $day_adjective = 'th';
                        break;
                    }
                    echo $day_int . $day_adjective; // day ?>, 
                  <?php echo substr(get_post_meta( get_the_ID(), 'date', true), 0, 4); // year ?>
                </h2>
              </div>
            </div>
            <article class="show-entry">
              <h3><?php the_title(); ?></h3>
              <p><strong>
                <?php echo get_post_meta( get_the_ID(), 'time', true); ?> 
                At the <?php echo get_post_meta( get_the_ID(), 'venue', true); ?>
                <?php 
                  $guests = get_post_meta( get_the_ID(), 'guests', true); 
                  if (!empty($guests)) { ?>
                    With <?php echo $guests; 
                  } 
                ?></strong></p>
                
              <?php the_content(); ?>
              
              <button href="<?php echo get_post_meta( get_the_ID(), 'fb_link', true); ?>">Click here to RSVP.</button>

            </article>

          </div>

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
              comments_template();
          ?>

          <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
      </div><!-- #primary -->

<?php get_footer(); ?>
