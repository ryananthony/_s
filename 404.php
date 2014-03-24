<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package flannel_s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-wrap">
				<section class="error-404 not-found entry-content">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Oops! Only some sweaty guitars here.', 'flannel_s' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'Maybe you\'re too early for the show?', 'flannel_s' ); ?></p>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->				
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>