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
	<link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/admin/assets/css/place-orderform.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/manage.css">
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
<script type="text/javascript" src="/admin/assets/js/manage.js"></script>