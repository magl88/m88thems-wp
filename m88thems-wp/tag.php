<?php
/**
 * tag template (tag.php)
 * @package WordPress
 * @subpackage m88thems-wp
 */
get_header(); ?> 
<section>
	<div class="container">
		<div class="row">
			<div class=" content-min">
				<h1><?php printf('Посты с тэгом: %s', single_tag_title('', false)); ?></h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('loop'); ?>
				<?php endwhile;
				else: echo '<p>Нет записей.</p>'; endif; ?>	 
				<?php pagination(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>