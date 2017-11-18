//**********************************************************************************************************************************************************************************************showHint***************************************************************************************************************************************************************************************

function showHint(str)
{
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttpsh=new XMLHttpRequest();
  		}
			else
  		{// code for IE6, IE5
  		xmlhttpsh=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  
  
	xmlhttpsh.onreadystatechange=function()
  		{
 		if (xmlhttpsh.readyState==4 && xmlhttpsh.status==200)
    		{
    			document.getElementById("app").innerHTML=xmlhttpsh.responseText;
    		}
	
  		}
		
var url="gethint.php";
url=url+"?q="+str
  
	xmlhttpsh.open("GET",url,true);//Send the request off to a file on the server
	xmlhttpsh.send();
}



//**********************************************************************************************************************************************************************************************button***************************************************************************************************************************************************************************************



// JavaScript Document
var xmlHttpxy;
function DABxy(param){
var I_ksxy=document.getElementById(param);
return I_ksxy;
}
function getXMLHttpRequest(){
var xmlHttpxy=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttpxy = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttpxy=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttpxy=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttpxy;
}


//add notes and update note

function Button(){
xmlHttpxy=getXMLHttpRequest();
if(xmlHttpxy==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.button.pr.value;
var en = document.button.en.value;
var sc = document.button.sc.value;
var id = document.button.id.value;
var lc2 = document.button.lc2.value;
var theid = document.button.theid.value;
var thetask = document.button.thetask.value;
var mod = "AddButton";

var url="insertbutton.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2+"&theid="+theid+"&thetask="+thetask+"&mod="+mod;


xmlHttpxy.onreadystatechange=function(){ 
if (xmlHttpxy.readyState==4){ 
addbt=xmlHttpxy.responseText;
if (addbt!= "1"){
	alert(addbt)
	} else
	{
		loadpage();
		}

}else if(xmlHttpxy.readyState==3){

}}
xmlHttpxy.open("GET",url,true);	
xmlHttpxy.send(null);

}
  //**********************************************************************************************************************************************************************************************myselect5***************************************************************************************************************************************************************************************



 function gotourl5( mySelect5 ) {
var pr = document.form25.pr.value;
var en = document.form25.en.value;
var sc = document.form25.sc.value;
var id = document.form25.id.value;
var lc2 = document.form25.lc2.value;
 var myValue5 = document.form25.status.options
[document.form25.status.options.selectedIndex].value;
      UpdateInvestigation(myValue5); 
   }
   


//**********************************************************************************************************************************************************************************************change***************************************************************************************************************************************************************************************

function change (elem) {
    AddNote();}


//*******************************************************************************************************************************************************************************************onload**************************************************************************************************************************************************************************************


var rootdomain="http://"+window.location.hostname

function loadpage()
{
	
var wait = "waiting.php";
var	info = "info.php";
var	note = "notes.php";
var	list = "list.php";
var	showlist = "untitled.php";
var	printt = "print.php";
var	time = "time.php";
var	button = "untitled.php";
var	waitcontainer = "waiting";
var	infocontainer = "info";
var	notecontainer = "note";
var	listcontainer = "list";
var	showlistcontainer = "showlist";
var	printtcontainer = "print";
var	timecontainer = "time";
var	buttoncontainer = "button";
	
	
	
var pr = 1;
var en = 1;
var sc = 1;
var id = 1;
var lc2 = 1;


var waiting_request = false
var info_request = false
var note_request = false
var list_request = false
var showlist_request = false
var printt_request = false
var time_request = false
var button_request = false



if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
waiting_request =  new XMLHttpRequest()
info_request = new XMLHttpRequest()
note_request = new XMLHttpRequest()
list_request = new XMLHttpRequest()
showlist_request = new XMLHttpRequest()
printt_request = new XMLHttpRequest()
time_request = new XMLHttpRequest()
button_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
waiting_request =  new ActiveXObject("Msxml2.XMLHTTP")
info_request = new ActiveXObject("Msxml2.XMLHTTP")
note_request = new ActiveXObject("Msxml2.XMLHTTP")
list_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist_request = new ActiveXObject("Msxml2.XMLHTTP")
printt_request = new ActiveXObject("Msxml2.XMLHTTP")
time_request = new ActiveXObject("Msxml2.XMLHTTP")
button_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
waiting_request =  new ActiveXObject("Msxml2.XMLHTTP")
info_request = new ActiveXObject("Msxml2.XMLHTTP")
note_request = new ActiveXObject("Msxml2.XMLHTTP")
list_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist_request = new ActiveXObject("Msxml2.XMLHTTP")
printt_request = new ActiveXObject("Msxml2.XMLHTTP")
time_request = new ActiveXObject("Msxml2.XMLHTTP")
button_request = new ActiveXObject("Msxml2.XMLHTTP")
}
catch (e){}
}
}
else
return false

