<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>acestream.com</title>
<style type="text/css"> 
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
#registerpanel {
float: right;
}
#loginpanel {
float: right;
}
#streamlist {
float: left;
}
#tag_ora {
color: #aaaaaa;
font-weight:900;
}
#userpage {
height: 100%;
width: 100%;
}
      body
          {
          margin : 0;
          padding: 0;
          }
</style>
<script type="text/javascript">
<!--
function calcHeight()
{
//find the height of the internal page
var the_height=
document.getElementById('the_iframe').contentWindow.
document.body.scrollHeight;

//change the height of the iframe
document.getElementById('the_iframe').height=
the_height;
}
//-->
<!--
var serverdate = new Date(<?php echo date('y,n,j,G,i,s'); ?>);
var hour24 = serverdate.getHours();
var minute = serverdate.getMinutes();
var seconds = serverdate.getSeconds();

function minTwoDigits(n) {
  return (n < 10 ? '0' : '') + n;
}
function ceas() {
  seconds++;
  if (seconds>59) {
    seconds = 0;
    minute++;
  }
  if (minute>59) {
    minute = 0;
    hour24++;
  }
  if (hour24>23) {
    hour24 = 0;
  }
  if (hour24 >= 13 && hour24 <= 24) {
    y=12;
    hour12 = hour24-y;
  }
   if (hour24 >= 1 && hour24 <= 12) {
    hour12 = hour24;
  }
var output = ""+minTwoDigits(hour12)+":"+minTwoDigits(minute)+":"+minTwoDigits(seconds)+""
document.getElementById("tag_ora").innerHTML = output;
}
window.onload = function(){
  setInterval("ceas()", 1000);
}
--></script>
</head>
<body class="bbox" style="background-color: #4A4344;">
<div id="navbar">

<?php 
include('./streamutils.php');
$arr = getstreamgodsid();
$streammenu = 'On';
$isannyone;
if (empty($arr)) {$isannyone = "No one is streaming"; }
else { $isannyone = "The Other Streamers!"; }
echo "<select id='streamlist' onchange='window.location.href=this.options[this.selectedIndex].value;'>";
echo "<option value='s.php?u=acedotcom'>$isannyone</option>";
foreach($arr as $option){
echo "<option value='s.php?u={$option}'>{$option}</option>";   
}
echo "</select>";
?>
<ul id="nav">
<li><a href="s.php?u=home">Home</a></li>
<li><a href="s.php?u=acedotcom">Aces Stream</a></li>
<li><a href="s.php?u=Forum">The Forum</a></li>
<li><a href="s.php?u=Doogler">The Chan</a></li>
<li><a href="http://acestream.com/s.php?u=streamstart">Get Your Own Page</a></li>
<li id="tag_ora" ></li>
<?php userpanel(); ?>
</ul>
</div><!-- #nav -->
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
