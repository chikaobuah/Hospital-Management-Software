//**********************************************************************************************************************************************************************************************validate5*************************************************************************************************************************************************************************************
function validate5() {
		
		Commenced = document.getElementById("Commenced").value;
		capitation = document.getElementById("capitation").value;
		fre = document.getElementById("fre").value;

 if (Commenced == ""){
hideAllErrors();
document.getElementById("Error9").style.display = "inline";
  		return false;
	}else if (capitation == "") {
hideAllErrors();
document.getElementById("Error10").style.display = "inline";
return false;
	} else if (fre == "") {
hideAllErrors();
document.getElementById("Error11").style.display = "inline";
return false;}


var numericExpression = /^[0-9]+$/;
	if(capitation.match(numericExpression)){
EditCap();
}
 
function hideAllErrors() {
document.getElementById("Error9").style.display = "none"
document.getElementById("Error10").style.display = "none"
document.getElementById("Error11").style.display = "none"
  }
  
}

//**********************************************************************************************************************************************************************************************validate4*************************************************************************************************************************************************************************************
function validate4(client) {
		
		scheme2 = document.getElementById("scheme2").value;
		client = document.getElementById("client").value;

	if (scheme2 == ""){
hideAllErrors();
document.getElementById("Error7").style.display = "inline";
  		return false;
	}else if (client == "") {
hideAllErrors();
document.getElementById("Error8").style.display = "inline";
return false;
	}
AddPla(client);
}
 
function hideAllErrors() {
document.getElementById("Error7").style.display = "none"
document.getElementById("Error8").style.display = "none"
  }

 function fourth(co, pl, sc, id) {
listt2e(co, pl, sc, id,"plan_planhistory","planhistory.php")
   }
   


//**********************************************************************************************************************************************************************************************thirdb***************************************************************************************************************************************************************************************



 function third(co, pl, sc, id) {
listt2e(co, pl, sc, id,"plan_schemes","schemes.php")
listt2e(co, pl, sc, id,"plan_planhistory","planhistory.php")
   }


//**********************************************************************************************************************************************************************************************second***************************************************************************************************************************************************************************************



 function second(co, pl, sc, id) {
listt2e(co, pl, sc, id,"plan_companylist","companylist.php")
listt2e(co, pl, sc, id,"plan_schemes","schemes.php")
listt2e(co, pl, sc, id,"plan_planhistory","planhistory.php")
   }




//**********************************************************************************************************************************************************************************************first***************************************************************************************************************************************************************************************



 function first(co, pl, sc, id) {

listt2e(co, pl, sc, id,"plan_program","program.php")
listt2e(co, pl, sc, id,"plan_companylist","companylist.php")
listt2e(co, pl, sc, id,"plan_schemes","schemes.php")
listt2e(co, pl, sc, id,"plan_planhistory","planhistory.php")
   }






//**********************************************************************************************************************************************************************************************list2e***************************************************************************************************************************************************************************************


var slrootdomain2e="http://"+window.location.hostname

function listt2e(co, pl, sc, id, slshowlistcontainer2e,slshowlist2e)
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
 
slshowlist2e=slshowlist2e+"?co="+co+"&pl="+pl+"&sc="+sc+"&id="+id;
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



//**********************************************************************************************************************************************************************************************Addpla************************************************************************************************************************************************************************************

function AddPla(client){
	
var scheme2 = document.form2.scheme2.value;
var scheme_FK = document.form2.scheme_FK.value;
var plan = document.form2.plan.value;
var company = document.form2.company.value;
var che = document.form2.che.value;
var id = document.form2.id.value;
	
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}


var url="insert.php";
url=url+"?scheme2="+scheme2+"&scheme_FK="+scheme_FK+"&plan="+plan+"&company="+company+"&che="+che+"&client="+client+"&id="+id; 
		
xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	listt2e(company, plan, scheme_FK, id,"plan_schemes","schemes.php");
	alert(addnt)
	} else
	{
		listt2e(company, plan, scheme_FK, id,"plan_schemes","schemes.php");
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}

//**********************************************************************************************************************************************************************************************Editpla***************************************************************************************************************************************************************************************

function EditPla(LId,scheme,client,che,company,plan,id,scheme_FK,out){

//var LId = LId2.value;
//var scheme = scheme2.value;
//var client = client2.value;
//var che = che2.value;
//var scheme_FK = document.form2.scheme_FK.value;
//var plan = document.form2.plan.value;
//var company = document.form2.company.value;
//var id = document.form2.id.value;
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
	


	
xmlHttp2=getXMLHttpRequest2();
if(xmlHttp2==null){
alert("Your browser does not support Ajax");
return;}


var url="update.php";
url=url+"?scheme="+scheme+"&scheme_FK="+scheme_FK+"&plan="+plan+"&company="+company+"&che="+che+"&client="+client+"&id="+id+"&LId="+LId+"&out="+out; 

xmlHttp2.onreadystatechange=function(){ 
if (xmlHttp2.readyState==4){ 
addnt=xmlHttp2.responseText;
if (addnt!= "1"){
	listt2e(company, plan, scheme_FK, id,"plan_schemes","schemes.php")
	alert(addnt)
	} else
	{
		
		}

}else if(xmlHttp2.readyState==3){

}}
xmlHttp2.open("GET",url,true);	
xmlHttp2.send(null);

}

//*********************************************************************************************************************************************************************************************Editcap************************************************************************************************************************************************************************************///

function EditCap(){
	
	
var scheme2 = document.form1.scheme.value;
var plan = document.form1.plan.value;
var company = document.form1.company.value;
var Commenced2 = document.form1.Commenced.value;
var capitation = document.form1.capitation.value;
var fre = document.form1.fre.value;
var id = document.form1.id.value;
	
xmlHttp3=getXMLHttpRequest3();
if(xmlHttp3==null){
alert("Your browser does not support Ajax");
return;}

var url="update2.php";
url=url+"?scheme2="+scheme2+"&plan="+plan+"&company="+company+"&Commenced2="+Commenced2+"&capitation="+capitation+"&id="+id+"&fre="+fre; 
		
xmlHttp3.onreadystatechange=function(){ 
if (xmlHttp3.readyState==4){ 
addnt=xmlHttp3.responseText;
if (addnt!= "1"){
	listt2e(company, plan, scheme2, id,"plan_planhistory","planhistory.php");
	alert(addnt)
	} else
	{
		listt2e(company, plan, scheme2, id,"plan_planhistory","planhistory.php");
		}

}else if(xmlHttp3.readyState==3){

}}
xmlHttp3.open("GET",url,true);	
xmlHttp3.send(null);

}

