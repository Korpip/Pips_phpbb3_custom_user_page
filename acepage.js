<!--
function replaceContentInContainer(target,source) {
document.getElementById(target).innerHTML = document.getElementById(source).innerHTML;
}
//-->
<!--
function openWin(name,w,h) {
var divText = document.getElementById(name).outerHTML;
var myWindow = window.open('', '', 'width='+w+',height='+h);
var doc = myWindow.document;
var bodyopen = "<body bottommargin=0 leftmargin=0 marginheight=0 marginwidth=0 rightmargin=0 topmargin=0>";
var bodyclose = "</body>";
doc.open();
doc.write(bodyopen + divText + bodyclose);
doc.close();
}
//-->
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
var hour24 = serverdate.getHours();
var hour = hour24;
var minute = serverdate.getMinutes();
var seconds = serverdate.getSeconds();
var ampm = " PM "

function minTwoDigits(n) {return (n < 10 ? '0' : '') + n;}
function ceas() { seconds++;
if (seconds>59) { seconds = 0;minute++;}
if (minute>59)  { minute = 0;hour24++;}
if (hour24 < 12){ ampm = " AM ";}
if (hour24 > 12){ ampm = " PM ";}
if (hour24 > 23){ hour24 = 0;}
if (hour24 > 12){ hour = hour24 - 12;}

var output = ""+minTwoDigits(hour)+":"+minTwoDigits(minute)+":"+minTwoDigits(seconds)+":"+ampm+""
document.getElementById("clock").innerHTML = output;
}
window.onload = function(){
setInterval("ceas()", 1000);
}
-->
