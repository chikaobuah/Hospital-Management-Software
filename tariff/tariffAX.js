function formatCurrency(num) {
num = num.toString().replace(/\|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-')+ num + '.' + cents);
}
//*******************************************************************************************************************************************************************************************validate6***************************************************************************************************************************************************************************************
function validate6(sc,pr,ef,session) {
		
Start_date2 = document.getElementById("Start_date2").value;
		
	if (Start_date2 == ""){
		hideAllErrors();
	document.getElementById("Error13").style.display = "inline";
  	return false;
	} 
	
AddEff(sc,pr,ef,session);
}

function hideAllErrors() {
document.getElementById("Error13").style.display = "none"
  }
  //**********************************************************************************************************************************************************************************************third***************************************************************************************************************************************************************************************



 function third(pr, ef, sc) {

listt2e(pr, ef, sc, "tariff_effective","effective.php")
listt2e(pr, ef, sc, "tariff_clientpro","clientpro.php")
   }


//**********************************************************************************************************************************************************************************************second***************************************************************************************************************************************************************************************



 function second(pr, ef, sc) {

listt2e(pr, ef, sc, "tariff_services","services.php")
listt2e(pr, ef, sc, "tariff_effective","effective.php")
listt2e(pr, ef, sc, "tariff_clientpro","clientpro.php")
   }




//**********************************************************************************************************************************************************************************************first***************************************************************************************************************************************************************************************



 function first(pr, ef, sc) {

listt2e(pr, ef, sc, "tariff_providers","providers.php")
listt2e(pr, ef, sc, "tariff_services","services.php")
listt2e(pr, ef, sc, "tariff_effective","effective.php")
listt2e(pr, ef, sc, "tariff_clientpro","clientpro.php")
   }

//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************


var slrootdomain2e="http://"+window.location.hostname

function listt2e(pr, ef, sc, slshowlistcontainer2e,slshowlist2e)
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
 

slshowlist2e=slshowlist2e+"?ef="+ef+"&pr="+pr+"&sc="+sc;
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



//**********************************************************************************************************************************************************************************************Addeff***************************************************************************************************************************************************************************************

function AddEff(sc,pr,ef,session){

var eff = document.form199.Start_date2.value;
//var ef = document.form199.ef.value;
//var sc = document.form199.sc.value;
//var pr = document.form199.pr.value;
//var session = document.form199.session.value;
	
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}


var url="effinsert2.php";
url=url+"?eff="+eff+"&ef="+ef+"&sc="+sc+"&pr="+pr+"&session="+session;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	listt2e(pr, ef, sc, "tariff_effective","effective.php");
	alert(addnt)
	} else
	{
		listt2e(pr, ef, sc, "tariff_effective","effective.php");
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}


//**********************************************************************************************************************************************************************************************AddPro***************************************************************************************************************************************************************************************

function AddPro(tariff2,procedure,eff,tariff){
	
	// JavaScript Document
var xmlHttp4;
function DAB4(param){
var I_ks4=document.getElementById(param);
return I_ks4;
}
function getXMLHttpRequest4(){
var xmlHttp4=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp4 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp4=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp4=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp4;
}

//var eff = document.form19.eff.value;
var pr = document.form19.pr.value;
var ef = document.form19.ef.value;
var sc = document.form19.sc.value;
//var tariff2 = document.form19.tariff2.value;
//var procedure = document.form19.procedure.value;
//var tariff = document.form19.tariff.value;
var session = document.form19.session.value;
	
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}

var url="clientproupdate.php";
url=url+"?procedure="+procedure+"&pr="+pr+"&ef="+ef+"&sc="+sc+"&tariff="+tariff+"&tariff2="+tariff2+"&eff="+eff+"&session="+session;



xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
addnt=xmlHttp4.responseText;
if (addnt!= "1"){
	listt2e(pr, ef, sc, "tariff_clientpro","clientpro.php");
	alert(addnt)
	} else
	{
		}

}else if(xmlHttp4.readyState==3){

}}
xmlHttp4.open("GET",url,true);	
xmlHttp4.send(null);

}


