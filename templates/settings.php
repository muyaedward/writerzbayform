<div class="wrap">
	<h1>Writerzbay main settings</h1>
	<?php settings_errors(); ?>
	
	<form method="post" action="options.php">
		<?php 
			settings_fields( 'writerzbay_options_group_orders' );
			do_settings_sections( 'main_settings' );
			submit_button();
		?>
	</form>
</div>