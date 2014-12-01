<?php
/**
 * @package flannel_s
 */
?>

<?php 

	$soundcloud = get_post_meta( get_the_ID(), 'soundcloud', true);
	$spotify_link = (get_post_meta( get_the_ID(), 'spotify_link', true));
	$album = get_post_meta( get_the_ID(), 'album', true);
	$link = (get_post_meta( get_the_ID(), 'info_link', true));
	$record_year = get_post_meta( get_the_ID(), 'year', true);
	$artist = get_post_meta( get_the_ID(), 'artist', true);

?>

<div class="content-wrap">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h3 class="entry-title">
				<?php echo $artist; ?> - 
				<?php the_title(); ?></h3>
			<div class="entry-meta">
				<?php flannel_s_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<h3>Lyrics</h3>
			<div class="cover-info-box">
				<?php 
					if(!empty($spotify_link)) {
		        echo "<a class=\"image-link\" href=\"" . $spotify_link . "\"><img src=\"/wp-content/themes/flannel_s/img/spotify-logo.png\"></a>";                       
		      } 
	      ?>
				<ul>
					<?php if (!empty($album)) { ?>
	        	<li>Album: <?php echo $album; ?></li>
	        <?php }
	        if (!empty($record_year)) { ?>
	        	<li>Year: <?php echo $record_year; ?></li>
	        <?php }
	        if (!empty($link)) { ?>
	        	<li><?php echo "<a href=\"" . $link . "\">" . "More info" . "</a>"; ?></li>
	        <?php } ?>	
				</ul>
			</div>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'flannel_s' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<!-- AddThis Button BEGIN -->
			<p class="share-this">Share this with your friends</p>
			<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
			</div>
			<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52afe5cb1d389045"></script>
			<!-- AddThis Button END -->
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'flannel_s' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'flannel_s' ) );

				if ( ! flannel_s_categorized_blog() ) {
					// This blog only has 1 category so we just need to worry about tags in the meta text
					if ( '' != $tag_list ) {
						$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'flannel_s' );
					} else {
						$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'flannel_s' );
					}

				} else {
					// But this blog has loads of categories so we should probably display them here
					if ( '' != $tag_list ) {
						$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'flannel_s' );
					} else {
						$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'flannel_s' );
					}

				} // end check for categories on this blog

				printf(
					$meta_text,
					$category_list,
					$tag_list,
					get_permalink()
				);
			?>

			<?php edit_post_link( __( 'Edit', 'flannel_s' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</div>

