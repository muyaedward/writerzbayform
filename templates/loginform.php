<?php include 'orderfields.php'; ?>
<script type='text/javascript' >
    var orderdata = <?php print json_encode($orderdata) ?>;
</script>
<?php if ($addsettings) { ?>
<div id="wbapplogin">
    <wbapp-login/>
</div>
<?php } ?>