<div class="wrap">
	<h1>Order fields settings</h1>
	<?php settings_errors(); ?>
	
	<form method="post" action="options.php">
		<?php 
			settings_fields( 'writerzbay_options_group' );
			do_settings_sections( 'writerzbayform' );
			submit_button();
		?>
	</form>
</div>