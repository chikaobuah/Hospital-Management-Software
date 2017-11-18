 //***************************************************************isValidDate***************************************************************************************************************************************************************************************
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
//***************************************************************isValidDate***************************************************************************************************************************************************************************************
function isValidDate(sText) {
	var reDate = (/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/); 
	return reDate.test(sText);
}

	function validate(session,ls,ef,sc) {
		
		var oInput1 = document.getElementById("Start_date9");
		
		if(isValidDate(oInput1.value))
		 { 
		AddEff(session,ls,ef,sc);}

		else{
		hideAllErrors();
document.getElementById("nodateError").style.display = "inline";
document.getElementById("Start_date9").select();
document.getElementById("Start_date9").focus();
  return false;
		}
		
	}
	
	function hideAllErrors() {
document.getElementById("nodateError").style.display = "none"
  }
//**********************************************************************************************************************************************************************************************third***************************************************************************************************************************************************************************************



 function third(ls, sc, ef,files) {

listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures",files)
   }

//**********************************************************************************************************************************************************************************************secondd***************************************************************************************************************************************************************************************



 function secondd(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_services","services.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","drugs.php")
   }
   
//**********************************************************************************************************************************************************************************************secondp***************************************************************************************************************************************************************************************



 function secondp(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_services","services.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","procedures.php")
   }
   
 //**********************************************************************************************************************************************************************************************firstpg***************************************************************************************************************************************************************************************



 function firstpg(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_list","list.php")
listt2e(ls, sc, ef, "loading_services","list2.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","program.php")

   }
   //**********************************************************************************************************************************************************************************************firsts***************************************************************************************************************************************************************************************



 function firsts(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_list","list.php")
listt2e(ls, sc, ef, "loading_services","list2.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","service.php")

   }

     
 //**********************************************************************************************************************************************************************************************firstpl***************************************************************************************************************************************************************************************



 function firstpl(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_list","list.php")
listt2e(ls, sc, ef, "loading_services","list2.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","plan.php")

   }

     //**********************************************************************************************************************************************************************************************firstpr***************************************************************************************************************************************************************************************



 function firstpr(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_list","list.php")
listt2e(ls, sc, ef, "loading_services","list2.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","principal.php")

   }

   
//**********************************************************************************************************************************************************************************************firstc***************************************************************************************************************************************************************************************



 function firstc(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_list","list.php")
listt2e(ls, sc, ef, "loading_services","list2.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","Client.php")

   }


//**********************************************************************************************************************************************************************************************firstpro***************************************************************************************************************************************************************************************



 function firstpro(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_list","list.php")
listt2e(ls, sc, ef, "loading_services","services.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","procedures.php")

   }



//**********************************************************************************************************************************************************************************************first***************************************************************************************************************************************************************************************



 function first(ls, sc, ef) {

listt2e(ls, sc, ef, "loading_list","list.php")
listt2e(ls, sc, ef, "loading_services","list2.php")
listt2e(ls, sc, ef, "loading_effective","effective.php")
listt2e(ls, sc, ef, "loading_procedures","license.php")

   }

//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************
var slshowlist2e_request;
function DAB9(param){
var I_ks9=document.getElementById(param);
return I_ks9;
}

var slrootdomain2e="http://"+window.location.hostname

function listt2e(ls, sc, ef, slshowlistcontainer2e,slshowlist2e)

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

slshowlist2e=slshowlist2e+"?ls="+ls+"&sc="+sc+"&ef="+ef;
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

function AddEff(session,ls,ef,sc){

var eff = document.getElementById("Start_date9").value;
	
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}


var url="effinsert2.php";
url=url+"?eff="+eff+"&session="+session+"&ef="+ef+"&ls="+ls+"&sc="+sc;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	listt2e(ls, sc, ef, "loading_effective","effective.php");
	alert(addnt)
	} else
	{
		listt2e(ls, sc, ef, "loading_effective","effective.php");
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}


//**********************************************************************************************************************************************************************************************AddLoad***************************************************************************************************************************************************************************************

function 
	AddLoad(Loading,list,effective,sc,session,Id2,Client,Id,url,files){
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

	
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}

url=url+"?Loading="+Loading+"&session="+session+"&effective="+effective+"&list="+list+"&sc="+sc+"&list="+list+"&Client="+Client+"&Id="+Id+"&Id2="+Id2;



xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
addnt=xmlHttp4.responseText;
if (addnt!= "1"){
	listt2e(list, sc, effective, "loading_procedures",files);
	alert(addnt)
	} else
	{
		}

}else if(xmlHttp4.readyState==3){

}}
xmlHttp4.open("GET",url,true);	
xmlHttp4.send(null);

}


//**********************************************************************************************************************************************************************************************AddPro***************************************************************************************************************************************************************************************

function AddPro(procedure,id2){

var ef = document.form13.ef.value;
var li = document.form13.li.value;
var sc = document.form13.sc.value;
var che = document.form13.che.value;

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

var url="update1.php";
url=url+"?id2="+id2+"&li="+li+"&sc="+sc+"&ef="+ef+"&che="+che+"&procedure="+procedure;


xmlHttp5.onreadystatechange=function(){ 
if (xmlHttp5.readyState==4){ 
addnt=xmlHttp5.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "loading_procedures","allprocedures.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "loading_procedures","allprocedures.php");
		}

}else if(xmlHttp5.readyState==3){

}}
xmlHttp5.open("GET",url,true);	
xmlHttp5.send(null);

}

//**********************************************************************************************************************************************************************************************AddAllPro***************************************************************************************************************************************************************************************

function AddAllPro(){
var ef = document.form13.ef.value;
var li = document.form13.li.value;
var sc = document.form13.sc.value;

	// JavaScript Document
var xmlHttp6;
function DAB6(param){
var I_ks6=document.getElementById(param);
return I_ks6;
}
function getXMLHttpRequest6(){
var xmlHttp6=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp6 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp6=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp6=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp6;
}


	
xmlHttp6=getXMLHttpRequest6();
if(xmlHttp6==null){
alert("Your browser does not support Ajax");
return;}

var url="update2.php";
url=url+"?li="+li+"&sc="+sc+"&ef="+ef;



xmlHttp6.onreadystatechange=function(){ 

if (xmlHttp6.readyState==4){ 
addnt=xmlHttp6.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "loading_procedures","allprocedures.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "loading_procedures","allprocedures.php");
		alert("All records selected")
		}

}else if(xmlHttp6.readyState==3){

}}
xmlHttp6.open("GET",url,true);	
xmlHttp6.send(null);

}

//**********************************************************************************************************************************************************************************************AddDru***************************************************************************************************************************************************************************************

function AddDru(drug,id2){

var ef = document.form8.ef.value;
var li = document.form8.li.value;
var sc = document.form8.sc.value;
var che = document.form8.che.value;

	// JavaScript Document
var xmlHttp8;
function DAB8(param){
var I_ks8=document.getElementById(param);
return I_ks8;
}
function getXMLHttpRequest8(){
var xmlHttp8=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp8 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp8=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp8=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp8;
}


	
xmlHttp8=getXMLHttpRequest8();
if(xmlHttp8==null){
alert("Your browser does not support Ajax");
return;}

var url="update3.php";
url=url+"?id2="+id2+"&li="+li+"&sc="+sc+"&ef="+ef+"&che="+che+"&drug="+drug;


xmlHttp8.onreadystatechange=function(){ 
if (xmlHttp8.readyState==4){ 
addnt=xmlHttp8.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "loading_procedures","alldrugs.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "loading_procedures","alldrugs.php");
		}

}else if(xmlHttp8.readyState==3){

}}
xmlHttp8.open("GET",url,true);	
xmlHttp8.send(null);

}

//**********************************************************************************************************************************************************************************************AddAllDru***************************************************************************************************************************************************************************************

function AddAllDru(){
var ef = document.form8.ef.value;
var li = document.form8.li.value;
var sc = document.form8.sc.value;

	// JavaScript Document
var xmlHttp9;
function DAB9(param){
var I_ks9=document.getElementById(param);
return I_ks9;
}
function getXMLHttpRequest6(){
var xmlHttp9=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp9 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp9=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp9=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp9;
}


	
xmlHttp9=getXMLHttpRequest6();
if(xmlHttp9==null){
alert("Your browser does not support Ajax");
return;}

var url="update4.php";
url=url+"?li="+li+"&sc="+sc+"&ef="+ef;



xmlHttp9.onreadystatechange=function(){ 

if (xmlHttp9.readyState==4){ 
addnt=xmlHttp9.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "loading_procedures","alldrugs.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "loading_procedures","alldrugs.php");
		alert("All records selected")
		}

}else if(xmlHttp9.readyState==3){

}}
xmlHttp9.open("GET",url,true);	
xmlHttp9.send(null);

}


