<?php include('streamutils.php');?>
<html>
<head>
<script type="text/javascript"> var serverdate = new Date(<?php echo date('y,n,j,G,i,s'); ?>);</script>
<link rel="stylesheet" type="text/css" href="acepage.css">
<script type="text/javascript" src="acepage.js"></script>
</head>
<body style="background-color: #<?php echo getdatatoseecustomusercolor(curPageURL());?> ;" >
<?php include('header.php');?>
<div>
	<?php $mo = getdatatoseecustomuserbanner(curPageURL());
	if (!isset($mo) || empty($mo)) {}
	else { print ('<center><IMG id=acebanner SRC =' . $mo . '></center>');  }?>
</div>
	<?php echo getdatatoseecustomuserpage(curPageURL());?> 
</body>
</html>
