<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>

		<footer class="clear-both">
			<p class="copyright">&copy; <?= date('Y'); ?> Emily Joy Gilbert</p>
		</footer>

	</div> <?php /* END .container */ ?>


	<?php  /* Imports all necessary scripts */
		include 'assets/includes/footer_script-imports.php'; ?>

	<?php wp_footer(); ?>

</body>
</html>