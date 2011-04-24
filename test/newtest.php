<?php
$test_message= 'This is a test message';
?>
<html>
<head>
<script type="text/javascript">
function show_alert(msg)
{
alert(msg);
}
</script>
</head>
<body>
<input type="button" onclick="show_alert('<?php echo $test_message; ?>')" value="Show alert box" />
</body>
</html>