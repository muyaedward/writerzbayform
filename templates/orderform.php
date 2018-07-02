<?php include 'orderfields.php'; ?>
<script type='text/javascript' >
    var orderdata = <?php print json_encode($orderdata) ?>;
</script>
<div id="placeorder">
    <place-order :orderd="formdata"/>
</div>