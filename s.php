<?php include('./streamutils.php'); ?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>acestream.com</title>
<script type="text/javascript" src="http://jserrlog.appspot.com/jserrlog-min.js"></script>
<script type="text/javascript">
var serverdate = new Date(<?php echo date('y,n,j,G,i,s'); ?>);
// Configure site parameters

jsErrLog.debugMode = true;

// Optionally add additional debug information to the jsErrLog.info message field

//jsErrLog.info = "Populated the Info Message to pass to logger"

</script>
<link rel="stylesheet" type="text/css" href="acepage.css">
<script type="text/javascript" src="acepage.js"></script>
</head>
<body class="bbox" style="background-color: #4A4344;">
<div id="navbar">
<ul id="nav">
<?php 
$arr = getstreamgodsid();
$streammenu = 'On';
$isannyone;
if (empty($arr)) {$isannyone = "No one is streaming"; }
else { $isannyone = "The Other Streamers!"; }

echo "<li id='streamermenu' class='menuitemwithsub'><a href='s.php?u=acedotcom'>$isannyone</a>";
echo "<ul>";
foreach($arr as $option){
	echo "</br><li><a href='s.php?u={$option}'>{$option}</a></li>";
}
echo "</ul>";
echo "</li>";
?>
<li><a href="s.php?u=home">Home</a></li>
<li><a href="s.php?u=acedotcom">Aces Stream</a></li>
<li><a href="s.php?u=Forum">The Forum</a></li>
<li><a href="http://acestream.com/s.php?u=streamstart">Get Your Own Page</a></li>
<li id="clock" ></li>
<?php userpanel(); ?>
</ul>
</div>
<div>
<?php $mo = getdatatoseecustomuserbanner(curPageURL());
if (!isset($mo) || empty($mo)) {}
else { print ('<center><IMG id=acebanner SRC =' . $mo . '></center>');  }?>
</div>
<div id="userpage">
<?php echo getdatatoseecustomuserpage(curPageURL());
?> 
</div>
</body>
</html>
