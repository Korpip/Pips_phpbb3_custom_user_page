<?php include('./streamutils.php');
$arr = getstreamgodsid();
$streammenu = 'On';
$isannyone;
if (empty($arr)) {$isannyone = "No one is streaming"; }
else { $isannyone = "The Other Streamers!"; }
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>AcePag</title>
<script type="text/javascript" src="http://jserrlog.appspot.com/jserrlog-min.js"></script>
<script type="text/javascript"> var serverdate = new Date(<?php echo date('y,n,j,G,i,s'); ?>); jsErrLog.debugMode = true; </script>
<link rel="stylesheet" type="text/css" href="acepage.css">
<script type="text/javascript" src="acepage.js"></script>
</head>
<body class="bbox" style="background-color: #4A4344;">
<div>
	<ul id="menu">
		<li id="streamlist"><a href="s.php?u=acedotcom"><?php echo "$isannyone"; ?></a>
			<ul class="sub-menu">
				<?php foreach($arr as $option){	echo "<li><a href='s.php?u={$option}'>{$option}</a></li></br>";}?>
			</ul>
		</li>
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
	<?php echo getdatatoseecustomuserpage(curPageURL());?> 
</div>
</body>
</html>
