<?php
/**
 * Шаблон обычной страницы (front-page.php)
 * @package WordPress
 * @subpackage m88thems-wp
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class=" content-min">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</article>
				<?php endwhile; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>