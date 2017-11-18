<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
var Lst;

function CngClass(obj){
 if (Lst) Lst.className='';
 obj.className='selected';
 Lst=obj;
 
}

/*]]>*/
</script></head>

<body>

<style type="text/css"> 
<!-- .selected { font: bold 18px Arial, Helvetica, sans-serif; color:#FF0000; } --> 
</style>  
<ul>  
<li>
<a onclick="CngClass(this);" >Test 1</a>
</li>  
<li>
<a onclick="CngClass(this);">Test 2</a>
</li>  
<li>
<a onclick="CngClass(this);">Test 3</a>
</li>  
</ul>

</body>


</html>