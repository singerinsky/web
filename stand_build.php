<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>All Stand </title>
</head>

<body>

<?php
include "db.php";
include "head.php";

if($global_stand == -1)
{
	print "no stand file build!";
	return;
}

foreach($global_stand as $info)
{
	print $info['act_id'].'<br/>';	
}

?>

</body>
</html>
