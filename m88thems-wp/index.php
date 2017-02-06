<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage m88thems-wp
 */
get_header(); ?>
index
<section>
	<div class="container">
		<div class="row">
			<div class=" content-min">
				<h1><?php
					if (is_day()) : printf('Daily Archives: %s', get_the_date());
					elseif (is_month()) : printf('Monthly Archives: %s', get_the_date('F Y'));
					elseif (is_year()) : printf('Yearly Archives: %s', get_the_date('Y'));
					else : 'Archives';
				endif; ?></h1>
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
index off
<?php get_footer(); ?>