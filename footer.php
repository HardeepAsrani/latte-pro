<?php
	$latte_footer_content = get_theme_mod('latte_footer_content');
?>

		<footer class="footer" id="footer">
			<div class="row">
				<div class="col-md-12">
				<?php if(!empty($latte_footer_content)) : ?>
					<?php echo '<p>' . $latte_footer_content . '</p>'; ?>
				<?php else: ?>
					<?php echo '<p><a target="_blank" href="http://www.hardeepasrani.com/portfolio/latte/">Latte</a><br/>'.__('Proudly powered by','latte').' WordPress</p>'; ?>
				<?php endif; ?>
				</div>
			</div>
		</footer>

	</div>
<?php wp_footer(); ?>
 </body>
</html>
