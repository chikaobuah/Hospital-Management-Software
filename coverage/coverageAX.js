//*****************************************************************************checkedAll***************************************************************************************************************************************************************************************
checked=false;
function checkedAll (form8,che) {
	var aa= document.getElementById('form8');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
	
	AddAllDru(che);
      }


//*****************************************************************************checkedAll2***************************************************************************************************************************************************************************************
checked=false;
function checkedAll2 (form13,che) {
	var aa= document.getElementById('form13');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
	
	AddAllPro(che);
      }


//**********************************************************************************************************************************************************************************************isNumeric***************************************************************************************************************************************************************************************
function isNumeric(elem){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		

		AddCap();
	}else{
hideAllErrors();
document.getElementById("nonumberError").style.display = "inline";
document.getElementById("Start_date2").select();
document.getElementById("Start_date2").focus();
  return false;
	}
}

	function hideAllErrors() {
document.getElementById("nonumberError").style.display = "none"
  }

//**********************************************************************************************************************************************************************************************validate10***************************************************************************************************************************************************************************************
function isValidDate(sText) {
	var reDate = (/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/); 
	return reDate.test(sText);
}
	function validate() {
		
		var oInput1 = document.getElementById("Start_date19");
		
		if(isValidDate(oInput1.value))
		 { 
		AddEff();
		}

		else{
		hideAllErrors();
document.getElementById("nodateError").style.display = "inline";
document.getElementById("Start_date19").select();
document.getElementById("Start_date19").focus();
  return false;
		}
		
	}
	
	function hideAllErrors() {
document.getElementById("nodateError").style.display = "none"
  }

  //**********************************************************************************************************************************************************************************************thirda***************************************************************************************************************************************************************************************



 function thirda(ef, li, sc) {
listt2e(ef, li, sc, "coverage_services","services.php")
listt2e(ef, li, sc, "coverage_procedures","alldrugs.php")
   }


//**********************************************************************************************************************************************************************************************thirdb***************************************************************************************************************************************************************************************



 function thirdb(ef, li, sc) {
listt2e(ef, li, sc, "coverage_services","services.php")
listt2e(ef, li, sc, "coverage_procedures","allprocedures.php")
   }


//**********************************************************************************************************************************************************************************************second***************************************************************************************************************************************************************************************



 function second(ef, li, sc) {
listt2e(ef, li, sc, "coverage_capitation","capitation.php")
listt2e(ef, li, sc, "coverage_services","services.php")
listt2e(ef, li, sc, "coverage_procedures","allprocedures.php")
   }




//**********************************************************************************************************************************************************************************************first***************************************************************************************************************************************************************************************



 function first(ef, li, sc) {

listt2e(ef, li, sc, "coverage_effective","effective.php")
listt2e(ef, li, sc, "coverage_capitation","capitation.php")
listt2e(ef, li, sc, "coverage_services","services.php")
listt2e(ef, li, sc, "coverage_procedures","allprocedures.php")
   }





//**********************************************************************************************************************************************************************************************myselect5***************************************************************************************************************************************************************************************



 function gotourl5( mySelect5 ) {
var pr = document.form25.pr.value;
var en = document.form25.en.value;
var sc = document.form25.sc.value;
var id = document.form25.id.value;
var st = document.form25.st.value;
var cap = document.form25.cap.value;
var lc2 = document.form25.lc2.value;
var lc = document.form25.lc.value;
var id2 = document.form25.id2.value;
 var myValue5 = document.form25.style_FK.options
[document.form25.style_FK.options.selectedIndex].value;
      LoadX(pr, en, sc, cap, lc2, lc, st, id, id2, myValue5); 
	  LoadY(pr, en, sc, cap, lc2, lc, st, id, id2, myValue5); 
	  LoadZ(pr, en, sc, cap, lc2, lc, st, id, id2, myValue5); 
   }

//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************


var slrootdomain2e="http://"+window.location.hostname

function listt2e(ef, li, sc, slshowlistcontainer2e,slshowlist2e)
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
 

slshowlist2e=slshowlist2e+"?ef="+ef+"&li="+li+"&sc="+sc;
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

function AddEff(){

var eff = document.getElementById("Start_date19").value;
	
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}


var url="effinsert.php";
url=url+"?eff="+eff;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "coverage_effective","effective.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "coverage_effective","effective.php");
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}


//**********************************************************************************************************************************************************************************************Addcap***************************************************************************************************************************************************************************************

function AddCap(){
	
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

var ef  = document.getElementById("ef").value;
var session = document.getElementById("session").value;
var li = document.getElementById("li").value;
var sc = document.getElementById("sc").value;
var cap = document.getElementById("Start_date2").value;
	
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}

var url="capinsert.php";
url=url+"?cap="+cap+"&li="+li+"&sc="+sc+"&ef="+ef+"&session="+session;



xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
addnt=xmlHttp4.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "coverage_capitation","capitation.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "coverage_capitation","capitation.php");
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
	listt2e(ef, li, sc, "coverage_procedures","allprocedures.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "coverage_procedures","allprocedures.php");
		}

}else if(xmlHttp5.readyState==3){

}}
xmlHttp5.open("GET",url,true);	
xmlHttp5.send(null);

}

//**********************************************************************************************************************************************************************************************AddAllPro***************************************************************************************************************************************************************************************

function AddAllPro(che){
	

	
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

//DAB6("procedures").innerHTML="<img src='../images/icons/ajax-loader.gif' />";

	
xmlHttp6=getXMLHttpRequest6();
if(xmlHttp6==null){
alert("Your browser does not support Ajax");
return;}

var url="update2.php";
url=url+"?li="+li+"&sc="+sc+"&ef="+ef+"&che="+che;


/*
xmlHttp6.onreadystatechange=function(){ 



if (xmlHttp6.readyState==4){ 
addnt=xmlHttp6.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "procedures","allprocedures.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "procedures","allprocedures.php");
		}

}else if(xmlHttp6.readyState==3){

}} */
xmlHttp6.open("GET",url,true);	
xmlHttp6.send(null);
return;
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
	listt2e(ef, li, sc, "procedures","alldrugs.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "procedures","alldrugs.php");
		}

}else if(xmlHttp8.readyState==3){

}}
xmlHttp8.open("GET",url,true);	
xmlHttp8.send(null);

}

//**********************************************************************************************************************************************************************************************AddAllDru***************************************************************************************************************************************************************************************

function AddAllDru(che){
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

//DAB9("procedures").innerHTML="<img src='../images/icons/ajax-loader.gif' />";

	
xmlHttp9=getXMLHttpRequest6();
if(xmlHttp9==null){
alert("Your browser does not support Ajax");
return;}

var url="update4.php";
url=url+"?li="+li+"&sc="+sc+"&ef="+ef+"&che="+che;



/*xmlHttp9.onreadystatechange=function(){ 

if (xmlHttp9.readyState==4){ 
addnt=xmlHttp9.responseText;
if (addnt!= "1"){
	listt2e(ef, li, sc, "procedures","alldrugs.php");
	alert(addnt)
	} else
	{
		listt2e(ef, li, sc, "procedures","alldrugs.php");
		}

}else if(xmlHttp9.readyState==3){

}}*/
xmlHttp9.open("GET",url,true);	
xmlHttp9.send(null); 
return;
} 


