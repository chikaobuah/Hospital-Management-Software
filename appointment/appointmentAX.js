

//**********************************************************************************************************************************************************************************************validate9***************************************************************************************************************************************************************************************
  function validate9() {
select2 = document.getElementById("select2").value;
select3 = document.getElementById("select3").value;
select6 = document.getElementById("select6").value;
  if (select2 == "") {
  hideAllErrors();
document.getElementById("Empty").style.display = "inline";

  return false;
  } else if (select3 == "") {
hideAllErrors();
document.getElementById("Empty2").style.display = "inline";

  return false;
  }else if (select6 == "") {
hideAllErrors();
document.getElementById("Empty3").style.display = "inline";

  return false;
  }
Add();
  }
 
  function hideAllErrors() {
document.getElementById("Empty").style.display = "none"
document.getElementById("Empty2").style.display = "none"
document.getElementById("Empty3").style.display = "none"

  }

//**********************************************************************************************************************************************************************************************first***************************************************************************************************************************************************************************************



 function first(sc) {

listt2e(sc,"appointment_services","services.php")
listt2e(sc,"appointment_weekly","weekly.php")
   }



//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************


var slrootdomain2e="http://"+window.location.hostname

function listt2e(sc,slshowlistcontainer2e,slshowlist2e)
{
var slshowlist2e_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2e_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2e_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2e_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2e******/
slshowlist2e_request.onreadystatechange=function(){
slloadshowlist2e(slshowlist2e_request, slshowlistcontainer2e)
 }

slshowlist2e=slshowlist2e+"?sc="+sc;
slshowlist2e_request.open('GET', slshowlist2e, true)
slshowlist2e_request.send(null)

function slloadshowlist2e(slshowlist2e_request, slshowlistcontainer2e){
if (slshowlist2e_request.readyState == 4 && (slshowlist2e_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2e).innerHTML=slshowlist2e_request.responseText
}

}




// JavaScript Document
var xmlHttp;
function DAB(param){
var I_ks=document.getElementById(param);
return I_ks;
}
function getXMLHttpRequest(){
var xmlHttp=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}


//**********************************************************************************************************************************************************************************************Add************************************************************************************************************************************************************************************

function Add(){

var select6 = document.form299.select6.value;
var select2 = document.form299.select2.value;
var session = document.form299.session.value;
var select3 = document.form299.select3.value;
var sc = document.form299.sc.value;
	
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}


var url="insert.php";
url=url+"?select6="+select6+"&select2="+select2+"&session="+session+"&select3="+select3+"&sc="+sc;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= 1){
	listt2e(sc,"appointment_weekly","weekly.php");
	alert(addnt)
	} else
	{
		listt2e(sc,"appointment_weekly","weekly.php");
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}


//**********************************************************************************************************************************************************************************************delete************************************************************************************************************************************************************************************
// JavaScript Document
var xmlHttp2;
function DAB2(param){
var I_ks2=document.getElementById(param);
return I_ks2;
}
function getXMLHttpRequest2(){
var xmlHttp2=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp2 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp2=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp2=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp2;
}

function Delete(Id,every,days,startss,sc,session,ch){

	
xmlHttp2=getXMLHttpRequest2();
if(xmlHttp2==null){
alert("Your browser does not support Ajax");
return;}


var url="delete.php";
url=url+"?Id="+Id+"&every="+every+"&session="+session+"&days="+days+"&startss="+startss+"&sc="+sc+"&ch="+ch;


xmlHttp2.onreadystatechange=function(){ 
if (xmlHttp2.readyState==4){ 
addnt2=xmlHttp2.responseText;
if (addnt2!= 1){
	listt2e(sc,"appointment_weekly","weekly.php");
	alert(addnt2)
	} else
	{
		listt2e(sc,"appointment_weekly","weekly.php");
		}

}else if(xmlHttp2.readyState==3){

}}
xmlHttp2.open("GET",url,true);	
xmlHttp2.send(null);

}