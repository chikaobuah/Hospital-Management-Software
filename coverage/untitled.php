<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<SCRIPT type="text/javascript">
function createCookie(name,value,days) {

	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}


function readCookieX(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function scroll(){
var xpos = document.body.scrollLeft
var ypos = document.body.scrollTop
createCookie("y",ypos,"2");
createCookie("x",xpos,"2");
}

var posx = readCookieX("x");
var posy = readCookieX("y");
document.body.scrollLeft = posx;
document.body.scrollTop = posy;

setTimeout("scroll()",9000);
</SCRIPT>
<TITLE>Test</TITLE>
<META http-equiv="Refresh" content="10; URL=untitled.php">
</HEAD>
<FORM>
1<BR>
2<BR>
3<BR>
4<BR>
5<BR>
6<BR>
7<BR>
8<BR>
9<BR>

1<BR>
2<BR>
3<BR>
4<BR>
5<BR>
6<BR>
7<BR>
8<BR>
9<BR>

1<BR>
2<BR>
3<BR>
4<BR>
5<BR>
6<BR>
7<BR>
8<BR>
9<BR>

1<BR>
2<BR>
3<BR>
4<BR>
5<BR>
6<BR>
7<BR>
8<BR>
9<BR>

a<BR>
b<BR>
c<BR>
d<BR>
e<BR>
f<BR>
g<BR>
h<BR>
i<BR>

</FORM>
</BODY>
</HTML>
