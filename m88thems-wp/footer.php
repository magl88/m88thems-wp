<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage m88thems-wp
 */
?>
	</div><!-- End content-wrapper-->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="block-cont">
						<strong>Контакты:</strong>
						<ul>
							<li><strong>Адрес:</strong> <a href="https://goo.gl/maps/M3nGb3MggVP2" target="_blank">65000 г.Одесса, ул. Пушкина 5</a></li>
							<li><strong>Телефон:</strong> <a href="tel:+00000000">+0 (00) 000-00-00</a></li>
							<li><strong>E-mail:</strong> <a href="mileto:email@test.test">email@test.test</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="block-nav">
						<strong>Меню:</strong>
						<?php $args = array(
							'theme_location' => 'bottom',
							'container'=> false,
							'menu_class' => 'bottom-menu',
							'menu_id' => 'bottom-nav',
							'fallback_cb' => false
						);
						wp_nav_menu($args);
						?>
					</div>
				</div>
				<div class="col-sm-4">
					© 2006–<?php echo date("Y") ." ". esc_attr( get_bloginfo( 'name') ); ?>.
				</div>
			</div>
		</div>
	</footer>
</div><!-- End wrapper-->
<?php wp_footer(); ?>
</body
</html>