<?php
//This part includes all the shit I made in php for the site.
include('./streamutils.php');
?>
<title>acestream.com</title>
<meta name="description" content="" />
<style type="text/css"> 
html, body { padding: 0px; margin: 0px; border: 0px;}
 #navbar ul { 
	margin: 0; 
	padding: 5px; 
	list-style-type: none; 
	text-align: center; 
	background-color: #2d2928; 
	} 
#navbar ul li {  
	display: inline; 
	} 
#navbar ul li a { 
float: bottom;
	text-decoration: none; 
	padding: .2em 1em; 
	color: #aaaaaa; 
	background-color: #2d2928; 
	} 
#navbar ul li a:hover { 
	color: #aaaaaa; 
	background-color: #373331; 
	} 
#userpanel {
float: right;
}
#streamlist {
float: left;
}
#clock {
float: top;
}
#iframe_mask {
		overflow-y:hidden;
	}
</style>
</head>
<HTML>
<body style="background-color: #4A4344;">
<center>
<div id="navbar">
<ul>
<li><a href="http://acestream.com/s.php?u=home">Home</a></li>
<li><a href="http://acestream.com/s.php?u=acedotcom">Aces Stream</a></li>
<li><a href="http://acestream.com/s.php?u=Forum">The Forum</a></li>
<li><a href="http://acestream.com/s.php?u=Doogler">The Chan</a></li>
<li><a href="http://acestream.com/s.php?u=ACEBook">ACEbook</a></li>
<li><a href="http://acestream.com/s.php?u=streamstart">Get Your Own Page</a></li>
<li><script id="clock" type="text/javascript" src="http://localtimes.info/clock.php?cp3_Hex=FFB200&cp2_Hex=2D2928&cp1_Hex=AAAAAA&fwdt=150&ham=0&hbg=0&hfg=0&sid=1&mon=0&wek=0&wkf=0&sep=0&continent=North America&country=United States&province=Illinois&city=Belleville&widget_number=1100"></script></li>
<?php 
$arr = getstreamgodsid();
$streammenu = 'On';
$isannyone;
if (empty($arr)) {$isannyone = "No one is streaming"; }
else { $isannyone = "Acestream.com Streamer list!"; }
echo "<select id=streamlist onchange='window.location.href=this.options[this.selectedIndex].value;'>";
echo "<option value='s.php?u=acedotcom'>$isannyone</option>";
foreach($arr as $option){
echo "<option value='s.php?u={$option}'>{$option}</option>";   
}
echo "</select>";
userpanel(); ?>
</ul>
	</center>
</div><!-- #nav -->
<center>
<div id="acebanner">
<?php $mo = getdatatoseecustomuserbanner(curPageURL());
if (!isset($mo) || empty($mo)) {}
else { print ('<IMG SRC =' . $mo . '>');  }?>
</div>
</center>
<?php echo getdatatoseecustomuserpage(curPageURL());?> 
</div>
</body>
</html>
