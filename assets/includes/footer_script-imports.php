<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php if( is_home() ): ?>
	<script src="<?php echo bloginfo('template_directory') ?>/assets/js/responsiveslides.min.js"></script>
<?php endif; ?>

<?php if( is_single() ): ?>
	<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<?php endif; ?>

<script src="<?php echo bloginfo('template_directory') ?>/assets/js/functions.min.js"></script>