//**********************************************************************************************************************************************************************************************validate10***************************************************************************************************************************************************************************************
function validate10() {
Start_date = document.getElementById("Start_date").value;
Amount = document.getElementById("Amount").value;

  if (Start_date == "") {
  hideAllErrors();
document.getElementById("Empty3").style.display = "inline";

  return false;
  } 
Add();
  }
 
  function hideAllErrors() {
document.getElementById("Empty3").style.display = "none"


  }

//**********************************************************************************************************************************************************************************************fourth***************************************************************************************************************************************************************************************



 function fourth(co, pl, sc, id) {

listt2e(co, pl, sc, id,"capitation_schpay","schpay.php")
listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
   }

//**********************************************************************************************************************************************************************************************third***************************************************************************************************************************************************************************************



 function third(co, pl, sc, id) {

listt2e(co, pl, sc, id,"capitation_schemes","schemes.php")
listt2e(co, pl, sc, id,"capitation_schpay","schpay.php")
listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
   }


//**********************************************************************************************************************************************************************************************second***************************************************************************************************************************************************************************************



 function second(co, pl, sc, id) {

listt2e(co, pl, sc, id,"capitation_company","companylist.php")
listt2e(co, pl, sc, id,"capitation_schemes","schemes.php")
listt2e(co, pl, sc, id,"capitation_schpay","schpay.php")
listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
   }




//**********************************************************************************************************************************************************************************************first***************************************************************************************************************************************************************************************



 function first(co, pl, sc, id) {

listt2e(co, pl, sc, id,"capitation_program","program.php")
listt2e(co, pl, sc, id,"capitation_company","companylist.php")
listt2e(co, pl, sc, id,"capitation_schemes","schemes.php")
listt2e(co, pl, sc, id,"capitation_schpay","schpay.php")
listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
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

//**********************************************************************************************************************************************************************************************change***************************************************************************************************************************************************************************************

function change (elem) {
    AddNote();}

//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************


var slrootdomain2e="http://"+window.location.hostname

function listt2e(co, pl, sc, id,slshowlistcontainer2e,slshowlist2e)
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



//**********************************************************************************************************************************************************************************************Add***************************************************************************************************************************************************************************************

function Add(){
	
var co = document.form90.company.value;
var pl = document.form90.pl.value;
var sc = document.form90.sc.value;
var id = document.form90.id.value;
var Id = document.form90.Id.value;
var Scheme_FK = document.form90.Scheme_FK.value;
var Amount = document.form90.Amount.value;
var paying = document.form90.paying.value;
var Frequency = document.form90.Frequency.value;
var Created = document.form90.Created.value;
var Creator = document.form90.Creator.value;
var Enrolee_count = document.form90.Enrolee_count.value;
var Licensee = document.form90.Licensee.value;
var Start_date = document.form90.Start_date.value;
	
	
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}


var url="insertpay.php";
url=url+"?co="+co+"&pl="+pl+"&sc="+sc+"&id="+id+"&Id="+Id+"&Scheme_FK="+Scheme_FK+"&Amount="+Amount+"&paying="+paying+"&Frequency="+Frequency+"&Created="+Created+"&Creator="+Creator+"&Enrolee_count="+Enrolee_count+"&Licensee="+Licensee+"&Start_date="+Start_date;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	listt2e(co, pl, sc, id,"capitation_schpay","schpay.php");
	alert(addnt)
	} else
	{
		listt2e(co, pl, sc, id,"capitation_schpay","schpay.php");
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}

//**********************************************************************************************************************************************************************************************AddEnl***************************************************************************************************************************************************************************************


function AddEnl(id,co,sc,pl,che,id2,sta,license,enrolee ){
	

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


var url="update3.php";
url=url+"?co="+co+"&pl="+pl+"&sc="+sc+"&id="+id+"&che="+che+"&id2="+id2+"&sta="+sta+"&license="+license+"&enrolee="+enrolee;


xmlHttp2.onreadystatechange=function(){ 
if (xmlHttp2.readyState==4){ 
addnt=xmlHttp2.responseText;
if (addnt!= "1"){
	listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
	alert(addnt)
	} else
	{
		listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
		}

}else if(xmlHttp2.readyState==3){

}}
xmlHttp2.open("GET",url,true);	
xmlHttp2.send(null);

}


function AddAll(che2,id,co,sc,pl,che,id2,sta,license,enrolee ){

DAB3("enrolee").innerHTML="<img src='../images/icons/ajax-loader.gif' align='bottom' />";
	
xmlHttp3=getXMLHttpRequest3();
if(xmlHttp3==null){
alert("Your browser does not support Ajax");
return;}


var url="update4.php";
url=url+"?co="+co+"&pl="+pl+"&sc="+sc+"&id="+id+"&che2="+che2+"&id2="+id2+"&che="+che+"&sta="+sta+"&license="+license+"&enrolee="+enrolee;


xmlHttp3.onreadystatechange=function(){ 
if (xmlHttp3.readyState==4){ 
addnt=xmlHttp3.responseText;
if (addnt!=1){
	listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
	alert(addnt)
	} else
	{
		listt2e(co, pl, sc, id,"capitation_enrolee","enroleelist.php")
		}

}else if(xmlHttp3.readyState==3){

}}
xmlHttp3.open("GET",url,true);	
xmlHttp3.send(null);

}