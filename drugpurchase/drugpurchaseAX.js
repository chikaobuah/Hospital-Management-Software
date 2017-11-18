

//**********************************************************************************************************************************************************************************************validate3***************************************************************************************************************************************************************************************
function validate3() {
		
		select33 = document.getElementById("select2").value;
		unit33 = document.getElementById("unit2").value;
		quantity = document.getElementById("quantity").value;

	if (select33 == ""){
hideAllErrors();
document.getElementById("Error4").style.display = "inline";
  		return false;
	}else if (unit33 == "") {
hideAllErrors();
document.getElementById("Error5").style.display = "inline";
return false;
	}else if (quantity == "") {
hideAllErrors();
document.getElementById("Error6").style.display = "inline";
return false;
	}
AddOrd();
}
 
function hideAllErrors() {
document.getElementById("Error4").style.display = "none"
document.getElementById("Error5").style.display = "none"
document.getElementById("Error6").style.display = "none"
  }

//**********************************************************************************************************************************************************************************************validate***************************************************************************************************************************************************************************************
function validate() {
		
		created2 = document.getElementById("created2").value;
		ono2 = document.getElementById("ono2").value;
		rno = document.getElementById("rno").value;

	if (created2 == ""){
hideAllErrors();
document.getElementById("nodateError").style.display = "inline";
  		return false;
	}else if (ono2 == "") {
hideAllErrors();
document.getElementById("Error").style.display = "inline";
document.getElementById("ono2").select();
document.getElementById("ono2").focus();
return false;
	}else if (rno == "") {
hideAllErrors();
document.getElementById("Error2").style.display = "inline";
document.getElementById("rno").select();
document.getElementById("rno").focus();
return false;
	}
AddRec();
}
 
function hideAllErrors() {
document.getElementById("nodateError").style.display = "none"
document.getElementById("Error").style.display = "none"
document.getElementById("Error2").style.display = "none"
  }

//**********************************************************************************************************************************************************************************************fourth***************************************************************************************************************************************************************************************



 function fourth(co, pl, sc, id) {

listt2e(co, pl, sc, id,"schpay","schpay.php")
listt2e(co, pl, sc, id,"enrolee","enroleelist.php")
   }




//**********************************************************************************************************************************************************************************************second***************************************************************************************************************************************************************************************



 function second(pr, rc) {

listt2e(pr, rc,"receipts","receipts.php")
listt2e(pr, rc,"orders","orders.php")
   }




//**********************************************************************************************************************************************************************************************first***************************************************************************************************************************************************************************************



 function first(pr, rc) {

listt2e(pr, rc,"providers","providers.php")
listt2e(pr, rc,"receipts","receipts.php")
listt2e(pr, rc,"orders","orders.php")
   }



//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************


var slrootdomain2e="http://"+window.location.hostname

function listt2e(pr, rc,slshowlistcontainer2e,slshowlist2e)
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

slshowlist2e=slshowlist2e+"?pr="+pr+"&rc="+rc;
slshowlist2e_request.open('GET', slshowlist2e, true)
slshowlist2e_request.send(null)

function slloadshowlist2e(slshowlist2e_request, slshowlistcontainer2e){
if (slshowlist2e_request.readyState == 4 && (slshowlist2e_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2e).innerHTML=slshowlist2e_request.responseText
}

}


//**********************************************************************************************************************************************************************************************data***************************************************************************************************************************************************************************************


var slrootdomain22e="http://"+window.location.hostname

function listt22e(slshowlistcontainer22e,slshowlist22e,rc,pr)
{
var slshowlist22e_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist22e_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist22e_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist22e_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2e******/
slshowlist22e_request.onreadystatechange=function(){
slloadshowlist22e(slshowlist22e_request, slshowlistcontainer22e)
 }

slshowlist22e=slshowlist22e+"?rc="+rc+"&slshowlistcontainer22e="+slshowlistcontainer22e+"&pr="+pr;
slshowlist22e_request.open('GET', slshowlist22e, true)
slshowlist22e_request.send(null)

function slloadshowlist22e(slshowlist22e_request, slshowlistcontainer22e){
if (slshowlist22e_request.readyState == 4 && (slshowlist22e_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer22e).innerHTML=slshowlist22e_request.responseText
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

// JavaScript Document
var xmlHttp3;
function DAB3(param){
var I_ks3=document.getElementById(param);
return I_ks3;
}
function getXMLHttpRequest3(){
var xmlHttp3=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp3 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp3=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp3=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp3;
}



//**********************************************************************************************************************************************************************************************AddRec************************************************************************************************************************************************************************************

function AddRec(){

var ono2 = document.form45.ono2.value;
var rno = document.form45.rno.value;
var pr = document.form45.pr.value;
var rc = document.form45.rc.value;
var created2 = document.form45.created2.value;
	
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}


var url="insert.php";
url=url+"?ono2="+ono2+"&rno="+rno+"&pr="+pr+"&rc="+rc+"&created2="+created2;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	listt2e(pr, rc,"receipts","receipts.php");
	alert(addnt)
	} else
	{
		listt2e(pr, rc,"receipts","receipts.php");
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}

//**********************************************************************************************************************************************************************************************AddOrd************************************************************************************************************************************************************************************

function AddOrd(){

var pr = document.form100.pr.value;
var rc = document.form100.rc.value;
var select2 = document.form100.select2.value;
var unit2 = document.form100.unit2.value;
var quantity = document.form100.quantity.value;
	
xmlHttp3=getXMLHttpRequest3();
if(xmlHttp3==null){
alert("Your browser does not support Ajax");
return;}


var url="insert2.php";
url=url+"?pr="+pr+"&rc="+rc+"&select2="+select2+"&unit2="+unit2+"&quantity="+quantity;


xmlHttp3.onreadystatechange=function(){ 
if (xmlHttp3.readyState==4){ 
addnt=xmlHttp3.responseText;
if (addnt!= "1"){
	listt2e(pr, rc,"orders","orders.php");
	alert(addnt)
	} else
	{
		listt2e(pr, rc,"orders","orders.php");
		}

}else if(xmlHttp3.readyState==3){

}}
xmlHttp3.open("GET",url,true);	
xmlHttp3.send(null);

}

//**********************************************************************************************************************************************************************************************UpdateOrd************************************************************************************************************************************************************************************

function UpdateOrd(id,pr,rc,select4,Amount,quantity4){

// JavaScript Document
var xmlHttp5;
function DAB5(param){
var I_ks5=document.getElementById(param);
return I_ks5;
}
function getXMLHttpRequest5(){
var xmlHttp5=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp5 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp5=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp5=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp5;
}

	
xmlHttp5=getXMLHttpRequest5();
if(xmlHttp5==null){
alert("Your browser does not support Ajax");
return;}

var url="update.php";
url=url+"?pr="+pr+"&rc="+rc+"&select4="+select4+"&Amount="+Amount+"&quantity4="+quantity4+"&id="+id;


xmlHttp5.onreadystatechange=function(){ 
if (xmlHttp5.readyState==4){ 
addnt=xmlHttp5.responseText;
if (addnt!= "1"){
	listt2e(pr, rc,"orders","orders.php");
	alert(addnt)
	} else
	{
		listt2e(pr, rc,"orders","orders.php");
		}

}else if(xmlHttp5.readyState==3){

}}
xmlHttp5.open("GET",url,true);	
xmlHttp5.send(null);

}

