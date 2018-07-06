<?php
/*
 * Template Name: WritersBay App Template
 * Description: WritersBay App custom template.
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage your orders</title>
    <link rel="stylesheet" type="text/css" href="<?php echo plugins_url('writerzbayform-master/assets/css/app.css' , plugin_dir_path( __FILE__ )); ?>">
</head>
<body>
	<?php
    if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		else :
		return 'No content';
	endif;
	?>   
</body>
</html>
<script type="text/javascript" src="<?php echo plugins_url('writerzbayform-master/assets/js/app.js' , plugin_dir_path( __FILE__ )); ?>"></script>