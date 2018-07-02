<?php include 'orderfields.php'; ?>
<script type='text/javascript' >        
    var orderdata = <?php print json_encode($orderdata) ?>;
</script>
<div id="appform">
    <wbapp :orderd="formdata"/>
</div> 