/*******waiting******/
waiting_request.onreadystatechange=function(){
loadwait(waiting_request, waitcontainer)
}
wait=wait+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
waiting_request.open('GET', wait, true)
waiting_request.send(null)

function loadwait(waiting_request, waitcontainer){
if (waiting_request.readyState == 4 && (waiting_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(waitcontainer).innerHTML=waiting_request.responseText

}

/*******info******/
info_request.onreadystatechange=function(){
loadinfo(info_request, infocontainer)
}
info=info+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
info_request.open('GET', info, true)
info_request.send(null)

function loadinfo(info_request, infocontainer){
if (info_request.readyState == 4 && (info_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(infocontainer).innerHTML=info_request.responseText
}



/*******list******/
list_request.onreadystatechange=function(){
loadlist(list_request, listcontainer)
}
list=list+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
list_request.open('GET', list, true)
list_request.send(null)

function loadlist(list_request, listcontainer){
if (list_request.readyState == 4 && (list_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(listcontainer).innerHTML=list_request.responseText
}

/*******showlist******/
showlist_request.onreadystatechange=function(){
loadshowlist(showlist_request, showlistcontainer)
}
showlist=showlist+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
showlist_request.open('GET', showlist, true)
showlist_request.send(null)

function loadshowlist(showlist_request, showlistcontainer){
if (showlist_request.readyState == 4 && (showlist_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(showlistcontainer).innerHTML=showlist_request.responseText
}


/*******printt******/
printt_request.onreadystatechange=function(){
loadprintt(printt_request, printtcontainer)
}
printt=printt+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
printt_request.open('GET', printt, true)
printt_request.send(null)

function loadprintt(printt_request, printtcontainer){
if (printt_request.readyState == 4 && (printt_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(printtcontainer).innerHTML=printt_request.responseText
}


/*******time******/
time_request.onreadystatechange=function(){
loadtime(time_request, timecontainer)
}
time=time+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
time_request.open('GET', time, true)
time_request.send(null)

function loadtime(time_request, timecontainer){
if (time_request.readyState == 4 && (time_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(timecontainer).innerHTML=time_request.responseText
}
/*******button******/
button_request.onreadystatechange=function(){
loadbutton(button_request, buttoncontainer)
}
button=button+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
button_request.open('GET', button, true)
button_request.send(null)

function loadbutton(button_request, buttoncontainer){
if (button_request.readyState == 4 && (button_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(buttoncontainer).innerHTML=button_request.responseText
}


/*******note******/
note_request.onreadystatechange=function(){
loadnote(note_request, notecontainer)
}
note=note+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
note_request.open('GET', note, true)
note_request.send(null)

function loadnote(note_request, notecontainer){
if (note_request.readyState == 4 && (note_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(notecontainer).innerHTML=note_request.responseText
}



}


//********************************************************************************************************************************************************************************************selectt******************************************************************************************************************************************************************************************************


var	winfo = "info.php";
var	wnote = "notes.php";
var	wlist = "list.php";
var	wshowlist = "lablist.php";
var	wprintt = "print.php";
var	wtime = "time.php";
var	wbutton = "button.php";
var	winfocontainer = "info";
var	wnotecontainer = "note";
var	wlistcontainer = "list";
var	wshowlistcontainer = "showlist";
var	wprinttcontainer = "print";
var	wtimecontainer = "time";
var	wbuttoncontainer = "button";


var wrootdomain="http://"+window.location.hostname

function selectt(pr, en, sc, lc2, id, wshowlist2)
{
var winfo_request = false
var wnote_request = false
var wlist_request = false
var wshowlist_request = false
var wprintt_request = false
var wtime_request = false
var wbutton_request = false


if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
winfo_request = new XMLHttpRequest()
wnote_request = new XMLHttpRequest()
wlist_request = new XMLHttpRequest()
wshowlist_request = new XMLHttpRequest()
wprintt_request = new XMLHttpRequest()
wtime_request = new XMLHttpRequest()
wbutton_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
winfo_request = new ActiveXObject("Msxml2.XMLHTTP")
wnote_request = new ActiveXObject("Msxml2.XMLHTTP")
wlist_request = new ActiveXObject("Msxml2.XMLHTTP")
wshowlist_request = new ActiveXObject("Msxml2.XMLHTTP")
whistory_request = new ActiveXObject("Msxml2.XMLHTTP")
wtime_request = new ActiveXObject("Msxml2.XMLHTTP")
wbutton_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
winfo_request = new ActiveXObject("Msxml2.XMLHTTP")
wnote_request = new ActiveXObject("Msxml2.XMLHTTP")
wlist_request = new ActiveXObject("Msxml2.XMLHTTP")
wshowlist_request = new ActiveXObject("Msxml2.XMLHTTP")
whistory_request = new ActiveXObject("Msxml2.XMLHTTP")
wtime_request = new ActiveXObject("Msxml2.XMLHTTP")
wbutton_request = new ActiveXObject("Msxml2.XMLHTTP")
}
catch (e){}
}
}
else
return false


/*******winfo******/
winfo_request.onreadystatechange=function(){
wloadinfo(winfo_request, winfocontainer)
}
winfo=winfo+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
winfo_request.open('GET', winfo, true)
winfo_request.send(null)

function wloadinfo(winfo_request, winfocontainer){
if (winfo_request.readyState == 4 && (winfo_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(winfocontainer).innerHTML=winfo_request.responseText
}

/*******printt******/
wprintt_request.onreadystatechange=function(){
wloadprintt(wprintt_request, wprinttcontainer)
}
wprintt=wprintt+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
wprintt_request.open('GET', wprintt, true)
wprintt_request.send(null)

function wloadprintt(wprintt_request, wprinttcontainer){
if (wprintt_request.readyState == 4 && (wprintt_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wprinttcontainer).innerHTML=wprintt_request.responseText
}

/*******wnote******/
wnote_request.onreadystatechange=function(){
wloadnote(wnote_request, wnotecontainer)
LoadNote(pr, en, lc2, id, '-1');
}
wnote=wnote+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
wnote_request.open('GET', wnote, true)
wnote_request.send(null)

function wloadnote(wnote_request, wnotecontainer){
if (wnote_request.readyState == 4 && (wnote_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wnotecontainer).innerHTML=wnote_request.responseText
}

/*******wlist******/
wlist_request.onreadystatechange=function(){
wloadlist(wlist_request, wlistcontainer)
}
wlist=wlist+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
wlist_request.open('GET', wlist, true)
wlist_request.send(null)

function wloadlist(wlist_request, wlistcontainer){
if (wlist_request.readyState == 4 && (wlist_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wlistcontainer).innerHTML=wlist_request.responseText
}


/*******wshowlist******/
wshowlist_request.onreadystatechange=function(){
wloadshowlist(wshowlist_request, wshowlistcontainer)
}
wshowlist=wshowlist+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
wshowlist_request.open('GET', wshowlist, true)
wshowlist_request.send(null)

function wloadshowlist(wshowlist_request, wshowlistcontainer){
if (wshowlist_request.readyState == 4 && (wshowlist_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wshowlistcontainer).innerHTML=wshowlist_request.responseText
}


/*******wtime******/
wtime_request.onreadystatechange=function(){
wloadtime(wtime_request, wtimecontainer)
}
wtime=wtime+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
wtime_request.open('GET', wtime, true)
wtime_request.send(null)

function wloadtime(wtime_request, wtimecontainer){
if (wtime_request.readyState == 4 && (wtime_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wtimecontainer).innerHTML=wtime_request.responseText
}

/*******wbutton******/
wbutton_request.onreadystatechange=function(){
wloadbutton(wbutton_request, wbuttoncontainer)
}
wbutton=wbutton+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&lc2="+lc2;
wbutton_request.open('GET', wbutton, true)
wbutton_request.send(null)

function wloadbutton(wbutton_request, wbuttoncontainer){
if (wbutton_request.readyState == 4 && (wbutton_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wbuttoncontainer).innerHTML=wbutton_request.responseText
}

}

//**********************************************************************************************************************************************************************************************list2***************************************************************************************************************************************************************************************


var slrootdomain2="http://"+window.location.hostname

function listt2(pr, en, lc2, id,slshowlistcontainer2,slshowlist2)
{
var slshowlist2_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2******/
slshowlist2_request.onreadystatechange=function(){
slloadshowlist2(slshowlist2_request, slshowlistcontainer2)
}

slshowlist2=slshowlist2+"?pr="+pr+"&en="+en+"&id="+id+"&lc2="+lc2;
slshowlist2_request.open('GET', slshowlist2, true)
slshowlist2_request.send(null)

function slloadshowlist2(slshowlist2_request, slshowlistcontainer2){
if (slshowlist2_request.readyState == 4 && (slshowlist2_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2).innerHTML=slshowlist2_request.responseText
}

}


//**********************************************************************************************************************************************************************************************note***************************************************************************************************************************************************************************************

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


//add notes and update note

function AddNote(){
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.myform.pr.value;
var en = document.myform.en.value;
var id = document.myform.id.value;
var lc2 = document.myform.lc2.value;
var proc = document.myform.proc.value;
var pnote = document.myform.pnote.value;
var note = document.myform.note.value;
var creator = document.myform.creator.value;

var mod = "AddNote";

var url="insertnote.php";
url=url+"?pr="+pr+"&en="+en+"&id="+id+"&proc="+proc+"&mod="+mod;

xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	LoadNote(pr, en, lc2, id, proc);
	alert("Error Writting This entry")
	} else
	{
		LoadNote(pr, en, lc2, id, proc);
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}

//loadnotes
function LoadNote(pr, en, lc2, id, proc){
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadNote";

var url="insertnote.php";
url=url+"?pr="+pr+"&en="+en+"&id="+id+"&lc2="+lc2+"&proc="+proc+"&mod="+mod;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
Sat=xmlHttp.responseText;
DAB("AllNote").innerHTML=Sat

}else if(xmlHttp.readyState==3){
//DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}


//**********************************************************************************************************************************************************************************************Investigation**************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttp4;
function DAB4(param){
var I_ks4=document.getElementById(param);
return I_ks4;
}
function getXMLHttpRequest(){
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

//loadinvestigation
function LoadInvestigation(pr, en, lc2, id){
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadInvestigation";

var url="insertpro.php";
url=url+"?pr="+pr+"&en="+en+"&id="+id+"&lc2="+lc2+"&mod="+mod;


xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
Sat4=xmlHttp4.responseText;
DAB4("ShowInvestigation").innerHTML=Sat4

}else if(xmlHttp4.readyState==3){
DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp4.open("GET",url,true);	
xmlHttp4.send(null);

}

//Update Investigation
function UpdateInvestigation(result){
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}
var mod = "UpdateInvestigation";

var pr = document.form25.pr.value;
var en = document.form25.en.value;
var id = document.form25.id.value;
var lc2 = document.form25.lc2.value;

var procedure_FK = document.form25.procedure_FK.value;

var url="insertpro.php";
url=url+"?pr="+pr+"&en="+en+"&id="+id+"&lc2="+lc2+"&procedure_FK="+procedure_FK+"&result="+result+"&mod="+mod;


xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
addig=xmlHttp4.responseText;
if (addig != 1){
	LoadInvestigation(pr, en, lc2, id);
	alert("Error Writting This entry")
	} else
	{
		LoadInvestigation(pr, en, lc2, id);
		}


}else if(xmlHttp4.readyState==3){

}}
xmlHttp4.open("GET",url,true);	
xmlHttp4.send(null);

}

